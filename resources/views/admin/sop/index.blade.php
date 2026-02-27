@extends('layouts.admin')

@section('content')

<div x-data="{
        open:false,
        fileName:'',
        reset(){
            this.open=false
            this.fileName=''
        }
    }"
    class="py-2">

    <div class="max-w-5xl mx-auto px-2">

        {{-- ================= HEADER ================= --}}
        <div class="flex items-center justify-between mb-8">

            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    📄 Manajemen SOP
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola dokumen SOP yang tampil di website Anda
                </p>
            </div>

            {{-- Desktop Button --}}
            <button @click="open=true"
                class="hidden sm:inline-flex items-center gap-2 px-4 py-2
                       bg-blue-600 hover:bg-blue-700
                       text-white text-sm font-medium
                       rounded-lg shadow-sm transition">
                + Tambah SOP
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

        {{-- ================= LIST SOP ================= --}}
        <div class="space-y-5">

            @forelse ($datas as $data)
            <div class="bg-white border border-gray-200 rounded-xl
                        p-5 flex flex-col sm:flex-row gap-5
                        hover:shadow-md transition">

                {{-- Icon File --}}
                <div class="sm:w-40 w-full flex items-center justify-center">
                    <div class="w-24 h-24 bg-red-50 rounded-xl flex items-center justify-center text-4xl">
                        📄
                    </div>
                </div>

                {{-- Info --}}
                <div class="flex-1 flex flex-col justify-between">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $data->judul }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-2">
                            Dokumen Standar Operasional Prosedur (PDF)
                        </p>
                    </div>

                    {{-- Action --}}
                    <div class="flex flex-wrap gap-3 justify-end mt-4">

                        <a href="{{ asset('storage/sop/'.$data->file) }}"
                            target="_blank"
                            class="px-4 py-2 text-sm
                                  bg-blue-600 hover:bg-blue-700
                                  text-white rounded-lg transition">
                            Lihat PDF
                        </a>

                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('sop.destroy', $data->id) }}"
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
                    Belum ada data SOP tersedia.
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
                    Tambah SOP
                </h2>
                <button @click="reset()"
                    class="text-gray-400 hover:text-gray-700 text-base">
                    ✕
                </button>
            </div>

            <form action="{{ route('sop.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Judul SOP
                    </label>
                    <input type="text"
                        name="judul"
                        class="w-full mt-2 border border-gray-300 rounded-lg px-4 py-2
                               text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: SOP Pelaporan Gratifikasi"
                        required>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        File SOP (PDF)
                    </label>
                    <input type="file"
                        name="file"
                        accept="application/pdf"
                        @change="fileName = $event.target.files[0]?.name"
                        class="w-full mt-2 border border-gray-300 rounded-lg px-4 py-2
                               text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                {{-- Preview File Name --}}
                <div x-show="fileName"
                    class="text-sm text-gray-600 bg-gray-100 px-3 py-2 rounded-lg">
                    📄 <span x-text="fileName"></span>
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