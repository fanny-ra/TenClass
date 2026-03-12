@extends('layouts.auth')

@section('main')
<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md bg-white/5 backdrop-blur-md shadow-2xl rounded-3xl overflow-hidden transform hover:scale-[1.01] transition-all duration-500 border border-white/20">
        <div class="pt-8 flex flex-col items-center justify-center">
            <div class="w-16 h-16 bg-indigo-600 rounded-2xl shadow-lg flex items-center justify-center mb-4 rotate-3">
                <i class="fa-solid fa-school text-white text-3xl"></i>
            </div>
            <h2 class="text-center text-2xl font-black tracking-tight text-white">
                E-RUANGAN
            </h2>
            <p class="text-xs text-indigo-100 font-medium tracking-widest uppercase opacity-80">Sistem Management Ruangan</p>
            <div class="mt-6 w-full h-[1px] bg-indigo-500/30"></div>
        </div>

        <div class="p-8 sm:p-10">
            <form class="space-y-4" action="{{ route('login') }}" method="POST">
                @csrf
                @if($errors->any() || session('success'))
                    <div id="alert-container" class="transition-opacity duration-1000">
                        {{-- Cek password atau email salah --}}
                        @if($errors->any())
                            <div class="bg-red-600 border border-red-400 rounded-xl p-3 mb-4 shadow-lg">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-circle-exclamation text-white mr-2"></i>
                                    <p class="text-xs font-black text-white uppercase tracking-tight">
                                        Password atau Email Anda Salah
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="bg-emerald-600 border border-emerald-400 rounded-xl p-3 mb-4 shadow-lg">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-circle-check text-white mr-2"></i>
                                    <p class="text-xs font-black text-white uppercase tracking-tight">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        @endif

                    </div>
                @endif

                <div>
                    <label class="block text-xs font-bold uppercase text-indigo-100 ml-1 opacity-80">Email Address</label>
                    <input type="email" name="email" required
                        class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2.5 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all placeholder:text-white/30">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-indigo-100 ml-1 opacity-80">Password</label>
                    <input type="password" name="password" required
                        class="mt-1 block w-full rounded-xl border-0 bg-white/10 py-2.5 px-4 text-white ring-1 ring-inset ring-white/20 focus:ring-2 focus:ring-indigo-500 sm:text-sm transition-all placeholder:text-white/30">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full rounded-xl bg-indigo-600 py-3 text-sm font-black uppercase tracking-widest text-white shadow-lg shadow-indigo-500/20 hover:bg-indigo-500 active:scale-95 transition-all">
                        Sign In
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-xs text-indigo-100/60">
                Not a member?
                <a href="{{ route('register') }}" class="font-bold text-white hover:text-indigo-300 transition-colors">
                    Create an account
                </a>
            </p>
        </div>
    </div>
</div>

<script>
    (function() {
        const target = document.getElementById('alert-container');
        if (target) {
            setTimeout(function() {
                target.style.transition = "opacity 1s ease";
                target.style.opacity = "0";
                setTimeout(function() {
                    target.remove();
                }, 1000);
            }, 2000);
        }
    })();
</script>

@endsection
