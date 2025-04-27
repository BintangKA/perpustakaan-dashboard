@extends('layouts.app')

@section('content')
<div class="max-w-xl p-6 mx-auto">
    <h1 class="mb-6 text-2xl font-semibold">Tambah Laporan</h1>

    <form action="{{ route('reports.store') }}" method="POST" class="p-6 bg-white rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="block">Tanggal Laporan</label>
            <input type="date" name="report_date" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Users</label>
            <input type="number" name="total_users" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Buku</label>
            <input type="number" name="total_books" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Peminjaman</label>
            <input type="number" name="total_borrowings" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Pengembalian</label>
            <input type="number" name="total_returns" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="flex items-center">
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('reports.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
        </div>
    </form>
</div>
@endsection
