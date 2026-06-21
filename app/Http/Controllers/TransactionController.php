<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Transactions;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $branches = Branch::all();

        $transactions = Transactions::with(['branch', 'kasir'])
            ->when($request->branch_id, function ($query) use ($request) {
                $query->where('branch_id', $request->branch_id);
            })
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions', 'branches'));
    }

    public function exportPdf(Request $request)
    {
        $transactions = Transactions::with(['branch', 'user', 'details.product'])
            ->when($request->branch_id, function ($query) use ($request) {
                $query->where('branch_id', $request->branch_id);
            })
            ->latest()
            ->get();

        $pdf = Pdf::loadView('transactions.export_pdf', compact('transactions'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-transaksi.pdf');
    }
}
