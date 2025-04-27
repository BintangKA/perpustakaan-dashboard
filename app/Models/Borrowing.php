<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_deadline',
        'add_fine',
        'status',
    ];
    protected $casts = [
        'borrow_date' => 'date',
        'return_deadline' => 'date',
    ];

    public function calculateFine()
    {
        if ($this->status === 'dipinjam' && now()->isAfter($this->return_deadline)) {
            $daysLate = now()->diffInDays($this->return_deadline);
            return $daysLate * 20000;
        }
        return 0;
    }

    // Relasi ke user (anggota)
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relasi ke buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
