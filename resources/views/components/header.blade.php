<header
    x-data="{
        showMobileMenu: false,
        showAuthModal: false,
        openDropdown: null,
        scrollHidden: false,
        lastScroll: 0,
        mobileDropdown: { konten: false }
    }"

    @scroll.window="
        scrollHidden = (window.pageYOffset > lastScroll && window.pageYOffset > 80);
        lastScroll = window.pageYOffset;
    "
    x-effect="document.body.classList.toggle('overflow-hidden', showMobileMenu)"
    class="bg-white text-gray-800 shadow-md sticky top-0 z-50 transition-transform duration-500"
    :class="scrollHidden ? '-translate-y-full' : ''">

    <div class="container mx-auto flex justify-between items-center px-4 py-2.5 md:px-6 md:py-3">

        <!-- LEFT: LOGO & HAMBURGER -->
        <div class="flex items-center space-x-3">
            <button
                @click="showMobileMenu = !showMobileMenu"
                class="md:hidden relative w-5 h-5 focus:outline-none">

                <span class="absolute left-0 top-1/2 block h-[1.5px] w-5 bg-gray-700 transition-all duration-300"
                    :class="showMobileMenu ? 'rotate-45' : '-translate-y-1.5'"></span>

                <span class="absolute left-0 top-1/2 block h-[1.5px] w-5 bg-gray-700 transition-all duration-300"
                    :class="showMobileMenu ? 'opacity-0' : 'opacity-100'"></span>

                <span class="absolute left-0 top-1/2 block h-[1.5px] w-5 bg-gray-700 transition-all duration-300"
                    :class="showMobileMenu ? '-rotate-45' : 'translate-y-1.5'"></span>
            </button>

            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/logo/Logo.png') }}" class="h-10 md:h-[52px]" alt="Logo">
            </a>
        </div>

        <!-- DESKTOP NAV -->
        <nav class="hidden md:flex space-x-8 font-medium items-center">
            <a href="/" class="hover:text-blue-600">Beranda</a>

            <a href="{{ url('/') }}#pustakadokumen"
                class="hover:text-blue-600">
                Pustaka Dokumen
            </a>

            <a href="/about" class="hover:text-blue-600">
                Tentang Kami
            </a>
            @auth
            <div x-data="{open:false}" class="relative">

                <button
                    @click="open=!open"
                    class="flex items-center gap-2 px-4 py-2 rounded-xl 
               bg-gray-100 hover:bg-gray-200 
               text-gray-700 font-medium transition">

                    <span>{{ auth()->user()->nama_lengkap }}</span>

                    <!-- ARROW -->
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
                    @click.away="open=false"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-xl 
               shadow-xl border border-gray-100 overflow-hidden">

                    <a href="/{{ auth()->user()->nama_role }}"
                        class="block px-4 py-3 text-sm hover:bg-gray-50 transition">
                        Dashboard
                    </a>

                    <a href="#"
                        class="block px-4 py-3 text-sm hover:bg-gray-50 transition">
                        Profil Saya
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="w-full text-left px-4 py-3 text-sm 
                       hover:bg-red-50 hover:text-red-600 transition">
                            Keluar
                        </button>
                    </form>

                </div>
            </div>
            @endauth
            @guest
            <button
                @click="$dispatch('open-auth')"
                class="bg-blue-600 text-white px-5 py-2 rounded-xl">
                Masuk / Daftar
            </button>
            @endguest
        </nav>
    </div>

    <!-- MOBILE SIDEBAR -->
    <div
        x-show="showMobileMenu"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-[60px] left-0 w-72 h-[calc(100vh-64px)] bg-white shadow-lg z-40 md:hidden transform overflow-y-auto">

        <a href="/"
            @click="showMobileMenu = false"
            class="block px-6 py-3 hover:bg-gray-100">
            Beranda
        </a>

        <a href="{{ url('/') }}#pustakadokumen"
            @click="showMobileMenu = false"
            class="block px-6 py-3 hover:bg-gray-100">
            Pustaka Dokumen
        </a>

        <a href="/about"
            @click="showMobileMenu = false"
            class="block px-6 py-3 hover:bg-gray-100">
            Tentang Kami
        </a>
        @auth
        <div x-data="{open:false}" class="border-t border-gray-200 mt-3">

            <button
                @click="open=!open"
                class="w-full flex items-center justify-between 
               px-6 py-3 text-gray-700 font-medium">

                <span>{{ auth()->user()->nama_lengkap }}</span>

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

            <div x-show="open" x-transition class="bg-gray-50">

                <a href="/{{ auth()->user()->nama_role }}"
                    class="block px-8 py-3 text-sm hover:bg-gray-100">
                    Dashboard
                </a>

                <a href="#"
                    class="block px-8 py-3 text-sm hover:bg-gray-100">
                    Profil Saya
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="w-full text-left px-8 py-3 text-sm 
                       hover:bg-red-50 hover:text-red-600">
                        Keluar
                    </button>
                </form>

            </div>
        </div>
        @endauth
        @guest
        <div class="px-6 mt-4">
            <button
                @click="
            showMobileMenu = false;
            $dispatch('open-auth')
        "
                class="w-full bg-blue-600 text-white py-2 rounded-xl
               hover:bg-blue-700 transition font-semibold">
                Masuk / Daftar
            </button>
        </div>
        @endguest
    </div>

    <!-- OVERLAY -->
    <div
        x-show="showMobileMenu"
        x-transition.opacity
        @click="showMobileMenu = false"
        class="fixed top-[64px] left-0 right-0 bottom-0 bg-black bg-opacity-40 z-30 md:hidden">
    </div>

