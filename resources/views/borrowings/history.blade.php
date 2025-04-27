@extends('layouts.app')

@section('content')
<div class="max-w-5xl p-4 mx-auto mt-5 bg-white rounded shadow">
    <h2 class="mb-6 text-2xl font-bold text-gray-800">Histori Peminjaman Buku</h2>

    @if ($borrowings->isEmpty())
        <p class="text-gray-600">Kamu belum pernah meminjam buku.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm table-auto">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="px-4 py-2">Judul Buku</th>
                        <th class="px-4 py-2">Gambar</th>
                        <th class="px-4 py-2">Tanggal Pinjam</th>
                        <th class="px-4 py-2">Batas Kembali</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowings as $borrowing)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $borrowing->book->title }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $borrowing->book->image) }}"
                                    alt="{{ $borrowing->book->title }}" class="object-cover w-16 h-24 rounded shadow" />
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $borrowing->borrow_date->format('d M Y') }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $borrowing->return_deadline->format('d M Y') }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded text-white text-xs
                                    {{ $borrowing->status === 'dipinjam' ? 'bg-yellow-500' : 'bg-green-500' }}">
                                    {{ ucfirst($borrowing->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 whitespace-nowrap">
                                Rp{{ number_format($borrowing->calculateFine(), 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
