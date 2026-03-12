@extends('layouts.auth')

@section('main')
<div class="flex min-h-screen flex-col justify-center px-6 py-8 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md bg-white/5 backdrop-blur-md shadow-2xl rounded-3xl overflow-hidden transform hover:scale-[1.01] transition-all duration-500 border border-white/20">
        <div class="pt-8 flex flex-col items-center justify-center">
            <div class="w-16 h-16 bg-indigo-600 rounded-2xl shadow-lg flex items-center justify-center mb-4 rotate-3">
                <i class="fa-solid fa-user-plus text-white text-3xl"></i>
            </div>
            <h2 class="text-center text-2xl font-black tracking-tight text-white">
                CREATE ACCOUNT
            </h2>
            <p class="text-xs text-indigo-100 font-medium tracking-widest uppercase opacity-80">Gabung di E-Ruangan</p>
            <div class="mt-6 w-full h-[1px] bg-indigo-500/30"></div>
        </div>

        <div class="p-8 sm:px-10 py-6">
            <form class="space-y-3" action="{{ route('register') }}" method="POST">

                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-indigo-100 ml-1 opacity-80">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all placeholder:text-white/30">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-indigo-100 ml-1 opacity-80">Role</label>
                        <select name="role" required
                            class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all [&>option]:text-gray-900">
                            <option value="murid">Murid</option>
                            <option value="guru">Guru</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase text-indigo-100 ml-1 opacity-80">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all">
                </div>

                <div>
                    <label class="block text-[10px] font-bold uppercase text-indigo-100 ml-1 opacity-80">Study Group (Kelas)</label>
                    <select name="study_groups_id"
                        class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all [&>option]:text-gray-900">
                        <option value="">Pilih Kelas (Opsional)</option>
                        @foreach($studyGroups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-indigo-100 ml-1 opacity-80">Password</label>
                        <input type="password" name="password" required
                            class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold uppercase text-indigo-100 ml-1 opacity-80">Confirm</label>
                        <input type="password" name="password_confirmation" required
                            class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full rounded-xl bg-indigo-600 py-3 text-sm font-black uppercase tracking-widest text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-500 active:scale-95 transition-all">
                        Register Account
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-[11px] text-indigo-100/60 font-medium tracking-wide">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-bold text-white hover:text-indigo-300 transition-colors underline underline-offset-4 decoration-indigo-500/50">
                    Sign In Disini
                </a>
            </p>
        </div>
    </div>
</div>
@endsection
