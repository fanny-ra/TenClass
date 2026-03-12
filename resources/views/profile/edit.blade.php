@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-black text-white mb-10 uppercase italic tracking-tighter">Pengaturan Profil</h2>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 text-green-400 rounded-2xl flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i>
            <span class="text-sm font-bold">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('warning'))
        <div class="mb-6 p-4 bg-yellow-500/20 border border-yellow-500/50 text-yellow-400 rounded-2xl flex items-center gap-3">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span class="text-sm font-bold">{{ session('warning') }}</span>
        </div>
    @endif

    <div class="bg-white/5 border border-white/10 rounded-[2rem] p-8 backdrop-blur-md">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-full md:col-span-1">
                    <label class="block text-indigo-300 text-[10px] uppercase font-black tracking-widest mb-2 ml-4">Username</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-indigo-500 transition-all">
                    @error('name') <p class="text-red-400 text-[10px] mt-2 ml-4 font-bold uppercase">{{ $message }}</p> @enderror
                </div>

                <div class="col-span-full md:col-span-1">
                    <label class="block text-indigo-300 text-[10px] uppercase font-black tracking-widest mb-2 ml-4">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-indigo-500 transition-all">
                    @error('email') <p class="text-red-400 text-[10px] mt-2 ml-4 font-bold uppercase">{{ $message }}</p> @enderror
                </div>

                <div class="col-span-full md:col-span-1 opacity-60">
                    <label class="block text-gray-400 text-[10px] uppercase font-black tracking-widest mb-2 ml-4">Role</label>
                    <div class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-gray-400 cursor-not-allowed">
                        {{ strtoupper($user->role) }}
                        @if($user->is_sarpras) (SARPRAS) @elseif($user->is_osis) (OSIS) @endif
                    </div>
                </div>

                <div class="col-span-full md:col-span-1 opacity-60">
                    <label class="block text-gray-400 text-[10px] uppercase font-black tracking-widest mb-2 ml-4">Kelas</label>
                    <div class="w-full bg-white/5 border border-white/5 rounded-2xl px-6 py-4 text-gray-400 cursor-not-allowed">
                        {{ $user->studyGroup->name ?? 'Tidak Ada Kelas' }}
                    </div>
                </div>

                <div class="col-span-full border-t border-white/5 my-4"></div>

                <div class="col-span-full md:col-span-1">
                    <label class="block text-indigo-300 text-[10px] uppercase font-black tracking-widest mb-2 ml-4">Password Baru</label>
                    <input type="password" name="password" placeholder="••••••••"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>


                <div class="col-span-full md:col-span-1">
                    <label class="block text-indigo-300 text-[10px] uppercase font-black tracking-widest mb-2 ml-4">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••"
                        class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>

                <div class="col-span-full flex gap-4 mt-6">
                    <button type="submit"
                        class="flex-1 py-4 bg-indigo-600 hover:bg-indigo-500 text-white font-black uppercase tracking-widest text-xs rounded-2xl transition-all shadow-lg shadow-indigo-500/20">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('home') }}"
                        class="flex-1 py-4 bg-red-700/20 hover:bg-red-500/20 text-white/60 text-center font-black uppercase tracking-widest text-xs rounded-2xl border border-white/10 transition-all">
                        Batal / Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
