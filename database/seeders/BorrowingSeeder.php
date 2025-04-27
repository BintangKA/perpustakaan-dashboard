<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Borrowing;
use App\Models\Book;
use App\Models\User;

class BorrowingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'anggota')->first();
        $books = Book::all();
    
        foreach ($books->take(2) as $book) {
            Borrowing::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'borrow_date' => now(),
                'return_deadline' => now()->addDays(7),
                'status' => 'dipinjam',
            ]);
        }
    }
}
