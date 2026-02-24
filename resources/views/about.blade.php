@extends('layouts.app')
@section('title', 'Patnal Integrity Hub - Tentang Kami')

@section('content')

<div class="min-h-screen w-full bg-gray-50 text-gray-800">

    {{-- HERO --}}
    <section class="relative w-full bg-gradient-to-br from-blue-700 via-blue-600 to-blue-500 text-white">
        <div class="absolute inset-0 bg-[url('/pattern.svg')] opacity-20 mix-blend-overlay"></div>

        <div class="max-w-4xl mx-auto px-6 py-20 md:py-24 text-center relative z-10">
            <div class="mx-auto mb-8 w-fit relative animate-fadeIn">

                <!-- badge putih -->
                <div class="w-32 h-32 md:w-40 md:h-40
                rounded-full bg-white 
                flex items-center justify-center
                shadow-2xl shadow-blue-900/30
                relative before:absolute before:inset-0 before:rounded-full before:bg-blue-400/20 before:blur-2xl before:-z-10">

                    <img
                        src="{{ asset('images/logo/icon.png') }}"
                        alt="Patnal Integrity Hub"
                        class="w-20 h-20 md:w-24 md:h-24 object-contain">
                </div>

            </div>

            <h1 class="text-3xl md:text-5xl font-bold tracking-tight drop-shadow-sm mb-2 animate-fadeInUp">
                Patnal Integrity Hub
            </h1>

            <p class="text-lg md:text-xl font-medium opacity-90 animate-fadeInUp">
                Konsultasi Aman, Respons Tepat
            </p>
        </div>
    </section>


    {{-- CONTENT CARD --}}
    <section class="max-w-4xl mx-auto px-6 -mt-8 md:-mt-10 relative">
        <div class="bg-white/95 backdrop-blur-xl 
                    p-8 md:p-10 rounded-2xl md:rounded-3xl 
                    shadow-xl border border-white/40
                    animate-fadeInUp">

            <h2 class="text-2xl md:text-3xl font-bold mb-5 text-gray-800">
                Tentang Kami
            </h2>

            <div class="space-y-4 text-gray-700 leading-relaxed text-justify">
                <p>
                    Patnal Integrity Hub merupakan unit layanan yang berada di
                    bawah Direktorat Kepatuhan Internal, berkomitmen untuk mendukung
                    pelaksanaan kepatuhan yang efektif dan berkelanjutan di dalam
                    organisasi. Laman ini hadir sebagai pusat konsultasi, edukasi,
                    dan pemecahan masalah terkait kepatuhan internal, guna
                    memastikan seluruh proses dan aktivitas organisasi sesuai dengan
                    peraturan, standar, dan kebijakan yang berlaku.
                </p>

                <p>
                    Misi kami adalah memberikan layanan yang responsif dan
                    terpercaya dalam penanganan isu-isu kepatuhan, serta mengedukasi
                    seluruh pemangku kepentingan agar tercipta budaya kepatuhan yang
                    kuat dan konsisten. Melalui pendekatan yang profesional dan
                    berorientasi pada solusi, Kepatuhan Internal membantu
                    mengidentifikasi, mencegah, dan mengatasi risiko kepatuhan
                    sehingga organisasi dapat beroperasi secara transparan dan
                    akuntabel.
                </p>

                <p>
                    Kami berkomitmen tinggi untuk menjadi mitra yang handal bagi
                    seluruh unit kerja dalam meningkatkan integritas dan tata kelola
                    yang baik demi mencapai visi organisasi.
                </p>
            </div>

        </div>
    </section>

    {{-- FEATURES --}}
    <section class="max-w-5xl mx-auto px-6 py-16 md:py-20">
        <h3 class="text-2xl md:text-3xl font-semibold mb-12 text-gray-800 text-center">
            Fokus Layanan
        </h3>

        <div class="grid md:grid-cols-3 gap-8">

            {{-- CARD 1 --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 
                    hover:shadow-2xl hover:-translate-y-1 
                    transition-all duration-300 text-center">

                <div class="text-blue-600 mx-auto mb-4">
                    {{-- ShieldCheck (Lucide exact) --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-12 h-12 mx-auto"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M20 13c0 5-3.5 7.5-8 8-4.5-.5-8-3-8-8V5l8-3 8 3z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>

                <h4 class="text-lg font-semibold mb-2">Kepatuhan Internal</h4>
                <p class="text-gray-600">
                    Memastikan seluruh proses organisasi berjalan sesuai regulasi & standar.
                </p>
            </div>

            {{-- CARD 2 --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 
            hover:shadow-2xl hover:-translate-y-1 
            transition-all duration-300 text-center">

                <div class="text-blue-600 mx-auto mb-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="48"
                        height="48"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="mx-auto">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a4 4 0 0 0-4-4H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a4 4 0 0 1 4-4h6z" />
                        <path d="m9 12 2 2 4-4" />
                    </svg>
                </div>



                <h4 class="text-lg font-semibold mb-2">Edukasi & Sosialisasi</h4>
                <p class="text-gray-600">
                    Meningkatkan pemahaman budaya kepatuhan & integritas di seluruh unit.
                </p>
            </div>



            {{-- CARD 3 --}}
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 
                    hover:shadow-2xl hover:-translate-y-1 
                    transition-all duration-300 text-center">

                <div class="text-blue-600 mx-auto mb-4">
                    {{-- MessageSquare (Lucide exact) --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-12 h-12 mx-auto"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                </div>

                <h4 class="text-lg font-semibold mb-2">Konsultasi & Solusi</h4>
                <p class="text-gray-600">
                    Ruang konsultasi aman dengan respons cepat dan berorientasi solusi.
                </p>
            </div>

        </div>
    </section>

</div>


{{-- Animations --}}
<style>
    .animate-fadeIn {
        animation: fadeIn 0.8s ease forwards;
    }

    .animate-fadeInUp {
        opacity: 0;
        transform: translateY(10px);
        animation: fadeInUp 0.8s ease forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection