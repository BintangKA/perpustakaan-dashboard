@php
    $user = Auth::user();
    $role = $user->role ?? null;
@endphp

<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-gray-100 bg-white/30 backdrop-blur-md">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ $dashboardRoutes[$role] ?? route('dashboard.admin') }}">
                        <img src="{{ asset('image/logo_perpus.png') }}" alt="Logo Perpustakaan" class="w-auto h-12">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard.' . $role)" :active="request()->routeIs('dashboard.*')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if (in_array($role, ['admin', 'petugas']))
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
                            {{ __('Users') }}
                        </x-nav-link>
                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')">
                            {{ __('Kategori') }}
                        </x-nav-link>
                        <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.*')">
                            {{ __('Buku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('borrowings.index')" :active="request()->routeIs('borrowings.*')">
                            {{ __('Peminjaman') }}
                        </x-nav-link>
                        <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.*')">
                            {{ __('Laporan') }}
                        </x-nav-link>
                    @endif
                    @if ($role === 'anggota')
                        <x-nav-link :href="route('book.list')" :active="request()->routeIs('book.list')">
                            {{ __('Daftar Buku') }}
                        </x-nav-link>
                        <x-nav-link :href="route('borrowings.history')" :active="request()->routeIs('borrowings.history')">
                            {{ __('Histori Pinjam') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 transition border border-transparent rounded-md bg-white/50 backdrop-blur-md hover:text-gray-700">
                            <div>{{ $user->name }}</div>
                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4z" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.' . $role)" :active="request()->routeIs('dashboard.*')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            @if (in_array($role, ['admin', 'petugas']))
                <x-responsive-nav-link :href="route('users.index')">
                    {{ __('Users') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('categories.index')">
                    {{ __('Kategori') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('books.index')">
                    {{ __('Buku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('borrowings.index')">
                    {{ __('Peminjaman') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('reports.index')">
                    {{ __('Laporan') }}
                </x-responsive-nav-link>
            @endif
            @if ($role === 'anggota')
                <x-responsive-nav-link :href="route('book.list')" :active="request()->routeIs('book.list')">
                    {{ __('Daftar Buku') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('borrowings.history')" :active="request()->routeIs('borrowings.history')">
                    {{ __('Histori Pinjam') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ $user->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ $user->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
