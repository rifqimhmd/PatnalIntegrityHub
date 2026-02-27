@extends('layouts.admin')

@section('content')

<div x-data="{ open:false, fileName:'' }" class="max-w-7xl mx-auto py-10 px-4">
    <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">

        {{-- Button tambah --}}
        <div class="mb-5">
            <button @click="open=true"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-500 hover:bg-green-600
                      text-white text-sm font-semibold rounded-xl shadow transition">
                TAMBAH SOP
            </button>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-xl overflow-hidden">
                <thead class="bg-gray-50 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 text-center">JUDUL</th>
                        <th class="px-4 py-3 text-center">FILE</th>
                        <th class="px-4 py-3 text-center w-32">AKSI</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($datas as $data)
                        <tr class="hover:bg-gray-50 transition">
                            {{-- Judul --}}
                            <td class="px-4 py-3">
                                {{ $data->judul }}
                            </td>

                            {{-- File --}}
                            <td class="px-4 py-3 text-center">
                                <a href="{{ asset('storage/sop/'.$data->file) }}"
                                   target="_blank"
                                   class="text-blue-600 hover:underline">
                                    📄 Lihat PDF
                                </a>
                            </td>

                            {{-- Aksi --}}
                            <td class="px-4 py-3">
                                <form onsubmit="return confirm('Apakah Anda yakin?');"
                                      action="{{ route('sop.destroy', $data->id) }}"
                                      method="POST"
                                      class="flex justify-center">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="px-3 py-1.5 bg-red-500 hover:bg-red-600
                                                   text-white rounded-lg text-sm">
                                        🗑
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="p-5">
                                <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg text-center">
                                    Data SOP belum tersedia.
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
    <div x-show="open"
         x-cloak
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">

        <div @click.outside="open=false"
             class="bg-white w-full max-w-lg rounded-2xl shadow-xl p-6">

            {{-- Header --}}
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-lg font-bold">Tambah SOP</h2>
                <button @click="open=false" class="text-gray-500 hover:text-black">✕</button>
            </div>

            {{-- Form --}}
            <form action="{{ route('sop.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-4">

                @csrf

                {{-- Judul --}}
                <div>
                    <label class="text-sm font-semibold text-gray-700">Judul SOP</label>
                    <input type="text"
                           name="judul"
                           required
                           class="w-full mt-2 border rounded-xl px-3 py-2"
                           placeholder="Contoh: SOP Pelaporan Gratifikasi">
                </div>

                {{-- File PDF --}}
                <div>
                    <label class="text-sm font-semibold text-gray-700">File SOP (PDF)</label>
                    <input type="file"
                           name="file"
                           accept="application/pdf"
                           required
                           class="w-full mt-2 border rounded-xl px-3 py-2"
                           @change="fileName = $event.target.files[0]?.name">
                </div>

                {{-- Preview Nama File --}}
                <template x-if="fileName">
                    <div class="text-sm text-gray-600 bg-gray-100 px-3 py-2 rounded-lg">
                        📄 <span x-text="fileName"></span>
                    </div>
                </template>

                {{-- Button --}}
                <div class="flex justify-end gap-2 pt-3">
                    <button type="button" @click="open=false"
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
</div>

@endsection
