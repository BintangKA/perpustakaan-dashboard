@extends('layouts.app')

@section('content')
<div class="p-4 mx-auto max-w-7xl">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Daftar Laporan</h1>
        <a href="{{ route('reports.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Tambah Laporan</a>
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
                    <th class="px-4 py-2">Tanggal Laporan</th>
                    <th class="px-4 py-2">Total Users</th>
                    <th class="px-4 py-2">Total Buku</th>
                    <th class="px-4 py-2">Total Peminjaman</th>
                    <th class="px-4 py-2">Total Pengembalian</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($reports as $index => $report)
                <tr>
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $report->report_date->format('d M Y') }}</td>
                    <td class="px-4 py-2">{{ $report->total_users }}</td>
                    <td class="px-4 py-2">{{ $report->total_books }}</td>
                    <td class="px-4 py-2">{{ $report->total_borrowings }}</td>
                    <td class="px-4 py-2">{{ $report->total_returns }}</td>
                    <td class="flex gap-2 px-4 py-2">
                        <a href="{{ route('reports.edit', $report->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach

                @if ($reports->isEmpty())
                <tr>
                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">Belum ada laporan.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
