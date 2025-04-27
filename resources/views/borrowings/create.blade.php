@extends('layouts.app')

@section('content')
    <div class="p-4 mx-auto max-w-7xl">
        <div class="mb-4">
            <h1 class="text-2xl font-semibold">Tambah Peminjaman</h1>
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
            <form action="{{ route('borrowings.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="user_id" class="block mb-1 font-medium">Peminjam</label>
                    <select name="user_id" id="user_id"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                        <option value="">-- Pilih Peminjam --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="book_id" class="block mb-1 font-medium">Buku</label>
                    <select name="book_id" id="book_id"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                        <option value="">-- Pilih Buku --</option>
                        @foreach ($books as $book)
                            <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                {{ $book->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="borrow_date" class="block mb-1 font-medium">Tanggal Pinjam</label>
                    <input type="date" id="borrow_date" name="borrow_date" value="{{ old('borrow_date') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                <div class="mb-4">
                    <label for="return_deadline" class="block mb-1 font-medium">Batas Pengembalian</label>
                    <input type="date" id="return_deadline" name="return_deadline" value="{{ old('return_deadline') }}"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block mb-1 font-medium">Status</label>
                    <select name="status" id="status"
                        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                        required>
                        <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="dikembalikan" {{ old('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                        Simpan
                    </button>
                    <a href="{{ route('borrowings.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
