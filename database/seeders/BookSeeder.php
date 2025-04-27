<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            Book::create([
                'title' => 'Buku ' . $category->name,
                'author' => 'Penulis ' . $category->name,
                'stock' => rand(3, 10),
                'year' => rand(2015, 2023),
                'category_id' => $category->id
            ]);
        }
    }  
}
