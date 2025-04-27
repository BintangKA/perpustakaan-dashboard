@extends('layouts.app')

@section('content')
<div class="p-4 mx-auto max-w-7xl">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Daftar Kategori</h1>
        <a href="{{ route('categories.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Tambah Kategori</a>
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
                    <th class="px-4 py-2">Nama Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($categories as $index => $category)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="flex gap-2 px-4 py-2">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if ($categories->isEmpty())
                <tr>
                    <td colspan="9" class="px-4 py-4 text-center text-gray-500">Belum ada data user.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
