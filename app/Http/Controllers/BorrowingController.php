<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Borrowing;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'book'])->get();

        foreach ($borrowings as $borrowing) {
            if ($borrowing->status === 'dipinjam' && $borrowing->return_deadline < now()->toDateString()) {
                $daysLate = now()->diffInDays($borrowing->return_deadline);
                $fine = $daysLate * 20000; // 20rb per hari

                if ($borrowing->add_fine != $fine) {
                    $borrowing->update(['add_fine' => $fine]);
                }
            } else {
                // Kalau tidak telat, pastikan add_fine = 0
                if ($borrowing->add_fine != 0) {
                    $borrowing->update(['add_fine' => 0]);
                }
            }
        }

        return view('borrowings.index', compact('borrowings'));
    }


    public function create()
    {
        $users = User::where('role', 'anggota')->get();
        $books = Book::all();
        return view('borrowings.create', compact('users', 'books'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_deadline' => 'required|date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        // Cek stok terlebih dahulu
        $book = Book::findOrFail($request->book_id);
        if ($request->status === 'dipinjam' && $book->stock <= 0) {
            return redirect()->back()->withErrors(['book_id' => 'Stok buku tidak mencukupi.']);
        }
        // Buat data peminjaman
        $borrowing = Borrowing::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'return_deadline' => $request->return_deadline,
            'status' => $request->status,
        ]);

        // Kurangi stok jika dipinjam
        if ($request->status === 'dipinjam') {
            $book->decrement('stock');
        }

        return redirect()->route('borrowings.index')->with('success', 'Peminjaman berhasil.');
    }


    public function edit(Borrowing $borrowing)
    {
        $users = User::all();
        $books = Book::all();
        return view('borrowings.edit', compact('borrowing', 'users', 'books'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_deadline' => 'required|date|after_or_equal:borrow_date',
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $originalStatus = $borrowing->status;
        $originalBookId = $borrowing->book_id;
        $newStatus = $request->status;
        $newBookId = $request->book_id;

        // Jika status berubah dari dipinjam ke dikembalikan (dan sebelumnya belum dikembalikan)
        if ($originalStatus === 'dipinjam' && $newStatus === 'dikembalikan') {
            Book::find($originalBookId)?->increment('stock');
        }

        // Jika status tetap dipinjam tapi bukunya berubah
        if ($originalStatus === 'dipinjam' && $newStatus === 'dipinjam' && $originalBookId != $newBookId) {
            // Kembalikan stok buku lama
            Book::find($originalBookId)?->increment('stock');

            // Kurangi stok buku baru jika masih tersedia
            $newBook = Book::find($newBookId);
            if ($newBook && $newBook->stock > 0) {
                $newBook->decrement('stock');
            } else {
                return back()->withErrors(['book_id' => 'Stok buku yang dipilih tidak tersedia.'])->withInput();
            }
        }

        // Cegah perubahan ke status "dipinjam" jika stok habis
        if ($originalStatus === 'dikembalikan' && $newStatus === 'dipinjam') {
            $book = Book::find($newBookId);
            if ($book && $book->stock > 0) {
                $book->decrement('stock');
            } else {
                return back()->withErrors(['status' => 'Stok buku tidak mencukupi untuk dipinjam kembali.'])->withInput();
            }
        }

        // Simpan update terakhir
        $borrowing->update($request->all());

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman diperbarui');
    }

    public function destroy(Borrowing $borrowing)
    {
        if ($borrowing->status === 'dipinjam') {
            $borrowing->book->increment('stock');
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman dihapus');
    }

    public function history()
    {
        $user = Auth::user();
        $borrowings = Borrowing::with('book')
            ->where('user_id', $user->id)
            ->get();

        return view('borrowings.history', compact('borrowings'));
    }
}
