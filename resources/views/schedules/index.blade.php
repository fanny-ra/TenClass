@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-black text-white mb-10 uppercase italic tracking-tighter">Status Ruangan Hari Ini</h2>

    {{-- TERSEDIA --}}
    <div class="mb-12">
        <h3 class="text-green-400 font-bold mb-6 flex items-center gap-2 uppercase tracking-widest text-[10px]">
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
            Siap Digunakan
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse($availableRooms as $room)
                <div class="bg-white/5 border border-white/10 rounded-[2rem] p-6 text-center hover:bg-white/10 transition-all group">
                    <div class="flex items-center justify-center gap-2 mb-4">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                        <h4 class="text-xl font-bold text-white italic tracking-tighter">{{ $room->name }}</h4>
                    </div>

                    @php
                        $roomName = strtoupper($room->name);
                        $isRT = str_contains($roomName, 'RT');
                        $showLabelOnly = false;

                        if (Auth::user()->is_sarpras) {
                            $showLabelOnly = true;
                        } elseif (Auth::user()->is_osis && $isRT) {
                            $showLabelOnly = true; 
                        }
                    @endphp

                    @if($showLabelOnly)
                        <div class="w-full py-3 bg-indigo-500/10 text-indigo-400/50 rounded-xl text-[10px] font-black uppercase border border-indigo-500/10 tracking-widest">
                            Tersedia
                        </div>
                    @else
                        <a href="{{ route('schedules.create', ['room_id' => $room->id]) }}"
                           class="block w-full py-3 bg-indigo-600 text-white rounded-xl text-[10px] font-black uppercase shadow-lg shadow-indigo-500/20 hover:bg-indigo-500 transition-all tracking-widest">
                            Pinjam Ruangan
                        </a>
                    @endif
                </div>
            @empty
                <div class="col-span-full bg-white/[0.02] border border-white/5 rounded-2xl p-8 text-center">
                    <p class="text-white/20 italic text-sm">Wah, sepertinya semua ruangan sudah penuh atau sedang menunggu konfirmasi.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- NUNGGU ACC --}}
    <div class="mb-12">
        <h3 class="text-yellow-400 font-bold mb-6 flex items-center gap-2 uppercase tracking-widest text-[10px]">
            <span class="w-2 h-2 bg-yellow-500 rounded-full animate-bounce"></span>
            Menunggu Konfirmasi Admin
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse($pendingSchedules as $schedule)
                <div class="bg-yellow-500/5 border border-yellow-500/20 rounded-[2rem] p-6 relative overflow-hidden">
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-500/10 rounded-full blur-2xl"></div>

                    <h4 class="text-xl font-bold text-yellow-100/80 mb-1 italic tracking-tighter">{{ $schedule->room->name }}</h4>
                    <h5 class="text-yellow-500 text-[9px] uppercase font-bold mb-2 italic tracking-tight">Sudah Dibooking (Pending)</h5>

                    <div class="mb-6 p-3 bg-yellow-500/5 rounded-xl border border-yellow-500/10">
                        <p class="text-[10px] text-white/40 uppercase font-medium mb-1">Peminjam:</p>
                        <p class="text-xs text-yellow-200/80 font-bold italic">{{ $schedule->user->name }}</p>
                    </div>

                    {{-- Sarpras/OSIS bisa klik untuk memproses --}}
                    @if(Auth::user()->is_sarpras || Auth::user()->is_osis)
                        <a href="{{ route('admin.antrean') }}"
                           class="block w-full text-center py-3 bg-yellow-500 text-black rounded-xl text-[10px] font-black uppercase hover:bg-yellow-400 transition-all tracking-widest shadow-lg shadow-yellow-500/20">
                            Konfirmasi
                        </a>
                    @else
                        <button disabled class="w-full py-3 bg-yellow-500/10 text-yellow-500/40 rounded-xl text-[10px] font-black uppercase cursor-not-allowed border border-yellow-500/10 tracking-widest">
                            Sedang Diproses
                        </button>
                    @endif
                </div>
            @empty
                <p class="text-white/20 italic text-sm ml-2 font-light">Tidak ada permohonan yang sedang menunggu konfirmasi.</p>
            @endforelse
        </div>
    </div>

    {{-- TERPAKAI --}}
    <div>
        <h3 class="text-red-400/50 font-bold mb-6 flex items-center gap-2 uppercase tracking-widest text-[10px]">
            <span class="w-2 h-2 bg-red-500 rounded-full"></span>
            Terjadwal / Digunakan Hari Ini
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse($activeSchedules as $schedule)
                <div class="bg-red-500/5 border border-red-500/20 rounded-[2rem] p-6 opacity-80 hover:opacity-100 transition-all">
                    <h4 class="text-xl font-bold text-red-100/80 mb-1 italic tracking-tighter">{{ $schedule->room->name }}</h4>
                    <p class="text-[10px] text-red-300/60 font-bold mb-2">
                        <i class="fa-regular fa-calendar-days mr-1"></i>
                        {{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }}
                    </p>

                    <div class="mb-4 py-1 px-3 bg-red-500/10 rounded-lg border border-red-500/10 inline-block">
                        <p class="text-[10px] text-red-200 font-mono">
                            {{ \Carbon\Carbon::parse($schedule->start_session)->format('H:i') }} -
                            {{ \Carbon\Carbon::parse($schedule->end_session)->format('H:i') }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-red-500/10">
                        <p class="text-[9px] text-white/30 uppercase font-medium">Peminjam: {{ $schedule->user->name }}</p>
                    </div>
                </div>
            @empty
                <p class="text-white/20 italic text-sm ml-2 font-light">Belum ada ruangan yang dikonfirmasi untuk hari ini.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
