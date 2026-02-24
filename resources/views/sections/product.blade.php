<section
    class="relative w-full overflow-hidden bg-gradient-to-r from-white to-blue-50 mt-4">
    <div class="container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center gap-10">

        {{-- === Kiri: Teks & Tombol Produk === --}}
        <div
            class="flex-1 text-center md:text-left pt-10 md:pt-20 pb-10 md:pb-20">
            <p class="text-blue-600 font-semibold text-sm md:text-base">
                Konsultasi? Gampang kok! ada PATNAL disini.
            </p>

            <h2 class="text-3xl md:text-5xl font-bold text-blue-600 leading-snug mt-4 md:mt-6">
                Trust me!
            </h2>

            <p class="text-3xl md:text-5xl font-bold text-blue-600 leading-snug">
                Di sini kamu bisa ngomong bebas,<br />
                tanpa takut di-judge!
            </p>

            <p class="text-gray-700 mt-4 mb-10 text-base md:text-lg">
                Patnal di sini buat bantu kamu cari solusi.
            </p>

            <div class="flex md:justify-start justify-center mt-6">
                <a
                    href="https://konsultasi.klinikpatnal.com/"
                    class="group relative rounded-2xl px-7 py-5
                           flex items-center justify-between
                           w-full md:w-[540px] lg:w-[580px]
                           bg-white
                           border border-gray-200/70 shadow-sm
                           hover:shadow-lg hover:border-blue-100
                           transition-all duration-300">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-r from-blue-50/30 to-white opacity-0 group-hover:opacity-100 transition duration-300 pointer-events-none"></div>

                    <div class="text-left relative z-10 space-y-1.5">
                        <p class="text-gray-500 text-sm">
                            Konsultasi untuk saya
                        </p>

                        <h3 class="text-blue-600 font-bold text-2xl tracking-tight group-hover:text-blue-700 transition-colors">
                            Konsultasi
                        </h3>

                        <p class="text-gray-600 text-sm leading-relaxed">
                            Layanan konsultasi profesional.
                        </p>

                        <div class="flex items-center gap-1 text-blue-600 text-sm font-medium pt-1">
                            <span class="transition-all duration-300 group-hover:translate-x-1">
                                Pilih
                            </span>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-4 transition-all duration-300 opacity-80 group-hover:opacity-100 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>

                    <img
                        src="/images/konsultasi.png"
                        alt="Konsultasi"
                        class="w-20 h-20 object-contain relative z-10
                               transition-all duration-300
                               group-hover:scale-105 group-hover:-translate-y-0.5" />
                </a>
            </div>
        </div>

        {{-- === Kanan: Gambar Ilustrasi === --}}
        <div
            class="flex-1 flex justify-center md:justify-end pt-10 md:pt-20 lg:pt-24">
            <div
                class="relative w-full
                       translate-y-[8px]
                       sm:translate-y-[12px]
                       md:translate-y-[16px]
                       lg:translate-y-[20px]
                       xl:translate-y-[18px]
                       2xl:translate-y-[16px]
                       max-w-[380px]
                       sm:max-w-[480px]
                       md:max-w-[720px]
                       lg:max-w-[920px]
                       xl:max-w-[1100px]
                       2xl:max-w-[1280px]">
                {{-- Glow --}}
                <div
                    class="absolute inset-0
                           bg-gradient-to-br from-blue-100/40 to-blue-50/0
                           rounded-3xl blur-2xl
                           opacity-60 pointer-events-none"></div>

                {{-- Image --}}
                <img
                    src="/images/produk.png"
                    alt="Produk Klinik Patnal"
                    class="relative z-10 w-full h-auto object-contain
                           transition-all duration-500 drop-shadow-xl
                           group-hover:scale-[1.03]
                           group-hover:-translate-y-1" />
            </div>
        </div>

    </div>
</section>