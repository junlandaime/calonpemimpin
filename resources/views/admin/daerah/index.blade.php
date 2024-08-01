@extends('layouts.admin')

@section('title', 'Daftar Daerah')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Daerah</h1>
            <a href="{{ route('admin.daerah.create') }}"
                class="bg-[#90EE90] hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Tambah Daerah Baru
            </a>
        </div>

        <!-- Search Bar -->
        {{-- <div class="mb-6">
            <form action="{{ route('admin.daerah.search') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Cari daerah..." value="{{ request('search') }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <button type="submit" class="bg-[#90EE90] hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">
                    Cari
                </button>
            </form>
        </div> --}}

        <!-- Daerah Table -->
        <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Jenis</th>
                        <th class="py-3 px-6 text-left">Provinsi</th>
                        <th class="py-3 px-6 text-right">Luas Wilayah</th>
                        <th class="py-3 px-6 text-right">Jumlah Penduduk</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse ($daerahs as $daerah)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $daerah->nama }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ ucfirst($daerah->jenis) }}
                            </td>
                            <td class="py-3 px-6 text-left">
                                {{ $daerah->provinsi }}
                            </td>
                            <td class="py-3 px-6 text-right">
                                {{ number_format($daerah->luas_wilayah, 2) }} km²
                            </td>
                            <td class="py-3 px-6 text-right">
                                {{ number_format($daerah->jumlah_penduduk) }}
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center">
                                    <a href="{{ route('admin.daerah.show', $daerah->id) }}"
                                        class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <a href="{{ route('admin.daerah.edit', $daerah->id) }}"
                                        class="w-4 mr-2 transform hover:text-yellow-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.daerah.destroy', $daerah->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus daerah ini?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b border-gray-200">
                            <td colspan="6" class="py-3 px-6 text-center">Tidak ada data daerah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $daerahs->links() }}
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Jika Anda ingin menambahkan JavaScript khusus untuk halaman ini, Anda bisa menambahkannya di sini
    </script>
@endpush
