@extends('layouts.app')

@section('content')
    <div class="py-8">
        <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Card Total Buku -->
                <div class="p-6 transition duration-300 ease-in-out bg-white shadow-md rounded-2xl hover:shadow-lg">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 text-indigo-600 bg-indigo-100 rounded-full">
                            <!-- Example Icon (Book Icon) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6l4 2m-6-8H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V10a2 2 0 00-2-2h-6z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">Total Buku</h3>
                            <p class="mt-1 text-3xl font-bold text-indigo-600">{{ $bookCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Total Anggota -->
                <div class="p-6 transition duration-300 ease-in-out bg-white shadow-md rounded-2xl hover:shadow-lg">
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center justify-center w-12 h-12 text-green-600 bg-green-100 rounded-full">
                            <!-- Example Icon (User Group Icon) -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 11a4 4 0 10-8 0 4 4 0 008 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zM6 11a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase">Total Anggota</h3>
                            <p class="mt-1 text-3xl font-bold text-green-600">{{ $userCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Selamat Datang -->
                <div class="col-span-1 p-6 bg-white shadow rounded-xl sm:col-span-2 lg:col-span-1">
                    <div class="text-lg font-medium text-gray-700">
                        👋 Selamat datang di Dashboard Perpustakaan!
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Silakan kelola data buku, anggota, dan laporan melalui menu di navigasi.
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
