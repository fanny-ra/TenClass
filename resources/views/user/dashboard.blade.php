@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h2 class="text-3xl font-black tracking-tight text-white italic">Halo, {{ Auth::user()->name }}!</h2>
    <p class="text-indigo-200/60 font-medium tracking-tight">Siap untuk belajar di ruangan mana hari ini?</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    {{-- Riwayat Peminjaman User --}}
    <div class="lg:col-span-2">
    <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-[2.5rem] p-8 shadow-2xl">
        <h3 class="text-xl font-bold text-white mb-6 flex items-center gap-3">
            <div class="p-2 bg-indigo-500/20 rounded-lg">
                <i class="fa-solid fa-door-closed text-indigo-400 text-sm"></i>
            </div>
            Ruangan Terpakai
        </h3>

        <p class="text-xs text-indigo-200/40 mb-6 italic">*Daftar ruangan di bawah ini sudah tidak tersedia untuk dipinjam pada waktu yang tertera.</p>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-separate border-spacing-y-3">
            <thead>
                <tr class="text-indigo-200/40 text-[10px] uppercase tracking-[0.2em]">
                    <th class="px-4 py-2 font-black">Ruangan</th>
                    <th class="px-4 py-2 font-black text-center">Keperluan / Kelas</th>
                    <th class="px-4 py-2 font-black text-center">Waktu & Sesi</th>
                    <th class="px-4 py-2 font-black text-center">Peminjam</th>
                </tr>
            </thead>
            <tbody>
                @forelse($schedules as $item)
                <tr class="bg-white/[0.03] border border-white/10 rounded-2xl overflow-hidden shadow-sm hover:bg-white/[0.05] transition-all">
                    <td class="px-4 py-4 rounded-l-2xl">
                        <span class="text-sm font-bold text-white">{{ $item->room->name }}</span>
                    </td>

                    <td class="px-4 py-4 text-center">
                        <span class="px-3 py-1 bg-indigo-500/10 text-indigo-300 text-[10px] font-bold rounded-lg border border-indigo-500/20 uppercase">
                            {{ $item->description ?? $item->type }}
                        </span>
                    </td>

                    <td class="px-4 py-4 text-center">
                        <div class="flex flex-col">
                            <span class="text-[11px] font-bold text-indigo-100 italic">
                                {{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}
                            </span>
                            <span class="text-[10px] text-indigo-100/40 font-medium">
                                {{ \Carbon\Carbon::parse($item->start_session)->format('H:i') }} - {{ \Carbon\Carbon::parse($item->end_session)->format('H:i') }}
                            </span>
                        </div>
                    </td>

                    <td class="px-4 py-4 text-center rounded-r-2xl">
                        <span class="text-xs font-medium text-indigo-200">{{ $item->user->name }}</span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-20">
                        <div class="flex flex-col items-center opacity-20">
                            <i class="fa-solid fa-calendar-xmark text-4xl mb-4"></i>
                            <p class="font-black uppercase italic tracking-widest text-sm">Semua ruangan tersedia hari ini</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        </div>
    </div>

    {{-- Profil & Action --}}
    <div class="space-y-6">
        <div class="bg-gradient-to-br from-indigo-600 to-blue-700 rounded-[2.5rem] p-8 shadow-xl shadow-indigo-600/20 relative overflow-hidden group">
            <div class="relative z-10">
                <p class="text-[10px] text-indigo-100 font-black uppercase tracking-[0.2em] opacity-70">Identitas User</p>
                <h4 class="text-2xl font-black text-white mt-1 mb-4">
                    {{ Auth::user()->studyGroup->name ?? 'Umum / Guru' }}
                </h4>
                <div class="h-[1px] w-12 bg-white/30 mb-4 group-hover:w-20 transition-all duration-500"></div>
                <p class="text-[10px] text-white/60 font-medium italic">Anda terdaftar sebagai {{ ucfirst(Auth::user()->role) }}</p>
            </div>
            <i class="fa-solid fa-graduation-cap absolute -bottom-4 -right-4 text-white/10 text-8xl rotate-12 group-hover:rotate-0 transition-transform duration-700"></i>
        </div>

        <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-[2.5rem] p-8">
            <h4 class="text-xs font-black text-white uppercase tracking-[0.2em] mb-4">Akses Cepat</h4>
            <p class="text-[11px] text-indigo-100/50 leading-relaxed mb-6 font-medium">
                Gunakan fitur ini untuk melihat jadwal kosong dan mengajukan izin penggunaan ruangan.
            </p>
            <a href="{{ route('schedules.index') }}" class="block w-full py-4 bg-white/5 hover:bg-white text-white hover:text-indigo-950 rounded-2xl text-[10px] font-black text-center transition-all border border-white/10 uppercase tracking-[0.2em]">
                Cek Ketersediaan <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>
@endsection
