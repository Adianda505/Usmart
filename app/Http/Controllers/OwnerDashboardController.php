<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\User;
use App\Models\Transactions;
use App\Models\StockMovement;
use App\Models\BranchProductStock;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        // CARD STATISTIK
        $totalCabang = Branch::count();
        $totalProduk = Product::count();

        $totalKasir = User::where('role', 'kasir')->count();
        $totalManajer = User::where('role', 'manajer')->count();
        $totalSupervisor = User::where('role', 'supervisor')->count();

        $totalTransaksi = Transactions::count();
        $totalPendapatan = Transactions::sum('total');

        // TRANSAKSI TERBARU
        $transaksiTerbaru = Transactions::with(['branch', 'user'])
            ->latest()
            ->take(5)
            ->get();

        // STOK RENDAH PER CABANG
        $stokRendah = BranchProductStock::with(['product', 'branch'])
            ->where('stok', '<=', 10)
            ->orderBy('stok', 'asc')
            ->take(5)
            ->get();

        // STOCK MOVEMENT TERBARU
        $stockMovements = StockMovement::with(['product', 'branch'])
            ->latest()
            ->take(5)
            ->get();

        // DATA CABANG
        $branches = Branch::withCount([
            'users as total_kasir' => function ($query) {
                $query->where('role', 'kasir');
            }
        ])->get();

        return view('owner.dashboard', compact(
            'totalCabang',
            'totalProduk',
            'totalKasir',
            'totalManajer',
            'totalSupervisor',
            'totalTransaksi',
            'totalPendapatan',
            'transaksiTerbaru',
            'stokRendah',
            'stockMovements',
            'branches'
        ));
    }
}