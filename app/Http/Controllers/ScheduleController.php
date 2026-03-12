<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $now = Carbon::now()->timezone('Asia/Jakarta');
        $todayDate = $now->toDateString();
        $currentTime = $now->format('H:i:s');

        // UNTUK AMBIL RUANGAN YANG SUDAH DI-BOOKING HARI INI
        $busyRoomIds = Schedule::where(function($query) use ($todayDate, $now) {
                $query->whereDate('date', $todayDate)
                ->orWhere(function($q) use ($now) {
                    $q->where('recurring', 1)
                    ->where('recurring_type', 'pekanan')
                    ->whereRaw("DAYNAME(date) = ?", [$now->format('l')]);
                });
            })
            ->whereIn('status', ['disetujui', 'pending'])
            ->where('end_session', '>', $currentTime) // Ruangan ada lagi kalau sesi udh habis
            ->pluck('room_id')
            ->unique();

        // Ambil ruangan yang tersedia
        $availableRooms = Room::whereNotIn('id', $busyRoomIds)->get();

        // JADWAL AKTIF "DIGUNAKAN HARI INI"
        $activeSchedules = Schedule::with(['user', 'room'])
            ->where('status', 'disetujui')
            ->where(function($query) use ($todayDate, $now) {
                $query->whereDate('date', $todayDate)
                    ->orWhere(function($q) use ($now) {
                        $q->where('recurring', 1)
                        ->where('recurring_type', 'pekanan')
                        ->whereRaw("DAYNAME(date) = ?", [$now->format('l')]);
                    });
            })
            ->where('end_session', '>', $currentTime)
            ->orderBy('start_session', 'asc')
            ->get();

        // ANTREAN PENDING (UNTUK ADMIN & STATUS RUANGAN)
        $pendingSchedules = Schedule::with(['user', 'room'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        // RESPONSE VIEW
        if (request()->routeIs('home')) {
            $view = ($user->is_sarpras || $user->is_osis) ? 'admin.dashboard' : 'user.dashboard';
            return view($view, [
                'availableRooms' => $availableRooms,
                'activeSchedules' => $activeSchedules,
                'pendingSchedules' => $pendingSchedules, 
                'pendingRequests' => $pendingSchedules,
                'schedules' => $activeSchedules,
                'totalAntrean' => $pendingSchedules->count(),
                'ruanganDigunakan' => $activeSchedules->count(),
            ]);
        }

        return view('schedules.index', [
            'availableRooms' => $availableRooms,
            'activeSchedules' => $activeSchedules,
            'pendingSchedules' => $pendingSchedules,
            'schedules' => $activeSchedules 
        ]);
    }


    public function mySchedules()
    {
        $mySchedules = Schedule::with(['room', 'user'])
            ->where('user_id', Auth::id())
            ->orderBy('date', 'asc')
            ->get();

        return view('schedules.my_schedules', compact('mySchedules'));
    }

    public function create()
    {
        $rooms = Room::all();
        $todayDate = \Carbon\Carbon::now()->timezone('Asia/Jakarta')->toDateString();

        // Ambil jadwal hari ini untuk diinfokan ke user di form
        $activeSchedules = Schedule::whereDate('date', $todayDate)
                            ->whereIn('status', ['disetujui', 'pending'])
                            ->with('room')
                            ->get();

        return view('schedules.create', compact('rooms', 'activeSchedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required',
            'date' => 'required|date',
            'start_session' => 'required',
            'end_session' => 'required|after:start_session',
        ]);

        // Cek Bentrokan Jadwal
        $isBooked = Schedule::where('room_id', $request->room_id)
            ->where('date', $request->date)
            ->whereIn('status', ['disetujui', 'pending'])
            ->where(function($query) use ($request) {
                $query->whereBetween('start_session', [$request->start_session, $request->end_session])
                    ->orWhereBetween('end_session', [$request->start_session, $request->end_session])
                    ->orWhere(function($q) use ($request) {
                        $q->where('start_session', '<=', $request->start_session)
                            ->where('end_session', '>=', $request->end_session);
                    });
            })->exists();

        if ($isBooked) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['conflict' => 'Maaf, ruangan akan dipakai untuk jam tersebut (Ekskul/Kegiatan lain). Silakan pilih jam atau ruangan lain.']);
        }

        // Jika tidak bentrok, simpan data
        Schedule::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'date' => $request->date,
            'start_session' => $request->start_session,
            'end_session' => $request->end_session,
            'description' => $request->description,
            'status' => 'pending', // Default status
        ]);

        return redirect()->route('schedules.index')->with('success', 'Peminjaman berhasil diajukan!');
    }

    // FUNGSI ACC (Khusus Sarpras)

    public function approve(Schedule $schedule)
    {
        $user = Auth::user();
        $roomName = strtoupper($schedule->room->name);

        // Tentukan ruangan khusus
        $isRestricted = str_contains($roomName, 'AULA') || str_contains($roomName, 'LAB');

        // ACC Aula/Lab tapi bukan Sarpras
        if ($isRestricted && !$user->is_sarpras) {
            return back()->with('error', 'Akses Ditolak! Hanya Sarpras yang boleh menyetujui Aula atau Lab.');
        }

        // untuk OSIS (Hanya boleh RT)
        if ($user->is_osis && !str_contains($roomName, 'RT')) {
            return back()->with('error', 'OSIS hanya diperbolehkan menyetujui ruangan kelas (RT).');
        }

        $schedule->update(['status' => 'disetujui']);
        return back()->with('success', 'Permohonan berhasil disetujui!');
    }

    public function reject(Schedule $schedule)
    {
        $user = Auth::user();
        $roomName = strtoupper($schedule->room->name);
        $isRestricted = str_contains($roomName, 'AULA') || str_contains($roomName, 'LAB');

        if ($isRestricted && !$user->is_sarpras) {
            return back()->with('error', 'Akses Ditolak! Hanya Sarpras yang boleh menolak permohonan Aula/Lab.');
        }

        $schedule->update(['status' => 'ditolak']);
        return back()->with('error', 'Permohonan telah ditolak.');
    }

    public function antreanIndex()
    {
        $user = Auth::user();

        if (!$user->is_sarpras && !$user->is_osis) {
            abort(403);
        }

        $query = Schedule::with(['user', 'room'])->where('status', 'pending');

        if ($user->is_osis) {
            $query->whereHas('room', function($q) {
                $q->where('name', 'LIKE', 'RT %') // Harus RT
                ->where('name', 'NOT LIKE', '%AULA%') // Bukan Aula
                ->where('name', 'NOT LIKE', '%LAB%');  // Bukan Lab
            });
        }

        $antrean = $query->orderBy('date', 'asc')->get();

        return view('admin.antrean_list', compact('antrean'));
    }
}