</header>

<!-- AUTH MODAL -->
<div
    x-data="{
        showAuthModal:false,
        tab:'login',
        showPassword:false,
        open(){ this.showAuthModal=true },
        close(){ this.showAuthModal=false },
        changeTab(t){ this.tab=t }
    }"
    x-init="
        @if(session('openAuth'))
            showAuthModal = true;
            tab = '{{ session('form') }}';
        @endif
    "
    x-on:open-auth.window="open()"
    x-show="showAuthModal"
    x-transition.opacity
    x-cloak
    @keydown.escape.window="close()"
    class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-[999] p-4">

    <div
        @click.away="close()"
        x-transition
        class="bg-white w-full max-w-md rounded-2xl shadow-2xl relative 
               max-h-[90vh] flex flex-col overflow-hidden">

        <!-- CLOSE -->
        <button
            @click="close()"
            class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            ✕
        </button>

        <!-- HEADER -->
        <div class="px-6 pt-5 pb-4 border-b text-center">
            <img
                src="{{ asset('images/logo/Logo.png') }}"
                class="mx-auto h-12 sm:h-14 mb-3 object-contain"
                alt="Logo">

            <div class="flex bg-gray-100 rounded-lg p-1">
                <button
                    @click="changeTab('login')"
                    :class="tab==='login'
                        ? 'bg-white shadow text-blue-600'
                        : 'text-gray-500'"
                    class="w-1/2 py-2 rounded-md font-medium transition">
                    Masuk
                </button>

                <button
                    @click="changeTab('register')"
                    :class="tab==='register'
                        ? 'bg-white shadow text-blue-600'
                        : 'text-gray-500'"
                    class="w-1/2 py-2 rounded-md font-medium transition">
                    Daftar
                </button>
            </div>
        </div>

        <!-- BODY SCROLL -->
        <div class="p-6 overflow-y-auto">

            <!-- ================= LOGIN ================= -->
            <div x-show="tab==='login'" x-transition>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <label class="text-sm text-gray-600">NIP</label>
                    <input
                        type="text"
                        name="nip"
                        required
                        maxlength="18"
                        pattern="[0-9]{1,18}"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        placeholder="Masukkan NIP"
                        class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 mb-4 focus:ring-2 focus:ring-blue-500">

                    <label class="text-sm text-gray-600">Password</label>
                    <div class="relative mb-5">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            placeholder="Masukkan Password"
                            class="w-full border border-gray-300 rounded-lg p-2.5 pr-11 focus:ring-2 focus:ring-blue-500">

                        <button
                            type="button"
                            @click="showPassword=!showPassword"
                            class="absolute inset-y-0 right-0 px-3 text-gray-400">
                            <span x-show="!showPassword">👁</span>
                            <span x-show="showPassword">🙈</span>
                        </button>
                    </div>

                    @if ($errors->has('login'))
                    <div class="mb-3 bg-red-100 text-red-700 p-2 rounded text-sm">
                        {{ $errors->first('login') }}
                    </div>
                    @endif

                    <button
                        class="w-full bg-blue-600 text-white py-3 rounded-xl
                               hover:bg-blue-700 transition font-semibold">
                        Masuk
                    </button>
                </form>

            </div>

            <!-- ================= REGISTER ================= -->
            <div x-show="tab==='register'" x-transition
                x-data="{
    password:'',
    showPassword:false,
    hasUpper:false,
    hasLower:false,
    hasNumber:false,
    hasSymbol:false,
    check(){
        this.hasUpper = /[A-Z]/.test(this.password)
        this.hasLower = /[a-z]/.test(this.password)
        this.hasNumber = /[0-9]/.test(this.password)
        this.hasSymbol = /[^A-Za-z0-9]/.test(this.password)
    }
}">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- NAMA -->
                    <label class="text-sm text-gray-600">Nama Lengkap (tanpa gelar)</label>
                    <input
                        type="text"
                        name="nama_lengkap"
                        required
                        placeholder="Masukkan Nama Lengkap"
                        class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 mb-3 focus:ring-2 focus:ring-blue-500">

                    <!-- NIP -->
                    <label class="text-sm text-gray-600">NIP (18 digit)</label>
                    <input
                        type="text"
                        name="nip"
                        required
                        maxlength="18"
                        pattern="[0-9]{18}"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        placeholder="Masukkan 18 digit NIP"
                        class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 mb-3 focus:ring-2 focus:ring-blue-500">

                    <!-- ROLE -->
                    <label class="text-sm text-gray-600">Nama Role</label>
                    <select
                        name="nama_role"
                        required
                        class="w-full border border-gray-300 rounded-lg p-2.5 mt-1 mb-3 bg-white focus:ring-2 focus:ring-blue-500">
                        <option value="">Pilih Role</option>
                        <option value="pegawai">Pegawai</option>
                        <option value="psikolog">Psikolog</option>
                    </select>

                    <!-- PASSWORD -->
                    <label class="text-sm text-gray-600">Password</label>

                    <div class="relative mb-3">
                        <input
                            :type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            minlength="8"
                            x-model="password"
                            @input="check()"
                            placeholder="Minimal 8 karakter"
                            class="w-full border border-gray-300 rounded-lg p-2.5 pr-11 focus:ring-2 focus:ring-blue-500">

                        <button
                            type="button"
                            @click="showPassword=!showPassword"
                            class="absolute inset-y-0 right-0 px-3 text-gray-400">
                            <span x-show="!showPassword">👁</span>
                            <span x-show="showPassword">🙈</span>
                        </button>
                    </div>
                    <!-- VALIDASI PASSWORD -->
                    <div class="flex flex-wrap gap-2 text-xs mb-4">

                        <span
                            :class="hasUpper
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-600'"
                            class="px-3 py-1 rounded-full transition">
                            Huruf Besar
                        </span>

                        <span
                            :class="hasLower
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-600'"
                            class="px-3 py-1 rounded-full transition">
                            Huruf Kecil
                        </span>

                        <span
                            :class="hasNumber
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-600'"
                            class="px-3 py-1 rounded-full transition">
                            Angka
                        </span>

                        <span
                            :class="hasSymbol
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-600'"
                            class="px-3 py-1 rounded-full transition">
                            Simbol
                        </span>

                    </div>

                    @if ($errors->any() && session('form') === 'register')
                    <div class="mb-3 bg-red-100 text-red-700 p-2 rounded text-sm">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <button
                        class="w-full bg-blue-600 text-white py-3 rounded-xl
                               hover:bg-blue-700 transition font-semibold">
                        Daftar
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>