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
    class="max-w-7xl mx-auto py-10 px-4">

    <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">

        {{-- Button tambah --}}
        <div class="mb-5">
            <button @click="open=true"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-500 hover:bg-green-600
                       text-white text-sm font-semibold rounded-xl shadow transition">
                TAMBAH VIDEO
            </button>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-xl overflow-hidden">
                <thead class="bg-gray-50 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">JUDUL</th>
                        <th class="px-4 py-3 text-center">THUMBNAIL</th>
                        <th class="px-4 py-3 text-center w-40">AKSI</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($datas as $data)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3">
                                {{ $data->judul }}
                            </td>

                            {{-- Thumbnail klik play --}}
                            <td class="px-4 py-3 text-center">
                                <img src="{{ $data->thumbnail }}"
                                     @click="playVideo('{{ $data->url }}')"
                                     class="w-44 mx-auto rounded-xl shadow cursor-pointer hover:scale-105 transition">
                            </td>

                            <td class="px-4 py-3">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                      action="{{ route('video.destroy', $data->id) }}"
                                      method="POST"
                                      class="flex justify-center">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white rounded-lg text-sm">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-5">
                                <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg text-center">
                                    Data video belum tersedia.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $datas->links() }}
        </div>
    </div>

    {{-- ================= MODAL CREATE ================= --}}
    <div x-show="open" x-cloak x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

        <div @click.outside="reset()"
             class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6">

            <div class="flex justify-between items-center mb-5">
                <h2 class="text-lg font-bold">Tambah Video</h2>
                <button @click="reset()" class="text-gray-500 hover:text-black">✕</button>
            </div>

            <form action="{{ route('video.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-semibold text-gray-700">Judul Video</label>
                    <input type="text" name="judul" x-model="judul"
                        class="w-full mt-2 border rounded-xl px-3 py-2"
                        placeholder="Masukkan judul video" required>
                </div>

                <div>
                    <label class="text-sm font-semibold text-gray-700">URL YouTube</label>
                    <input type="text" name="url" x-model="url"
                        class="w-full mt-2 border rounded-xl px-3 py-2"
                        placeholder="https://youtu.be/xxxx"
                        @input="preview = 'https://www.youtube.com/embed/' + url.split(/(v=|youtu.be\/)/).pop()"
                        required>
                </div>

                <iframe x-show="preview"
                        :src="preview"
                        class="w-full h-48 rounded-xl shadow">
                </iframe>

                <div class="flex justify-end gap-2 pt-3">
                    <button type="button" @click="reset()"
                        class="px-4 py-2 bg-gray-300 rounded-xl">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded-xl">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ================= MODAL PLAY VIDEO ================= --}}
    <div x-show="play" x-cloak x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/70">

        <div @click.outside="closeVideo()"
             class="bg-black w-full max-w-3xl rounded-xl overflow-hidden">

            <iframe x-show="play"
                    :src="playUrl"
                    class="w-full h-[450px]"
                    allow="autoplay"
                    allowfullscreen>
            </iframe>

            <div class="p-3 text-right bg-black">
                <button @click="closeVideo()"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg">
                    Tutup
                </button>
            </div>
        </div>
    </div>

</div>

@endsection
