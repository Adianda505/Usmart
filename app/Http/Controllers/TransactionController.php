<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Branch;
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
}