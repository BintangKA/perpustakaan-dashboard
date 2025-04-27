@extends('layouts.app')

@section('content')
    <div class="max-w-xl p-4 mx-auto">
        <h1 class="mb-4 text-xl font-semibold">Edit User</h1>
        <form action="{{ route('users.update', $user) }}" method="POST" class="p-6 bg-white rounded shadow">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Telepon</label>
                <input type="text" name="telepon" value="{{ old('telepon', $user->telepon) }}"
                    class="w-full border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label class="block">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full border-gray-300 rounded">{{ old('alamat', $user->alamat) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block">Password (Opsional)</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label class="block">Role</label>
                <select name="role" class="w-full border-gray-300 rounded">
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ $user->role === 'petugas' ? 'selected' : '' }}>Petugas</option>
                    <option value="anggota" {{ $user->role === 'anggota' ? 'selected' : '' }}>Anggota</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Update</button>
            <a href="{{ route('users.index') }}" class="ml-2 text-gray-600 hover:text-yellow-600">Kembali</a>
        </form>
    </div>
@endsection
