<div class="flex flex-col h-0 flex-1 bg-[#90EE90]">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
            <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="CariPemimpin Logo">
            <span class="ml-2 text-xl font-bold text-white">CariPemimpin</span>
        </div>
        <nav class="mt-5 flex-1 px-2 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'bg-green-800 text-white' : 'text-white hover:bg-green-600' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: home -->
                <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.calon.index') }}"
                class="{{ request()->routeIs('admin.calon.*') ? 'bg-green-800 text-white' : 'text-white hover:bg-green-600' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: user-group -->
                <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Calon
            </a>

            <a href="{{ route('admin.daerah.index') }}"
                class="{{ request()->routeIs('admin.daerah.*') ? 'bg-green-800 text-white' : 'text-white hover:bg-green-600' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: map -->
                <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Daerah
            </a>

            <a href="{{ route('admin.komentar.index') }}"
                class="{{ request()->routeIs('admin.komentar.*') ? 'bg-green-800 text-white' : 'text-white hover:bg-green-600' }} group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                <!-- Heroicon name: chat -->
                <svg class="mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                Komentar
            </a>
        </nav>
    </div>
    <div class="flex-shrink-0 flex bg-green-700 p-4">
        <div class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-9 w-9 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
                        alt="{{ Auth::user()->name }}">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">
                        {{ Auth::user()->name }}
                    </p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-xs font-medium text-green-200 group-hover:text-white">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
