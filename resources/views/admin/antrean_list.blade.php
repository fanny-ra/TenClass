@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-black text-white italic mb-8 uppercase">Daftar Antrean Peminjaman</h2>

    <div class="bg-white/5 border border-white/10 rounded-[2rem] overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-white/5 text-[10px] uppercase tracking-widest text-indigo-200/50">
                <tr>
                    <th class="px-6 py-4">Peminjam</th>
                    <th class="px-6 py-4">Ruangan</th>
                    <th class="px-6 py-4">Tanggal & Jam</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($antrean as $item)
                @php
                    // Cek apakah ini Aula/Lab dan user bukan Sarpras
                    $roomName = strtoupper($item->room->name);
                    $isRestricted = str_contains($roomName, 'AULA') || str_contains($roomName, 'LAB');
                    $canProcess = true;

                    if ($isRestricted && !Auth::user()->is_sarpras) {
                        $canProcess = false;
                    }
                @endphp
                <tr class="hover:bg-white/[0.02] transition-colors">
                    <td class="px-6 py-4">
                        <p class="text-white font-bold">{{ $item->user->name }}</p>
                        <p class="text-[10px] text-white/40">{{ $item->description }}</p>
                    </td>
                    <td class="px-6 py-4 text-indigo-300 font-medium">{{ $item->room->name }}</td>
                    <td class="px-6 py-4 text-white/60 text-sm">
                        {{ $item->date }} <br>
                        <span class="text-[10px]">{{ $item->start_session }} - {{ $item->end_session }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            @if($canProcess)
                                <form action="{{ route('admin.schedules.approve', $item->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <button class="px-4 py-2 bg-green-500 text-white rounded-xl text-[10px] font-black uppercase hover:bg-green-600 transition-all">Setujui</button>
                                </form>
                                <form action="{{ route('admin.schedules.reject', $item->id) }}" method="POST">
                                    @csrf @method('PUT')
                                    <button class="px-4 py-2 bg-red-500/20 text-red-500 rounded-xl text-[10px] font-black uppercase hover:bg-red-500 hover:text-white transition-all">Tolak</button>
                                </form>
                            @else
                                <span class="text-[9px] text-white/20 italic uppercase tracking-tighter">Otoritas Sarpras</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-white/20 italic text-sm">Tidak ada antrean saat ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection