@extends('layouts.app')

@section('content')
<div class="p-4 mx-auto max-w-7xl">
    <div class="flex flex-row items-center justify-between mb-6">
        <h1 class="mb-4 text-2xl font-semibold sm:mb-0">Daftar Laporan</h1>
        <a href="{{ route('reports.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
            + Tambah Laporan
        </a>
    </div>

    @if (session('success'))
        <div class="p-3 mb-4 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($reports->sortBy('report_date') as $report)
            <div class="p-5 bg-white rounded-lg shadow hover:shadow-md">
                <h2 class="mb-2 text-xl font-semibold">{{ $report->report_date->format('d M Y') }}</h2>
                <div class="space-y-1 text-sm text-gray-700">
                    <p><strong>Total Users:</strong> {{ $report->total_users }}</p>
                    <p><strong>Total Buku:</strong> {{ $report->total_books }}</p>
                    <p><strong>Total Peminjaman:</strong> {{ $report->total_borrowings }}</p>
                    <p><strong>Total Pengembalian:</strong> {{ $report->total_returns }}</p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('reports.edit', $report->id) }}"
                        class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                        Edit
                    </a>
                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 text-sm text-white bg-red-600 rounded hover:bg-red-700">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                <p class="text-center text-gray-500">Belum ada laporan.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
