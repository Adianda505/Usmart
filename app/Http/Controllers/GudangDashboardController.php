<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class GudangDashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalStokProduk = Product::sum('stok');

        $totalBarangMasuk = StockMovement::where('type', 'masuk')->sum('qty');

        $totalBarangKeluar = StockMovement::where('type', 'keluar')->sum('qty');

        $totalStockMovement = StockMovement::count();

        $produkStokRendah = Product::where('stok', '<=', 10)
            ->orderBy('stok', 'asc')
            ->take(5)
            ->get();

        $stockMovementsTerbaru = StockMovement::with(['product', 'branch'])
            ->latest()
            ->take(8)
            ->get();

        return view('gudang.dashboard', compact(
            'totalProducts',
            'totalStokProduk',
            'totalBarangMasuk',
            'totalBarangKeluar',
            'totalStockMovement',
            'produkStokRendah',
            'stockMovementsTerbaru'
        ));
    }
}