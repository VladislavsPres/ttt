<nav class="border-b-2 border-black bg-white">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 h-16">

        <!-- left part -->
        <div class="flex gap-6 items-center">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold uppercase border-b-2 border-black">ProjectTT</a>

            <a href="{{ route('dashboard') }}" class="uppercase text-sm border-b border-black hover:text-blue-600">Dashboard</a>
            <a href="{{ route('galleries.index') }}" class="uppercase text-sm border-b border-black hover:text-blue-600">Galleries</a>
        </div>

        <!-- Language Dropdown -->
<div x-data="{ openLang: false }" class="relative">
    <button @click="openLang = !openLang"
            class="text-sm text-gray-700 hover:text-blue-600 border-b border-black flex items-center gap-1">
         {{ strtoupper(app()->getLocale()) }}
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="openLang" @click.away="openLang = false"
         class="absolute right-0 mt-2 w-32 bg-white border border-black rounded shadow z-50">
        <a href="{{ route('locale.switch', 'en') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">🇬🇧 English</a>
        <a href="{{ route('locale.switch', 'lv') }}"
           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">🇱🇻 Latviešu</a>
    </div>
</div>


            <!-- user -->
            @auth
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="text-sm uppercase border-b border-black">
                        {{ Auth::user()->name }}
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white border border-black shadow p-2 z-50">
                        <a href="{{ route('profile.edit') }}" class="block uppercase text-xs py-1 border-b border-black hover:text-blue-600">Edit Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left uppercase text-xs py-1 border-b border-black text-red-600 hover:text-black">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="text-sm uppercase border-b border-black hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}" class="ml-2 text-sm uppercase border-b border-black hover:text-blue-600">Register</a>
            @endguest
        </div>
    </div>
</nav>
