<nav class="bg-white/5 backdrop-blur-md border-b border-white/10 sticky top-0 z-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                {{-- Logo --}}
                <div class="flex-shrink-0 flex items-center gap-2">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center rotate-3">
                        <i class="fa-solid fa-school text-white text-sm"></i>
                    </div>
                    <span class="text-white font-black tracking-tighter text-xl">TEN CLASS</span>
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        {{-- Dashboard --}}
                        <a href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'bg-indigo-600 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }} px-3 py-2 rounded-xl text-sm font-bold tracking-wide transition-all">
                            Dashboard
                        </a>

                        @if(Auth::user()->is_sarpras || Auth::user()->is_osis)
                            {{-- Antrean (Khusus Admin) --}}
                            <a href="{{ route('admin.antrean') }}"
                            class="{{ request()->routeIs('admin.antrean') ? 'bg-indigo-600 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }} px-3 py-2 rounded-xl text-sm font-medium transition-all">
                                Antrean Peminjaman
                            </a>

                            {{-- Status Ruangan --}}
                            <a href="{{ route('schedules.index') }}"
                            class="{{ request()->routeIs('schedules.index') ? 'bg-indigo-600 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }} px-3 py-2 rounded-xl text-sm font-medium transition-all">
                                Status Ruangan
                            </a>
                        @else
                            {{-- Peminjaman Saya --}}
                            <a href="{{ route('schedules.mine') }}"
                            class="{{ request()->routeIs('schedules.mine') ? 'bg-indigo-600 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }} px-3 py-2 rounded-xl text-sm font-medium transition-all">
                                Peminjaman Saya
                            </a>

                            {{-- Buat Peminjaman --}}
                            <a href="{{ route('schedules.create') }}"
                            class="{{ request()->routeIs('schedules.create') ? 'bg-indigo-600 text-white' : 'text-indigo-100 hover:bg-white/10 hover:text-white' }} px-3 py-2 rounded-xl text-sm font-medium transition-all">
                                Buat Peminjaman
                            </a>
                        @endif

                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="relative ml-3 group">
                    <button type="button" class="flex max-w-xs items-center rounded-full bg-white/10 text-sm focus:outline-none ring-2 ring-white/20 p-0.5 transition-all hover:ring-indigo-500">
                        <img class="h-8 w-8 rounded-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff" alt="User profile">
                        <span class="ml-2 mr-2 text-white font-bold text-xs hidden sm:block">{{ Auth::user()->name }}</span>
                    </button>

                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-2xl bg-white py-1 shadow-2xl ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform scale-95 group-hover:scale-100 overflow-hidden">

                    <div class="px-5 py-3 border-b border-gray-100 bg-gray-50/50">
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">User Profile</p>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-5 py-3 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white transition-all duration-200">
                        <i class="fa-regular fa-user text-xs"></i>
                        <span>Your Profile</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="w-full text-left flex items-center gap-3 px-5 py-3 text-sm text-red-600 hover:bg-red-50 transition-all duration-200">
                            <i class="fa-solid fa-arrow-right-from-bracket text-xs"></i>
                            <span class="font-medium">Sign out</span>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
