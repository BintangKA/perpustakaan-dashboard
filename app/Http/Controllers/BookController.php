<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    public function tampil()
    {
        $books = Book::with('category')->get();
        return view('books.tampil', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'stock' => 'required|integer',
            'description' => 'required',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Upload file gambar
        $imagePath = $request->file('image')->store('images', 'public');

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'image' => $imagePath,
            'stock' => $request->stock,
            'description' => $request->description,
            'year' => $request->year,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }


    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stock' => 'required|integer',
            'description' => 'required',
            'year' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'stock' => $request->stock,
            'description' => $request->description,
            'year' => $request->year,
            'category_id' => $request->category_id,
        ];

        // Jika ada file baru, upload dan ganti yang lama
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $book->update($data);

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }


    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
