@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <div class="max-w-xl p-4 mx-auto">
        <h1 class="mb-4 text-xl font-semibold">Tambah User</h1>
        <form action="{{ route('users.store') }}" method="POST" class="p-6 bg-white rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block">Nama</label>
                <input type="text" name="name" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Telepon</label>
                <input type="text" name="telepon" class="w-full border-gray-300 rounded">
            </div>
            <div class="mb-4">
                <label class="block">Alamat</label>
                <textarea name="alamat" rows="3" class="w-full border-gray-300 rounded"></textarea>
            </div>
            <div class="mb-4">
                <label class="block">Password</label>
                <input type="password" name="password" class="w-full border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Role</label>
                <select name="role" class="w-full border-gray-300 rounded">
                    <option value="anggota" {{ old('role') == 'anggota' ? 'selected' : '' }}>Anggota</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                </select>
            </div>

            <div class="flex items-center">
                <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('users.index') }}" class="ml-4 text-gray-600 hover:text-yellow-600">Kembali</a>
            </div>
        </form>
    </div>
@endsection
