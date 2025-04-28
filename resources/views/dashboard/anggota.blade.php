@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main
        class="relative flex items-center justify-center flex-grow py-16 bg-gradient-to-r from-blue-100 via-purple-100 to-white-100">
        <div class="flex flex-col-reverse items-center px-6 mx-auto max-w-7xl lg:flex-row">
            <!-- Text Section -->
            <div class="w-full text-center lg:w-3/5 lg:text-left">
                <h1 class="mb-4 text-5xl font-extrabold leading-tight text-gray-800 sm:text-6xl">
                    Jelajahi Dunia<br>
                    <span class="text-blue-600">Buku & Pengetahuan</span>
                </h1>
                <p class="mt-4 text-base text-gray-600 sm:text-lg">
                    Temukan berbagai macam judul buku dari beragam kategori. Perpustakaan kami hadir untuk memenuhi rasa
                    ingin tahu dan memperluas wawasanmu tanpa batas.
                </p>
                <div class="mt-8">
                    <a href="{{ route('book.list') }}"
                        class="inline-block px-6 py-3 font-semibold text-white uppercase bg-blue-600 rounded-lg hover:bg-blue-500 text-md">
                        Lihat Koleksi Buku
                    </a>
                </div>
            </div>
            <!-- Image Section -->
            <div class="flex justify-center w-full mb-10 lg:w-2/5 lg:mb-0">
                <img src="{{ asset('image/Hero_read.png') }}" alt="Hero Image" class="max-w-xs sm:max-w-sm md:max-w-md" />
            </div>
        </div>

        <!-- Responsive SVG -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-auto" viewBox="0 0 1440 100" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none">
                <path
                    d="M0 43.9999C106.667 43.9999 213.333 7.99994 320 7.99994C426.667 7.99994 533.333 43.9999 640 43.9999C746.667 43.9999 853.333 7.99994 960 7.99994C1066.67 7.99994 1173.33 43.9999 1280 43.9999C1386.67 43.9999 1440 19.0266 1440 9.01329V100H0V43.9999Z"
                    class="fill-current text-gray-50"></path>
            </svg>
        </div>
    </main>
    {{-- About Us + stat --}}
    <div class="py-5 bg-gray-50">
        <div class="flex flex-col justify-between gap-10 px-6 mx-auto max-w-7xl md:flex-row">

            <!-- Bagian Kiri: Text -->
            <div class="w-full md:w-1/2">
                <h2 class="mb-2 text-lg font-semibold text-indigo-600">Tentang Kami</h2>
                <h1 class="mb-4 text-4xl font-bold leading-tight text-gray-900">
                    Perpustakaan Digital untuk Generasi Masa Kini
                </h1>
                <p class="leading-relaxed text-gray-700">
                    Kami berkomitmen untuk menyediakan akses informasi koleksi buku secara digital guna mendukung
                    pembelajaran sepanjang hayat bagi seluruh anggota.
                    Meskipun informasi dapat diakses secara online, proses pendaftaran dan peminjaman buku tetap
                    dilakukan secara langsung di tempat.
                    Dengan koleksi yang selalu diperbarui, kami hadir untuk memenuhi kebutuhan literasi Anda.
                </p>
            </div>

            <!-- Bagian Kanan: Gambar dan Fitur -->
            <div class="w-full md:w-1/2">
                <div class="grid grid-cols-2 grid-rows-4 gap-4">
                    <!-- Gambar -->
                    <div class="col-span-2 row-span-2">
                        <img src="{{ asset('image/596x264.png') }}" alt="Foto Perpustakaan"
                            class="object-cover w-full h-full rounded-lg shadow-lg">
                    </div>

                    <!-- Kotak Fitur 1 -->
                    <div
                        class="flex flex-col items-center justify-center p-6 transition-transform duration-300 shadow-lg bg-gradient-to-r from-green-100 to-green-200 rounded-2xl hover:scale-105">
                        <div class="text-sm font-semibold tracking-wide text-green-700 uppercase">Total Buku</div>
                        <div class="mt-4 text-4xl font-bold text-green-900">{{ $bookCount }}</div>
                    </div>

                    <!-- Kotak Fitur 2 -->
                    <div
                        class="flex flex-col items-center justify-center p-6 transition-transform duration-300 shadow-lg bg-gradient-to-r from-indigo-100 to-indigo-200 rounded-2xl hover:scale-105">
                        <div class="text-sm font-semibold tracking-wide text-indigo-700 uppercase">Total Anggota</div>
                        <div class="mt-4 text-4xl font-bold text-indigo-900">{{ $userCount }}</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Timeline --}}
    <div class="relative py-10 bg-gray-50">
        <div class="flex flex-col items-center justify-between gap-10 px-6 mx-auto max-w-7xl md:flex-row md:items-center">
            <!-- Bagian Kiri: Gambar -->
            <div class="w-full md:w-1/2">
                <img src="{{ asset('image/500x500.png') }}" alt="Foto Perpustakaan"
                    class="object-cover w-full h-full rounded-lg shadow-lg">
            </div>

            <!-- Bagian Kanan: Timeline -->
            <div class="w-full md:w-1/2">
                <h2 class="mb-8 text-3xl font-bold text-gray-900">Alur Pendaftaran</h2>
                <ol class="relative space-y-8 border-l border-gray-300">
                    <!-- Step 1 -->
                    <li class="pl-6">
                        <span class="absolute w-3 h-3 bg-blue-600 rounded-full -left-1.5 top-1.5"></span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">Datang ke Perpustakaan</h3>
                        <p class="mt-2 text-sm text-gray-700">
                            Pengunjung mendatangi perpustakaan secara langsung untuk memulai proses pendaftaran.
                        </p>
                    </li>

                    <!-- Step 2 -->
                    <li class="pl-6">
                        <span class="absolute w-3 h-3 bg-blue-600 rounded-full -left-1.5 top-1.5"></span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">Menuju Meja Pendaftaran</h3>
                        <p class="mt-2 text-sm text-gray-700">
                            Setelah tiba, pengunjung diarahkan menuju meja pendaftaran yang telah disediakan.
                        </p>
                    </li>

                    <!-- Step 3 -->
                    <li class="pl-6">
                        <span class="absolute w-3 h-3 bg-blue-600 rounded-full -left-1.5 top-1.5"></span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">Mengisi Formulir dan Melampirkan Dokumen</h3>
                        <p class="mt-2 text-sm text-gray-700">
                            Pengunjung mengisi formulir pendaftaran dan menyerahkan dokumen persyaratan yang diperlukan.
                        </p>
                    </li>

                    <!-- Step 4 -->
                    <li class="pl-6">
                        <span class="absolute w-3 h-3 bg-blue-600 rounded-full -left-1.5 top-1.5"></span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">Verifikasi oleh Petugas</h3>
                        <p class="mt-2 text-sm text-gray-700">
                            Petugas memverifikasi data formulir dan dokumen yang telah diberikan.
                        </p>
                    </li>

                    <!-- Step 5 -->
                    <li class="pl-6">
                        <span class="absolute w-3 h-3 bg-blue-600 rounded-full -left-1.5 top-1.5"></span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">Pembuatan Kartu Anggota</h3>
                        <p class="mt-2 text-sm text-gray-700">
                            Setelah verifikasi selesai, kartu anggota perpustakaan akan dicetak dan diberikan.
                        </p>
                    </li>

                    <!-- Step 6 -->
                    <li class="pl-6">
                        <span class="absolute w-3 h-3 bg-blue-600 rounded-full -left-1.5 top-1.5"></span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">Akun Aktif dan Mulai Meminjam Buku</h3>
                        <p class="mt-2 text-sm text-gray-700">
                            Akun anggota aktif, dan Anda sudah bisa meminjam koleksi buku di perpustakaan.
                        </p>
                    </li>

                </ol>
            </div>
        </div>
    </div>
    {{-- Testimonial --}}
    <section class="py-16 bg-blue-50">
        <div class="flex flex-col items-start gap-10 px-5 mx-auto max-w-7xl md:flex-row md:items-center">
            <!-- Kiri: Judul -->
            <div class="w-full md:w-1/3">
                <p class="mb-3 text-blue-700 uppercase font-roboto">Testimoni</p>
                <h1 class="mb-5 text-3xl font-bold text-blue-900 font-montserrat">Pengalaman Pengunjung Kami</h1>
                <p class="text-gray-700 font-montserrat">Buku lengkap, suasana nyaman, dan pelayanan yang ramah —
                    jadikan kunjunganmu berkesan di perpustakaan kami!</p>
                <a href="{{ route('book.list') }}">
                    <button
                        class="px-6 py-2 mt-6 font-semibold text-blue-600 transition duration-300 border border-blue-600 rounded-lg hover:bg-blue-700 hover:text-white font-oswald">
                        Lihat Koleksi Buku
                    </button>
                </a>
            </div>

            <!-- Kanan: Testimoni -->
            <div class="w-full md:w-2/3">
                <!-- Mobile Layout -->
                <div class="grid gap-6 sm:grid-cols-2 md:hidden">
                    <!-- Testimoni 1 -->
                    <div class="p-5 bg-white rounded-lg shadow-md">
                        <div class="mb-2 text-yellow-400">⭐⭐⭐⭐⭐</div>
                        <p class="mb-4 text-gray-600">"Koleksi bukunya sangat lengkap! Saya bisa menemukan buku-buku
                            referensi langka yang sulit ditemukan di tempat lain."</p>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('image/leon.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-800">Leonardo – Yogyakarta</span>
                        </div>
                    </div>

                    <!-- Testimoni 2 -->
                    <div class="p-5 bg-white rounded-lg shadow-md">
                        <div class="mb-2 text-yellow-400">⭐⭐⭐⭐⭐</div>
                        <p class="mb-4 text-gray-600">"Petugas perpustakaan sangat ramah dan membantu saya menemukan
                            buku yang saya butuhkan. Pelayanan luar biasa!"</p>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('image/egi.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-800">Farhan Egi – Sleman</span>
                        </div>
                    </div>

                    <!-- Testimoni 3 -->
                    <div class="p-5 bg-white rounded-lg shadow-md sm:col-span-2">
                        <div class="mb-2 text-yellow-400">⭐⭐⭐⭐⭐</div>
                        <p class="mb-4 text-gray-600">"Tempatnya nyaman banget buat belajar. Suasana tenang, fasilitas
                            lengkap, betah berjam-jam di sini!"</p>
                        <div class="flex items-center gap-4">
                            <img src="{{ asset('image/almer.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-800">Almeriano – Bantul</span>
                        </div>
                    </div>
                </div>

                <!-- Desktop Layout -->
                <div class="hidden grid-cols-2 grid-rows-6 gap-8 p-5 md:grid">
                    <!-- Testimoni besar kiri -->
                    <div
                        class="flex flex-col justify-between col-start-1 row-span-4 row-start-2 p-5 bg-white rounded-lg shadow-md">
                        <div class="mb-2 text-yellow-400">⭐⭐⭐⭐⭐</div>
                        <p class="mb-4 text-gray-600">"Koleksi bukunya sangat lengkap! Saya bisa menemukan buku-buku
                            referensi langka yang sulit ditemukan di tempat lain."</p>
                        <div class="flex items-center gap-4 mt-4">
                            <img src="{{ asset('image/leon.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-800">Leonardo – Yogyakarta</span>
                        </div>
                    </div>

                    <!-- Testimoni kanan atas -->
                    <div
                        class="flex flex-col justify-between col-start-2 row-span-3 row-start-1 p-5 bg-white rounded-lg shadow-md">
                        <div class="mb-2 text-yellow-400">⭐⭐⭐⭐⭐</div>
                        <p class="mb-4 text-gray-600">"Petugas perpustakaan sangat ramah dan membantu saya menemukan
                            buku yang saya butuhkan. Pelayanan luar biasa!"</p>
                        <div class="flex items-center gap-4 mt-4">
                            <img src="{{ asset('image/egi.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-800">Farhan Egi – Sleman</span>
                        </div>
                    </div>

                    <!-- Testimoni kanan bawah -->
                    <div
                        class="flex flex-col justify-between col-start-2 row-span-3 row-start-4 p-5 bg-white rounded-lg shadow-md">
                        <div class="mb-2 text-yellow-400">⭐⭐⭐⭐⭐</div>
                        <p class="mb-4 text-gray-600">"Tempatnya nyaman banget buat belajar. Suasana tenang, fasilitas
                            lengkap, betah berjam-jam di sini!"</p>
                        <div class="flex items-center gap-4 mt-4">
                            <img src="{{ asset('image/almer.jpg') }}" alt="User" class="w-10 h-10 rounded-full">
                            <span class="font-semibold text-gray-800">Almeriano – Bantul</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
