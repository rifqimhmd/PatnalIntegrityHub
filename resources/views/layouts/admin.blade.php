<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Admin Panel</title>
    @vite(['resources/css/app.css'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased text-sm">

    <!-- HEADER -->
    <header class="bg-white border-b">
        <div class="flex justify-between items-center px-5 md:px-8 h-14">

            <!-- LEFT -->
            <div class="flex items-center gap-4">

                <!-- MOBILE MENU -->
                <button id="menuBtn" class="md:hidden text-gray-600 text-xl">
                    ☰
                </button>

                <!-- DESKTOP LOGO -->
                <div class="hidden md:flex items-center gap-3">
                    <img src="{{ asset('images/logo/Logo.png') }}"
                        class="h-9 object-contain"
                        alt="Logo">
                </div>
            </div>

            <!-- RIGHT -->
            @auth
            <div x-data="{open:false}" class="relative">

                <button
                    @click="open=!open"
                    class="flex items-center gap-2 px-3 py-1.5 rounded-lg 
                           bg-gray-100 hover:bg-gray-200 
                           text-gray-700 font-medium transition">

                    <span class="text-sm">{{ auth()->user()->nama_lengkap }}</span>

                    <svg
                        class="w-4 h-4 transition-transform duration-200"
                        :class="open ? 'rotate-180' : ''"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div
                    x-show="open"
                    x-transition
                    x-cloak
                    @click.away="open=false"
                    class="absolute right-0 mt-2 w-40 bg-white rounded-md 
                           shadow-lg border border-gray-100 overflow-hidden">

                    <a href="/"
                        class="block px-3 py-2 hover:bg-gray-50 transition">
                        Beranda
                    </a>

                    <a href="/ubah-password"
                        class="block px-3 py-2 hover:bg-gray-50 transition">
                        Profil
                    </a>

                    <div class="border-t"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="w-full text-left px-3 py-2 
                                   hover:bg-red-50 hover:text-red-600 transition">
                            Keluar
                        </button>
                    </form>

                </div>
            </div>
            @endauth

        </div>
    </header>

    <div class="flex">

        <!-- OVERLAY -->
        <div id="overlay"
            class="fixed inset-0 bg-black bg-opacity-30 hidden md:hidden z-40">
        </div>

        <!-- SIDEBAR -->
        <aside id="sidebar"
            class="fixed md:static z-50 top-0 left-0 w-56 bg-white 
                   min-h-screen border-r
                   transform -translate-x-full md:translate-x-0 
                   transition-transform duration-300">

            <!-- MOBILE LOGO -->
            <div class="md:hidden p-4 border-b">
                <img src="{{ asset('images/logo/Logo.png') }}"
                    class="h-8 object-contain"
                    alt="Logo">
            </div>

            <nav class="p-4 space-y-1" x-data="{ openBeranda: false }">

                <!-- Dashboard -->
                <a href="/admin"
                    class="block px-3 py-2 rounded-md hover:bg-gray-100 transition">
                    Dashboard
                </a>

                <!-- Manajemen Beranda -->
                <div>
                    <button
                        @click="openBeranda = !openBeranda"
                        class="w-full flex justify-between items-center px-3 py-2 rounded-md hover:bg-gray-100 transition">

                        <span>Manajemen Beranda</span>

                        <svg
                            class="w-4 h-4 transition-transform duration-200"
                            :class="openBeranda ? 'rotate-180' : ''"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        x-show="openBeranda"
                        x-transition
                        x-cloak
                        class="ml-3 mt-1 space-y-1">

                        <a href="/admin/banner"
                            class="block px-3 py-1.5 rounded-md hover:bg-gray-100 transition">
                            Banner
                        </a>

                        <a href="/admin/peraturan"
                            class="block px-3 py-1.5 rounded-md hover:bg-gray-100 transition">
                            Peraturan
                        </a>

                        <a href="/admin/sop"
                            class="block px-3 py-1.5 rounded-md hover:bg-gray-100 transition">
                            SOP
                        </a>

                        <a href="/admin/video"
                            class="block px-3 py-1.5 rounded-md hover:bg-gray-100 transition">
                            Video
                        </a>

                    </div>
                </div>

                <!-- Manajemen User -->
                <a href="/admin/users"
                    class="block px-3 py-2 rounded-md hover:bg-gray-100 transition">
                    Manajemen User
                </a>

                <!-- Laporan -->
                <a href="/admin/laporan"
                    class="block px-3 py-2 rounded-md hover:bg-gray-100 transition">
                    Laporan
                </a>

            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- TOGGLE -->
    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>

</body>

</html>