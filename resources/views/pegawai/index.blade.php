@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white py-14 px-6 lg:px-16">

    <div class="max-w-7xl mx-auto">

        <!-- TOP PROFILE CARD -->
        <div class="bg-white rounded-3xl shadow-sm p-8 flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10">

            <div class="flex items-center gap-6">

                <div class="relative">
                    <img src="https://i.pravatar.cc/150?img=12"
                        class="w-20 h-20 rounded-2xl object-cover shadow-md">

                    <!-- verified -->
                    <div class="absolute -bottom-2 -right-2 bg-black text-white text-[10px] px-2 py-1 rounded-full shadow">
                        ✔ Verified
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold">
                        Rifqi Ramadhan
                    </h2>
                    <p class="text-sm opacity-60 mt-1">
                        NIP 199812312023001 • Pegawai
                    </p>
                    <p class="text-sm opacity-50 mt-1">
                        Dinas Kominfo
                    </p>
                </div>

            </div>

            <div class="flex gap-3">
                <button class="px-5 py-2.5 rounded-xl shadow-sm hover:shadow-md transition text-sm">
                    Edit Profil
                </button>
                <button class="px-5 py-2.5 rounded-xl bg-black text-white shadow-sm hover:shadow-md transition text-sm">
                    + Ajukan Konsultasi
                </button>
            </div>

        </div>


        <!-- STATS -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                <p class="text-sm opacity-60">Jadwal Aktif</p>
                <p class="text-3xl font-semibold mt-2">4</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                <p class="text-sm opacity-60">Selesai</p>
                <p class="text-3xl font-semibold mt-2">8</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                <p class="text-sm opacity-60">Total Konsultasi</p>
                <p class="text-3xl font-semibold mt-2">12</p>
            </div>

        </div>


        <!-- MAIN GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT: PROFILE DETAIL -->
            <div class="bg-white rounded-3xl p-8 shadow-sm h-fit">

                <h3 class="font-semibold mb-6">Informasi Kontak</h3>

                <div class="space-y-6 text-sm">

                    <div>
                        <p class="opacity-50">Email</p>
                        <p class="mt-1 font-medium">rifqi@mail.com</p>
                    </div>

                    <div>
                        <p class="opacity-50">No WhatsApp</p>
                        <p class="mt-1 font-medium">081234567890</p>
                    </div>

                </div>

            </div>

            <!-- RIGHT: CONSULTATION AREA -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Jadwal -->
                <div class="bg-white rounded-3xl p-8 shadow-sm">

                    <h3 class="font-semibold mb-6">Jadwal Konsultasi</h3>

                    <div class="space-y-4 max-h-[320px] overflow-y-auto pr-2">

                        @for ($i = 1; $i <= 7; $i++)
                            <div class="p-5 rounded-2xl border hover:shadow-sm transition">
                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">
                                <div>
                                    <p class="font-medium">12 Maret 2026 • 09:00 WIB</p>
                                    <p class="text-sm opacity-60 mt-1">Dr. Andini, M.Psi</p>
                                </div>

                                <button class="px-4 py-2 rounded-xl bg-black text-white text-sm">
                                    Mulai
                                </button>
                            </div>
                    </div>
                    @endfor

                </div>

            </div>

            <!-- Riwayat -->
            <div class="bg-white rounded-3xl p-8 shadow-sm">

                <h3 class="font-semibold mb-6">Riwayat Konsultasi</h3>

                <div class="space-y-4 max-h-[320px] overflow-y-auto pr-2">

                    @for ($i = 1; $i <= 8; $i++)
                        <div class="p-5 rounded-2xl border flex justify-between items-center hover:shadow-sm transition">
                        <div>
                            <p class="font-medium">20 Februari 2026</p>
                            <p class="text-sm opacity-60 mt-1">Dr. Budi Santoso</p>
                        </div>

                        <span class="text-xs px-3 py-1 rounded-full border">
                            Completed
                        </span>
                </div>
                @endfor

            </div>

        </div>

    </div>

</div>

</div>

</div>
@endsection