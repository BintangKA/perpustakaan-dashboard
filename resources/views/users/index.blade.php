@extends('layouts.app')

@section('content')
    <div class="p-4 mx-auto max-w-7xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-semibold">Daftar Pengguna</h1>
            <a href="{{ route('users.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">+ Tambah
                User</a>
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
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Telepon</th>
                        <th class="px-4 py-2">alamat</th>
                        <th class="px-4 py-2">Role</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($users as $index => $user)
                        <tr>
                            <td class="p-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->telepon }}</td>
                            <td class="px-4 py-2">{{ $user->alamat }}</td>
                            <td class="px-4 py-2">
                                @php
                                    switch ($user->role) {
                                        case 'admin':
                                            $roleColor = 'bg-red-100 text-red-800';
                                            break;
                                        case 'petugas':
                                            $roleColor = 'bg-green-100 text-green-800';
                                            break;
                                        case 'anggota':
                                            $roleColor = 'bg-blue-100 text-blue-800';
                                            break;
                                        default:
                                            $roleColor = 'bg-gray-100 text-gray-800';
                                    }
                                @endphp
                                <span class="px-2 py-1 text-xs font-semibold rounded {{ $roleColor }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="flex gap-2 px-4 py-2">
                                <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus user ini?')"
                                        class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="9" class="px-4 py-4 text-center text-gray-500">Belum ada data user.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
