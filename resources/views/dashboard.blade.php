<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <!-- Card Total Buku -->
                <div class="p-6 bg-white shadow rounded-xl">
                    <div class="text-sm font-medium text-gray-500">Total Buku</div>
                    <div class="mt-2 text-3xl font-semibold text-indigo-600">{{ $bookCount }}</div>
                </div>

                <!-- Card Total Anggota -->
                <div class="p-6 bg-white shadow rounded-xl">
                    <div class="text-sm font-medium text-gray-500">Total Anggota</div>
                    <div class="mt-2 text-3xl font-semibold text-green-600">{{ $userCount }}</div>
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
</x-app-layout>
