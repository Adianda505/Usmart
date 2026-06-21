<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchProductStock;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Transactions;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReportExportController extends Controller
{
    public function products()
    {
        $products = Product::with('category')
            ->orderByDesc('id')
            ->get();

        $pdf = Pdf::loadView('reports.products_pdf', compact('products'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-produk.pdf');
    }

    public function stock()
    {
        $stocks = StockMovement::with(['product', 'branch'])
            ->orderByDesc('id')
            ->get();

        $pdf = Pdf::loadView('reports.stock_pdf', compact('stocks'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-stock.pdf');
    }

    public function branches()
    {
        $branches = Branch::orderByDesc('id')->get();

        $pdf = Pdf::loadView('reports.branches_pdf', compact('branches'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-cabang.pdf');
    }

    public function kasir()
    {
        $users = User::with('branch')
            ->where('role', 'kasir')
            ->orderByDesc('id')
            ->get();

        $roleTitle = 'Kasir';

        $pdf = Pdf::loadView('reports.users_pdf', compact('users', 'roleTitle'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-user-kasir.pdf');
    }

    public function manajer()
    {
        $users = User::with('branch')
            ->where('role', 'manajer')
            ->orderByDesc('id')
            ->get();

        $roleTitle = 'Manajer';

        $pdf = Pdf::loadView('reports.users_pdf', compact('users', 'roleTitle'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-user-manajer.pdf');
    }

    public function supervisor()
    {
        $users = User::with('branch')
            ->where('role', 'supervisor')
            ->orderByDesc('id')
            ->get();

        $roleTitle = 'Supervisor';

        $pdf = Pdf::loadView('reports.users_pdf', compact('users', 'roleTitle'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-data-user-supervisor.pdf');
    }

    public function managerBranchProducts()
    {
        $manajer = Auth::user();

        if (! $manajer->branch_id) {
            abort(403, 'Akun manajer belum terhubung dengan cabang.');
        }

        $products = BranchProductStock::with(['product.category', 'branch'])
            ->where('branch_id', $manajer->branch_id)
            ->where('stok', '>', 0)
            ->orderByDesc('id')
            ->get();

        $branch = $manajer->branch;

        $pdf = Pdf::loadView('reports.manajer_products_pdf', compact('products', 'manajer', 'branch'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-produk-cabang-'.str_replace(' ', '-', strtolower($branch->nama_cabang ?? 'cabang')).'.pdf');
    }

    public function branchTransactions()
    {
        $user = auth()->user();

        if (! $user->branch_id) {
            abort(403, 'Akun belum terhubung dengan cabang.');
        }

        $transactions = Transactions::with(['branch', 'kasir'])
            ->where('branch_id', $user->branch_id)
            ->orderByDesc('id')
            ->get();

        $branch = $user->branch;

        $roleTitle = ucfirst($user->role);

        $pdf = Pdf::loadView('reports.branch_transactions_pdf', compact(
            'transactions',
            'user',
            'branch',
            'roleTitle'
        ))->setPaper('a4', 'landscape');

        return $pdf->download(
            'laporan-transaksi-cabang-'.str_replace(' ', '-', strtolower($branch->nama_cabang ?? 'cabang')).'.pdf'
        );
    }
}
