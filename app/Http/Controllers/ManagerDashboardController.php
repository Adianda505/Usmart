<?php

namespace App\Http\Controllers;

use App\Models\BranchProductStock;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        $manajer = Auth::user();
        $branchId = $manajer->branch_id;

        // Data stok produk hanya dari cabang manajer
        $stocks = BranchProductStock::with(['product', 'branch'])
            ->where('branch_id', $branchId)
            ->get();

        // Data transaksi hanya dari cabang manajer
        $transactions = Transactions::with(['branch', 'user', 'details.product'])
            ->where('branch_id', $branchId)
            ->latest()
            ->get();

        // Ringkasan dashboard
        $totalProduk = $stocks->count();

        $totalStok = $stocks->sum('stok');

        $totalTransaksi = $transactions->count();

        $totalPendapatan = $transactions->sum('total');

        return view('manajer.dashboard', compact(
            'manajer',
            'stocks',
            'transactions',
            'totalProduk',
            'totalStok',
            'totalTransaksi',
            'totalPendapatan'
        ));
    }
}