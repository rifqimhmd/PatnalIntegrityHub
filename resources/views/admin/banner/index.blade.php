@extends('layouts.admin')

@section('content')

<div x-data="{
        open:false,
        imagePreview:'',
        reset(){
            this.open=false
            this.imagePreview=''
        },
        previewImage(event){
            const file = event.target.files[0]
            if(file){
                this.imagePreview = URL.createObjectURL(file)
            }
        }
    }"
    class="py-2">

    <div class="max-w-5xl mx-auto px-2">

        {{-- ================= HEADER ================= --}}
        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    🖼 Manajemen Banner
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola banner yang tampil di halaman website Anda
                </p>
            </div>

            {{-- Desktop Button --}}
            <button @click="open=true"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2
                       bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-medium
                       rounded-lg shadow-sm transition">
                + Tambah Banner
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

        {{-- ================= LIST BANNER ================= --}}
        <div class="space-y-5">

            @forelse ($datas as $data)
            <div class="bg-white border border-gray-200 rounded-xl
                        p-5 flex flex-col sm:flex-row gap-5
                        hover:shadow-md transition">

                {{-- Image --}}
                <div class="sm:w-64 w-full">
                    <img src="{{ asset('storage/banners/'.$data->image) }}"
                        class="rounded-xl w-full object-cover shadow-sm">
                </div>

                {{-- Info & Action --}}
                <div class="flex-1 flex flex-col justify-between">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            Banner Website
                        </h3>
                        <p class="text-sm text-gray-500 mt-2">
                            Gambar banner aktif yang ditampilkan pada halaman utama
                        </p>
                    </div>

                    {{-- Action --}}
                    <div class="flex justify-end mt-4">

                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('banner.destroy', $data->id) }}"
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
                    Belum ada banner tersedia.
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
                    Tambah Banner
                </h2>
                <button @click="reset()"
                    class="text-gray-400 hover:text-gray-700 text-base">
                    ✕
                </button>
            </div>

            <form action="{{ route('banner.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Gambar Banner
                    </label>
                    <input type="file"
                        name="image"
                        accept="image/*"
                        @change="previewImage($event)"
                        class="w-full mt-2 border border-gray-300 rounded-lg px-4 py-2
                               text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                {{-- Preview --}}
                <div x-show="imagePreview" class="mt-3">
                    <img :src="imagePreview"
                        class="w-full max-h-60 object-cover rounded-xl shadow">
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

</div>

@endsection