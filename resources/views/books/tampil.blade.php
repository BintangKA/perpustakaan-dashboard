@extends('layouts.app')

@section('content')
    <div class="mt-10">
        <div class="grid grid-cols-1 gap-6 px-4 mx-auto md:grid-cols-2 lg:grid-cols-3 max-w-7xl">
            @foreach ($books as $book)
                <div class="flex flex-col overflow-hidden bg-white rounded-lg shadow-md">
                    @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}"
                            class="object-cover w-full h-64 rounded-lg">
                    @else
                        <div class="flex items-center justify-center w-full h-64 text-gray-500 bg-gray-200">
                            <span class="text-lg italic">Tidak ada gambar</span>
                        </div>
                    @endif

                    <div class="flex flex-col justify-between flex-1 p-6 space-y-4">
                        <div>
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">{{ $book->title }}</h2>
                            <p class="text-gray-600">
                                <span class="font-semibold">Penulis:</span> {{ $book->author }}
                            </p>
                            <p class="text-gray-600">
                                <span class="font-semibold">Tahun:</span> {{ $book->year }}
                            </p>
                            <p class="text-gray-600">
                                <span class="font-semibold">Kategori:</span> {{ $book->category->name ?? '-' }}
                            </p>
                            <p class="text-gray-600">
                                <span class="font-semibold">Stok:</span> {{ $book->stock }}
                            </p>
                        </div>
                        <div>
                            <p>Deskripsi</p>
                            <p class="mt-2 text-sm leading-relaxed text-gray-700">
                                {{ \Illuminate\Support\Str::limit($book->description, 300, '...') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
