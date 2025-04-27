@extends('layouts.app')

@section('content')
<div class="p-4 mx-auto max-w-7xl">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Daftar Buku</h1>
        <a href="{{ route('books.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Tambah Buku</a>
    </div>

    @if (session('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Penulis</th>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Stok</th>
                    <th class="px-4 py-2">Deskripsi</th>
                    <th class="px-4 py-2">Tahun</th>
                    <th class="px-4 py-2">Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($books as $index => $book)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $book->title }}</td>
                        <td class="px-4 py-2">{{ $book->author }}</td>
                        <td class="px-4 py-2">
                            @if ($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" class="object-cover w-16 h-20 rounded">
                            @else
                                <span class="italic text-gray-500">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $book->stock }}</td>
                        <td class="px-4 py-2">{{ $book->description }}</td>
                        <td class="px-4 py-2">{{ $book->year }}</td>
                        <td class="px-4 py-2">{{ $book->category->name ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('books.edit', $book->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if ($books->isEmpty())
                <tr>
                    <td colspan="9" class="px-4 py-4 text-center text-gray-500">Belum ada data buku.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
