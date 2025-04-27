@extends('layouts.app')

@section('content')
<div class="max-w-xl p-4 mx-auto">
    <h1 class="mb-4 text-xl font-semibold">Edit Laporan</h1>

    <form action="{{ route('reports.update', $report) }}" method="POST" class="p-6 bg-white rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Tanggal Laporan</label>
            <input type="text" value="{{ $report->report_date->format('d M Y') }}" class="w-full bg-gray-100 border-gray-300 rounded" readonly>
        </div>

        <div class="mb-4">
            <label class="block">Total Users</label>
            <input type="number" name="total_users" value="{{ old('total_users', $report->total_users) }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Buku</label>
            <input type="number" name="total_books" value="{{ old('total_books', $report->total_books) }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Peminjaman</label>
            <input type="number" name="total_borrowings" value="{{ old('total_borrowings', $report->total_borrowings) }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Total Pengembalian</label>
            <input type="number" name="total_returns" value="{{ old('total_returns', $report->total_returns) }}" class="w-full border-gray-300 rounded" required>
        </div>

        <div class="flex items-center">
            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Update</button>
            <a href="{{ route('reports.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
        </div>
    </form>
</div>
@endsection
