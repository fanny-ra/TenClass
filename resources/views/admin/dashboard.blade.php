@extends('layouts.app')

@section('content')
<div class="mb-8 flex justify-between items-end">
    <div>
        <h2 class="text-3xl font-black text-white italic">Halo, {{ Auth::user()->name }}!</h2>
        <p class="text-indigo-200/60 font-medium">Monitoring Aktivitas Ruangan</p>
    </div>
    <div class="hidden md:block">
        <span class="px-4 py-2 bg-indigo-600 rounded-xl text-xs font-black tracking-widest uppercase shadow-lg shadow-indigo-500/20">
            Mode: {{ Auth::user()->is_sarpras ? 'Sarpras' : 'OSIS' }}
        </span>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white/5 border border-white/10 backdrop-blur-md p-6 rounded-[2rem]">
        <i class="fa-solid fa-file-invoice text-indigo-500 text-2xl mb-4"></i>
        <h3 class="text-indigo-100/50 text-xs font-bold uppercase tracking-widest">Total Antrean</h3>
        <p class="text-3xl font-black text-white">{{ $pendingRequests->count() }}</p>
    </div>
    <div class="bg-white/5 border border-white/10 backdrop-blur-md p-6 rounded-[2rem]">
        <i class="fa-solid fa-circle-exclamation text-amber-500 text-2xl mb-4"></i>
        <h3 class="text-indigo-100/50 text-xs font-bold uppercase tracking-widest">Butuh Respon</h3>
        <p class="text-3xl font-black text-white">{{ $pendingRequests->count() }}</p>
    </div>
    <div class="bg-white/5 border border-white/10 backdrop-blur-md p-6 rounded-[2rem]">
        <i class="fa-solid fa-building-circle-check text-emerald-500 text-2xl mb-4"></i>
        <h3 class="text-indigo-100/50 text-xs font-bold uppercase tracking-widest">Ruangan Digunakan</h3>
        <p class="text-3xl font-black text-white">{{ $schedules->count() }}</p>
    </div>
</div>

<div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-[2.5rem] overflow-hidden">
    <div class="p-8 border-b border-white/10 flex justify-between items-center">
        <h3 class="font-black text-xl tracking-tight italic">Antrean Persetujuan</h3>
        <a href="{{ route('admin.antrean') }}" class="text-[10px] font-bold text-indigo-400 hover:text-white transition-all uppercase tracking-widest">
            Lihat Semua Laporan <i class="fa-solid fa-arrow-right ml-2"></i>
        </a>   
    </div>
    <div class="p-4 overflow-x-auto">
        <table class="w-full text-left">
            <thead>
                <tr class="text-indigo-200/30 text-[10px] uppercase tracking-widest">
                    <th class="px-6 py-4">Peminjam</th>
                    <th class="px-6 py-4">Ruangan</th>
                </tr>
            </thead>
            <tbody class="text-white">
                @forelse($pendingRequests->take(5) as $req)
                <tr class="hover:bg-white/5 transition-colors border-b border-white/5">
                    <td class="px-6 py-4">
                        <div class="font-bold">{{ $req->user->name }}</div>
                        <div class="text-[10px] text-indigo-100/40 uppercase tracking-tighter">{{ $req->description }}</div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium italic text-indigo-300">{{ $req->room->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-6 py-8 text-center text-white/20 italic text-sm">Tidak ada antrean persetujuan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection