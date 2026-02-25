@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <div class="bg-white shadow-xl rounded-2xl p-6 border border-gray-100">

        {{-- Button tambah --}}
        <div class="mb-5">
            <a href="{{ route('banner.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-500 hover:bg-green-600
                      text-white text-sm font-semibold rounded-xl shadow transition">
                TAMBAH BANNER
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-xl overflow-hidden">
                <thead class="bg-gray-50 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 text-center">GAMBAR</th>
                        <th class="px-4 py-3 text-center w-40">AKSI</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($datas as $data)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-3 text-center">
                                <img src="{{ asset('storage/banners/'.$data->image) }}"
                                     class="w-36 mx-auto rounded-lg shadow">
                            </td>

                            <td class="px-4 py-3">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                      action="{{ route('posts.destroy', $data->id) }}"
                                      method="POST"
                                      class="flex justify-center gap-2">

                                    <a href="{{ route('posts.show', $data->id) }}"
                                       class="px-3 py-1.5 bg-gray-800 hover:bg-black text-white rounded-lg text-sm">
                                        👁
                                    </a>

                                    <a href="{{ route('posts.edit', $data->id) }}"
                                       class="px-3 py-1.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm">
                                        ✏
                                    </a>

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
                                    Data Banner belum tersedia.
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
</div>
@endsection
