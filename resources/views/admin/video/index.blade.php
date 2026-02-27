@extends('layouts.admin')

@section('content')

<div x-data="{
        open:false,
        preview:'',
        judul:'',
        url:'',
        play:false,
        playUrl:'',
        reset(){
            this.open=false
            this.preview=''
            this.judul=''
            this.url=''
        },
        playVideo(url){
            this.play=true
            this.playUrl=url+'?autoplay=1'
        },
        closeVideo(){
            this.play=false
            this.playUrl=''
        }
    }"
    class="py-2">

    <div class="max-w-5xl mx-auto px-2">

        {{-- ================= HEADER ================= --}}
        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    🎬 Manajemen Video
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola video yang tampil di website Anda
                </p>
            </div>

            {{-- Desktop Button --}}
            <button @click="open=true"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2
                       bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-medium
                       rounded-lg shadow-sm transition">
                + Tambah Video
            </button>

            {{-- Mobile Button --}}
            <button @click="open=true"
                class="sm:hidden flex items-center justify-center
                       w-10 h-10 rounded-full
                       bg-blue-600 hover:bg-blue-700
                       text-white text-lg font-semibold transition">
                +
            </button>

        </div>

        {{-- ================= LIST VIDEO ================= --}}
        <div class="space-y-5">

            @forelse ($datas as $data)
            <div class="bg-white border border-gray-200 rounded-xl
                        p-5 flex flex-col sm:flex-row gap-5
                        hover:shadow-md transition">

                {{-- Thumbnail --}}
                <div class="sm:w-56 w-full">
                    <div class="relative group cursor-pointer"
                        @click="playVideo('{{ $data->url }}')">

                        <img src="{{ $data->thumbnail }}"
                            class="rounded-lg w-full aspect-video object-cover">

                        <div class="absolute inset-0 bg-black/40 opacity-0 
                                    group-hover:opacity-100 transition
                                    flex items-center justify-center rounded-lg">
                            <span class="bg-white px-3 py-1.5 rounded-full text-sm font-medium">
                                ▶ Play
                            </span>
                        </div>

                    </div>
                </div>

                {{-- Info --}}
                <div class="flex-1 flex flex-col justify-between">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $data->judul }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Klik thumbnail untuk memutar video
                        </p>
                    </div>

                    {{-- Action --}}
                    <div class="flex justify-end mt-4">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('video.destroy', $data->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="px-4 py-2 text-sm
                                       bg-red-500 hover:bg-red-600
                                       text-white rounded-lg transition">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>

            @empty
            <div class="border border-gray-200 p-6 rounded-xl text-center">
                <p class="text-base text-gray-500">
                    Belum ada video tersedia.
                </p>
            </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $datas->links() }}
        </div>

    </div>

    {{-- ================= MODAL CREATE ================= --}}
    <div x-show="open"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 px-4">

        <div @click.outside="reset()"
            x-transition
            class="bg-white w-full max-w-lg rounded-xl shadow-xl p-6">

            <div class="flex justify-between items-center mb-5">
                <h2 class="text-lg font-semibold text-gray-800">
                    Tambah Video
                </h2>
                <button @click="reset()"
                    class="text-gray-400 hover:text-gray-700 text-base">
                    ✕
                </button>
            </div>

            <form action="{{ route('video.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Judul Video
                    </label>
                    <input type="text"
                        name="judul"
                        x-model="judul"
                        class="w-full mt-2 border border-gray-300 rounded-lg px-4 py-2
                               text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        URL YouTube
                    </label>
                    <input type="text"
                        name="url"
                        x-model="url"
                        class="w-full mt-2 border border-gray-300 rounded-lg px-4 py-2
                               text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="https://youtu.be/xxxx"
                        @input="preview = 'https://www.youtube.com/embed/' + url.split(/(v=|youtu.be\/)/).pop()"
                        required>
                </div>

                <div x-show="preview" class="aspect-video mt-3">
                    <iframe :src="preview"
                        class="w-full h-full rounded-lg border"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="flex justify-end gap-3 pt-3">
                    <button type="button"
                        @click="reset()"
                        class="px-4 py-2 text-sm bg-gray-200 rounded-lg">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 text-sm bg-blue-600 hover:bg-blue-700
                               text-white rounded-lg">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- ================= MODAL PLAY VIDEO ================= --}}
    <div x-show="play"
        x-cloak
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 px-4">

        <div @click.outside="closeVideo()"
            class="bg-black w-full max-w-3xl rounded-xl overflow-hidden shadow-2xl">

            <div class="aspect-video">
                <iframe :src="playUrl"
                    class="w-full h-full"
                    allow="autoplay"
                    allowfullscreen>
                </iframe>
            </div>

            <div class="p-4 text-right bg-zinc-900">
                <button @click="closeVideo()"
                    class="px-4 py-2 text-sm bg-red-500 hover:bg-red-600
                           text-white rounded-lg">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</div>

@endsection