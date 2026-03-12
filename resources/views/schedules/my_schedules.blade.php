@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-black text-white uppercase tracking-tighter italic">Peminjaman Saya</h2>
        <a href="{{ route('schedules.create') }}" class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white rounded-2xl font-bold text-sm transition-all shadow-lg shadow-indigo-600/20">
            <i class="fa-solid fa-plus mr-2"></i> Pinjam Lagi
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-2xl text-green-200 text-sm font-bold flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-[2.5rem] p-6 shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-indigo-200/40 text-[10px] uppercase tracking-[0.2em]">
                        <th class="px-4 py-2 font-black italic">Ruangan</th>
                        <th class="px-4 py-2 font-black italic text-center">Keperluan</th>
                        <th class="px-4 py-2 font-black italic text-center">Waktu</th>
                        <th class="px-4 py-2 font-black italic text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mySchedules as $item)
                    <tr class="bg-white/[0.03] border border-white/10 rounded-2xl overflow-hidden hover:bg-white/[0.05] transition-all">
                        <td class="px-4 py-5 rounded-l-2xl">
                            <span class="text-sm font-bold text-white">{{ $item->room->name }}</span>
                        </td>
                        <td class="px-4 py-5 text-center">
                            <span class="text-xs text-indigo-200">{{ $item->description }}</span>
                        </td>
                        <td class="px-4 py-5 text-center">
                            <div class="flex flex-col">
                                <span class="text-[11px] font-bold text-white italic">{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</span>
                                <span class="text-[10px] text-indigo-100/40">{{ $item->start_session }} - {{ $item->end_session }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-5 text-center rounded-r-2xl">
                            @if($item->status == 'pending')
                                <span class="px-3 py-1 bg-yellow-500/10 text-yellow-400 text-[10px] font-black rounded-lg border border-yellow-500/20 uppercase italic">
                                    <i class="fa-solid fa-clock-rotate-left mr-1"></i> Menunggu
                                </span>
                            @elseif($item->status == 'disetujui')
                                <span class="px-3 py-1 bg-green-500/10 text-green-400 text-[10px] font-black rounded-lg border border-green-500/20 uppercase italic">
                                    <i class="fa-solid fa-check-double mr-1"></i> Disetujui
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-500/10 text-red-400 text-[10px] font-black rounded-lg border border-red-500/20 uppercase italic">
                                    <i class="fa-solid fa-xmark mr-1"></i> Ditolak
                                </span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-20 opacity-20">
                            <i class="fa-solid fa-folder-open text-4xl mb-4 text-white"></i>
                            <p class="font-black uppercase italic tracking-widest text-sm text-white">Belum ada riwayat peminjaman</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
