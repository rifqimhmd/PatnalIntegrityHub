<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Admin Panel</title>
    @vite(['resources/css/app.css'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- HEADER -->
    <header class="bg-white shadow-md border-b">
        <div class="flex justify-between items-center px-6 md:px-8 py-4">

            <!-- LEFT SIDE -->
            <div class="flex items-center gap-4">

                <!-- MOBILE MENU BUTTON -->
                <button id="menuBtn" class="md:hidden text-gray-700">
                    ☰
                </button>

                <!-- LOGO -->
                <img src="{{ asset('images/logo/Logo.png') }}"
                    class="h-10 md:h-[52px] object-contain"
                    alt="Logo">

                <h1 class="text-lg font-semibold text-gray-800 hidden sm:block">
                    Admin Panel
                </h1>
            </div>

            <!-- RIGHT SIDE -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition shadow">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <div class="flex">

        <!-- OVERLAY (mobile only) -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 hidden md:hidden"></div>

        <!-- SIDEBAR -->
        <aside id="sidebar"
            class="fixed md:static z-50 top-0 left-0 w-64 bg-white shadow-xl min-h-screen p-6 border-r
                   transform -translate-x-full md:translate-x-0 transition-transform duration-300">

            <nav class="space-y-2 mt-10 md:mt-0">

                <a href="/admin"
                    class="block px-4 py-3 rounded-lg bg-gray-900 text-white shadow">
                    Dashboard
                </a>

                <a href="/admin/banner"
                    class="block px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                        Manajemen Banner
                </a>

                <a href="/admin/video"
                    class="block px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                        Manajemen Video
                </a>

                <a href="/admin/sop"
                    class="block px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                        Manajemen SOP
                </a>

                <a href="/admin/peraturan"
                    class="block px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                        Manajemen Peraturan
                </a>

                <a href="/admin/users"
                    class="block px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                    Manajemen User
                </a>

                <a href="/admin/laporan"
                    class="block px-4 py-3 rounded-lg hover:bg-gray-100 transition">
                    Laporan
                </a>

            </nav>
        </aside>

        <!-- CONTENT -->
        <main class="flex-1 p-6 md:p-10 w-full">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow border">
                @yield('content')
            </div>
        </main>

    </div>

    <!-- SIMPLE TOGGLE SCRIPT -->
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
