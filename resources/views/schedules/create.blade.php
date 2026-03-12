@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white/5 border border-white/10 backdrop-blur-md rounded-[2.5rem] p-10 shadow-2xl">
        <h2 class="text-2xl font-black text-white mb-8 uppercase tracking-tighter italic">Form Peminjaman</h2>

        {{-- Cek jadwal bentrok atau ngga --}}
        @if ($errors->has('conflict'))
            <div id="alert-conflict" class="mb-6 bg-red-500/20 border border-red-500/50 p-4 rounded-2xl flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation text-red-400"></i>
                <p class="text-xs font-bold text-red-100 uppercase italic">{{ $errors->first('conflict') }}</p>
            </div>
        @endif

        <form action="{{ route('schedules.store') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black text-indigo-200 uppercase tracking-widest mb-2 ml-1">Pilih Ruangan</label>
                <select name="room_id" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" class="bg-indigo-900">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-indigo-200 uppercase tracking-widest mb-2 ml-1">Tanggal</label>
                    <input type="date" name="date" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-indigo-200 uppercase tracking-widest mb-2 ml-1">Keperluan</label>
                    <select name="type" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="Ekskul" class="bg-indigo-900">Ekskul</option>
                        <option value="Rapat" class="bg-indigo-900">Rapat</option>
                        <option value="Lainnya" class="bg-indigo-900">Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[10px] font-black text-indigo-200 uppercase tracking-widest mb-2 ml-1">Jam Mulai</label>
                    <input type="time" name="start_session" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white outline-none">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-indigo-200 uppercase tracking-widest mb-2 ml-1">Jam Selesai</label>
                    <input type="time" name="end_session" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white outline-none">
                </div>
            </div>

            <div>
                <label class="block text-[10px] font-black text-indigo-200 uppercase tracking-widest mb-2 ml-1">Keterangan</label>
                <textarea name="description" rows="3" placeholder="Contoh: Latihan Basket" class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            <button type="submit" class="w-full py-5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-lg shadow-indigo-600/20 transition-all transform hover:-translate-y-1">
                Kirim Permohonan
            </button>
        </form>
    </div>
</div>
@endsection
