@extends('layouts.app')

@section('content')
<div class="p-4 mx-auto max-w-7xl">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Daftar Peminjaman</h1>
        <a href="{{ route('borrowings.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Tambah Peminjaman</a>
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
                    <th class="px-4 py-2">Peminjam</th>
                    <th class="px-4 py-2">Judul Buku</th>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Tanggal Pinjam</th>
                    <th class="px-4 py-2">Deadline</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Denda</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($borrowings as $index => $borrowing)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $borrowing->user->name }}</td>
                        <td class="px-4 py-2">{{ $borrowing->book->title ?? '-' }}</td>
                        <td class="px-4 py-2">
                            @if ($borrowing->book && $borrowing->book->image)
                                <img src="{{ asset('storage/' . $borrowing->book->image) }}" alt="{{ $borrowing->book->title }}" class="object-cover w-16 h-20 rounded">
                            @else
                                <span class="italic text-gray-500">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $borrowing->borrow_date->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">{{ $borrowing->return_deadline->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded 
                                {{ $borrowing->status === 'dipinjam' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800' }}">
                                {{ ucfirst($borrowing->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            Rp{{ number_format($borrowing->calculateFine(), 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if ($borrowings->isEmpty())
                    <tr>
                        <td colspan="9" class="px-4 py-4 text-center text-gray-500">Belum ada data peminjaman.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
