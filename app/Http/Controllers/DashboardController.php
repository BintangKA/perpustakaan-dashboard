<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('dashboard.petugas');
        } elseif ($user->role === 'anggota') {
            return redirect()->route('dashboard.anggota');
        }

        abort(403, 'Unauthorized action.');
    }

    public function welcome()
    {
        $bookCount = Book::count();
        $userCount = User::where('role', 'anggota')->count();
        return view('welcome', compact('bookCount', 'userCount'));
    }

    public function admin()
    {
        $bookCount = Book::count();
        $userCount = User::where('role', 'anggota')->count();

        return view('dashboard.admin', compact('bookCount', 'userCount'));
    }

    public function petugas()
    {
        $bookCount = Book::count();
        $userCount = User::where('role', 'anggota')->count();

        return view('dashboard.petugas', compact('bookCount', 'userCount'));
    }

    public function anggota()
    {
        $bookCount = Book::count();
        $userCount = User::where('role', 'anggota')->count();
        return view('dashboard.anggota', compact('bookCount', 'userCount'));
    }
}
