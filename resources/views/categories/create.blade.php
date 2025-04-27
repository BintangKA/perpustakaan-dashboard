@extends('layouts.app')

@section('content')
    <div class="p-4 mx-auto max-w-7xl">
        <div class="mb-4">
            <h1 class="text-2xl font-semibold">Tambah Kategori</h1>
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
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block mb-1 font-medium">Nama Kategori</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                <div class="flex items-center">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('categories.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
