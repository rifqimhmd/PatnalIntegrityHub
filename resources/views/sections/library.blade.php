<section id="pustakadokumen" class="py-12">
    <div class="container mx-auto px-6 md:px-12">
        <h2 class="text-3xl font-bold mb-3 text-center">Pustaka Dokumen</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-8">
            Kumpulan dokumen pendukung ini disusun sebagai referensi dalam
            pelaksanaan konsultasi dan layanan di Klinik Patnal, guna memastikan
            setiap proses kepatuhan, pengambilan keputusan, dan prosedur
            operasional berjalan berdasarkan informasi yang akurat, jelas, dan
            terdokumentasi dengan baik.
        </p>

        <div class="w-full max-w-screen-2xl mx-auto px-3 sm:px-4 md:px-6 lg:px-10 xl:px-16 space-y-5">

            {{-- ================== PERATURAN ================== --}}
            <div x-data="{ open:false }"
                class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">

                <button @click="open=!open"
                    class="w-full flex justify-between items-center px-6 py-4 hover:bg-blue-50 transition">
                    <div class="flex items-center gap-1">
                        <svg
                            class="w-6 h-6 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>

                        <span class="font-semibold text-gray-800 text-sm sm:text-base lg:text-lg">
                            Himpunan Peraturan Perundang-Undangan
                        </span>
                    </div>

                    <svg :class="open ? 'rotate-180' : ''"
                        class="w-5 h-5 text-blue-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-collapse>
                    <ul class="border-t">

                        @forelse($peraturans as $peraturan)
                        <li class="border-b">
                            <a href="{{ asset('storage/peraturans/'.$peraturan->file) }}"
                                target="_blank"
                                class="flex items-center gap-4 px-6 py-3 hover:bg-blue-50 transition">

                                <span class="flex-1 text-gray-700">
                                    {{ $peraturan->judul }}
                                </span>
                                ❯
                            </a>
                        </li>
                        @empty
                        <li class="px-6 py-3 text-gray-500">
                            Belum ada data peraturan.
                        </li>
                        @endforelse

                    </ul>
                </div>
            </div>

            {{-- ================== SOP ================== --}}
            <div x-data="{ open:false }"
                class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">

                <button @click="open=!open"
                    class="w-full flex justify-between items-center px-6 py-4 hover:bg-blue-50 transition">

                    <div class="flex items-center gap-1">
                        <svg
                            class="w-6 h-6 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>

                        <span class="font-semibold text-gray-800 text-sm sm:text-base lg:text-lg">
                            Standar Operasional Prosedur (SOP)
                        </span>
                    </div>

                    <svg :class="open ? 'rotate-180' : ''"
                        class="w-5 h-5 text-blue-600 transition-transform"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="open" x-collapse>
                    <ul class="border-t">

                        @forelse($sops as $sop)
                        <li class="border-b">
                            <a href="{{ asset('storage/sop/'.$sop->file) }}"
                                target="_blank"
                                class="flex items-center gap-4 px-6 py-3 hover:bg-blue-50 transition">

                                <span class="flex-1 text-gray-700">
                                    {{ $sop->judul }}
                                </span>

                                ❯
                            </a>
                        </li>
                        @empty
                        <li class="px-6 py-3 text-gray-500">
                            Belum ada data SOP.
                        </li>
                        @endforelse

                    </ul>
                </div>
            </div>

            {{-- ================== VIDEO ================== --}}
            <div
                x-data="{ 
        open: false, 
        current: 0,
        videos: @js($videos->pluck('url')),
        titles: @js($videos->pluck('judul'))
    }"
                class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">

                {{-- BUTTON --}}
                <button
                    @click="open = !open"
                    class="w-full flex justify-between items-center px-6 py-4 hover:bg-blue-50 transition">
                    <div class="flex items-center gap-1">
                        <svg
                            class="w-6 h-6 text-blue-600"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        <span class="font-semibold text-gray-800 text-sm sm:text-base lg:text-lg">
                            Video Edukasi
                        </span>
                    </div>

                    <svg
                        :class="open ? 'rotate-180' : ''"
                        class="w-5 h-5 text-blue-600 transition-transform duration-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- COLLAPSE --}}
                <div x-show="open" x-collapse class="p-6 bg-blue-50/50">

                    {{-- VIDEO UTAMA --}}
                    <div class="aspect-video mb-3 rounded-xl overflow-hidden shadow">
                        <iframe
                            :src="videos[current]"
                            class="w-full h-full"
                            allowfullscreen>
                        </iframe>
                    </div>

                    {{-- THUMBNAIL --}}
                    <div class="flex gap-4 overflow-x-auto pb-2">
                        @foreach($videos as $i => $video)
                        <div
                            @click="current = {{ $i }}"
                            class="min-w-[200px] aspect-video rounded-lg overflow-hidden shadow cursor-pointer ring-2 transition"
                            :class="current === {{ $i }} ? 'ring-blue-500' : 'ring-transparent'">

                            <img src="{{ $video->thumbnail }}"
                                class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>