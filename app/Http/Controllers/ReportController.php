<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('report_date', 'desc')->get();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        // Generate data statistik
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $totalBorrowings = Borrowing::where('status', 'dipinjam')->count();
        $totalReturns = Borrowing::where('status', 'dikembalikan')->count();

        // Validasi agar 1 hari hanya 1 report
        $reportDate = $request->input('report_date', now()->toDateString());

        $existingReport = Report::where('report_date', $reportDate)->first();
        if ($existingReport) {
            return redirect()->route('reports.index')->with('error', 'Laporan untuk tanggal ini sudah ada.');
        }

        // Simpan laporan
        Report::create([
            'total_users' => $totalUsers,
            'total_books' => $totalBooks,
            'total_borrowings' => $totalBorrowings,
            'total_returns' => $totalReturns,
            'report_date' => $reportDate,
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat.');
    }

    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'total_users' => 'required|integer|min:0',
            'total_books' => 'required|integer|min:0',
            'total_borrowings' => 'required|integer|min:0',
            'total_returns' => 'required|integer|min:0',
        ]);

        $report->update([
            'total_users' => $request->total_users,
            'total_books' => $request->total_books,
            'total_borrowings' => $request->total_borrowings,
            'total_returns' => $request->total_returns,
        ]);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil diperbarui.');
    }


    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
