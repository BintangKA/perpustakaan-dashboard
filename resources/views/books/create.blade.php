@extends('layouts.app')

@section('content')
    <div class="p-4 mx-auto max-w-7xl">
        <div class="mb-4">
            <h1 class="text-2xl font-semibold">Tambah Buku</h1>
        </div>

        @if ($errors->any())
            <div class="p-3 mb-4 text-red-700 bg-red-100 border border-red-300 rounded">
                <ul class="pl-5 list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="p-6 bg-white rounded-lg shadow">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block mb-1 font-medium">Judul Buku</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                <div class="mb-4">
                    <label for="author" class="block mb-1 font-medium">Penulis</label>
                    <input type="text" id="author" name="author" value="{{ old('author') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                <div class="mb-4">
                    <label for="stock" class="block mb-1 font-medium">Stok</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                {{-- Tambahan input Description --}}
                <div class="mb-4">
                    <label for="description" class="block mb-1 font-medium">Deskripsi Buku</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        placeholder="Masukkan deskripsi buku">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="year" class="block mb-1 font-medium">Tahun Terbit</label>
                    <input type="number" id="year" name="year" value="{{ old('year') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                <div class="mb-4">
                    <label for="category_id" class="block mb-1 font-medium">Kategori</label>
                    <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image" class="block mb-1 font-medium">Gambar Buku</label>
                    <input type="file" id="image" name="image"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="flex items-center">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('books.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
