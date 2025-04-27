@extends('layouts.app')

@section('content')
    <div class="max-w-xl p-4 mx-auto">
        <h1 class="mb-4 text-2xl font-semibold">Edit Peminjaman</h1>
        <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST"
            class="p-6 space-y-4 bg-white rounded-lg shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">Peminjam</label>
                <select name="user_id" class="w-full border-gray-300 rounded shadow-sm">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $borrowing->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Buku</label>
                <select name="book_id" class="w-full border-gray-300 rounded shadow-sm">
                    @foreach ($books as $book)
                        <option value="{{ $book->id }}" {{ $borrowing->book_id == $book->id ? 'selected' : '' }}>
                            {{ $book->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">Tanggal Pinjam</label>
                <input type="date" name="borrow_date" class="w-full border-gray-300 rounded shadow-sm"
                    value="{{ old('borrow_date', $borrowing->borrow_date ? $borrowing->borrow_date->format('Y-m-d') : '') }}" />

                <label class="block mt-4 mb-1 font-medium">Batas Pengembalian</label>
                <input type="date" name="return_deadline" class="w-full border-gray-300 rounded shadow-sm"
                    value="{{ old('return_deadline', $borrowing->return_deadline ? $borrowing->return_deadline->format('Y-m-d') : '') }}" />
            </div>

            <div>
                <select name="status" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="dipinjam" {{ $borrowing->status === 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ $borrowing->status === 'dikembalikan' ? 'selected' : '' }}>Dikembalikan
                    </option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('borrowings.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
        </form>
    </div>
@endsection
