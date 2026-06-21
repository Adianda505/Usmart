<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\GudangDashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\OwnerDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportExportController;
use App\Http\Controllers\StockMovementController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\SupervisorDashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/user', function () {
    return 'Halaman User';
})->name('user.index');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Role: Owner
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:owner'])->group(function () {

    Route::get('/owner/dashboard', [OwnerDashboardController::class, 'index'])
        ->name('owner.dashboard');

    Route::get('/owner/transactions/export/pdf', [TransactionController::class, 'exportPdf'])
        ->name('owner.transactions.exportPdf');

    Route::get('/owner/export/products/pdf', [ReportExportController::class, 'products'])
        ->name('owner.products.exportPdf');

    Route::get('/owner/export/stock/pdf', [ReportExportController::class, 'stock'])
        ->name('owner.stock.exportPdf');

    Route::get('/owner/export/branches/pdf', [ReportExportController::class, 'branches'])
        ->name('owner.branches.exportPdf');

    Route::get('/owner/export/users/kasir/pdf', [ReportExportController::class, 'kasir'])
        ->name('owner.users.kasir.exportPdf');

    Route::get('/owner/export/users/manajer/pdf', [ReportExportController::class, 'manajer'])
        ->name('owner.users.manajer.exportPdf');

    Route::get('/owner/export/users/supervisor/pdf', [ReportExportController::class, 'supervisor'])
        ->name('owner.users.supervisor.exportPdf');

    /*
    |--------------------------------------------------------------------------
    | Owner - Lihat Transaksi Semua Cabang
    |--------------------------------------------------------------------------
    */

    Route::get('/owner/transactions', [TransactionController::class, 'index'])
        ->name('owner.transactions.index');

    /*
    |--------------------------------------------------------------------------
    | Owner - View Only Produk dan Stok
    |--------------------------------------------------------------------------
    */

    Route::get('/owner/products/product', [ProductController::class, 'indexview'])
        ->name('owner.products.product');

    Route::get('/owner/stock/stocklist', [StockMovementController::class, 'indexview'])
        ->name('owner.stock.stocklist');

    /*
    |--------------------------------------------------------------------------
    | Owner - Manajemen Data Kasir
    |--------------------------------------------------------------------------
    */

    Route::get('/owner/kasir', [KasirController::class, 'index'])
        ->name('kasir.index');

    Route::get('/owner/kasir/create', [KasirController::class, 'create'])
        ->name('kasir.create');

    Route::post('/owner/kasir', [KasirController::class, 'store'])
        ->name('kasir.store');

    Route::get('/owner/kasir/{id}/edit', [KasirController::class, 'edit'])
        ->name('kasir.edit');

    Route::put('/owner/kasir/{id}', [KasirController::class, 'update'])
        ->name('kasir.update');

    Route::delete('/owner/kasir/{id}', [KasirController::class, 'destroy'])
        ->name('kasir.destroy');

    /*
    |--------------------------------------------------------------------------
    | Owner - Manajemen Data Manajer
    |--------------------------------------------------------------------------
    */

    Route::get('/owner/manajer', [ManagerController::class, 'index'])
        ->name('manajer.index');

    Route::get('/owner/manajer/create', [ManagerController::class, 'create'])
        ->name('manajer.create');

    Route::post('/owner/manajer', [ManagerController::class, 'store'])
        ->name('manajer.store');

    Route::get('/owner/manajer/{id}/edit', [ManagerController::class, 'edit'])
        ->name('manajer.edit');

    Route::put('/owner/manajer/{id}', [ManagerController::class, 'update'])
        ->name('manajer.update');

    Route::delete('/owner/manajer/{id}', [ManagerController::class, 'destroy'])
        ->name('manajer.destroy');

    /*
    |--------------------------------------------------------------------------
    | Owner - Manajemen Data Supervisor
    |--------------------------------------------------------------------------
    */

    Route::get('/owner/supervisor', [SupervisorController::class, 'index'])
        ->name('supervisor.index');

    Route::get('/owner/supervisor/create', [SupervisorController::class, 'create'])
        ->name('supervisor.create');

    Route::post('/owner/supervisor', [SupervisorController::class, 'store'])
        ->name('supervisor.store');

    Route::get('/owner/supervisor/{id}/edit', [SupervisorController::class, 'edit'])
        ->name('supervisor.edit');

    Route::put('/owner/supervisor/{id}', [SupervisorController::class, 'update'])
        ->name('supervisor.update');

    Route::delete('/owner/supervisor/{id}', [SupervisorController::class, 'destroy'])
        ->name('supervisor.destroy');
});

/*
|--------------------------------------------------------------------------
| Role: Kasir
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:kasir'])->group(function () {

    Route::get('/kasir/dashboard', [KasirController::class, 'dashboard'])
        ->name('kasir.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Kasir - Transaksi
    |--------------------------------------------------------------------------
    */

    Route::get('/kasir/transaksi', [KasirController::class, 'indexTransaksi'])
        ->name('kasir.transaksi.index');

    Route::get('/kasir/transaksi/create', [KasirController::class, 'createTransaksi'])
        ->name('kasir.transaksi.create');

    Route::post('/kasir/transaksi', [KasirController::class, 'storeTransaksi'])
        ->name('kasir.transaksi.store');
});

/*
|--------------------------------------------------------------------------
| Role: Manajer
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:manajer,supervisor'])->group(function () {

    // Route::get('/manajer/dashboard', function () {
    //     return view('manajer.dashboard');
    // })->name('manajer.dashboard');
    Route::get('/manajer/dashboard', [ManagerDashboardController::class, 'index'])
        ->name('manajer.dashboard');

    Route::get('/manajer/produk-cabang/export/pdf', [ReportExportController::class, 'managerBranchProducts'])
        ->name('manajer.products.exportPdf');

    Route::get('/transaksi-cabang/export/pdf', [ReportExportController::class, 'branchTransactions'])
        ->name('branch.transactions.exportPdf');

    /*
    |--------------------------------------------------------------------------
    | Manajer - View Only Produk dan Stok
    |--------------------------------------------------------------------------
    */

    Route::get('/manajer/products/product', [ProductController::class, 'indexview'])
        ->name('manajer.products.product');

    Route::get('/manajer/stock/stocklist', [StockMovementController::class, 'indexview'])
        ->name('manajer.stock.stocklist');

    Route::get('/manajer/produk-cabang', [ProductController::class, 'managerBranchProducts'])
        ->name('manajer.produk-cabang.index');

    /*
    |--------------------------------------------------------------------------
    | Manajer - Lihat Transaksi Cabang
    |--------------------------------------------------------------------------
    */

    Route::get('/manajer/transaksi', [KasirController::class, 'indexTransaksi'])
        ->name('manajer.transaksi.index');
});

/*
|--------------------------------------------------------------------------
| Role: Gudang, Manajer, Owner
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:gudang,manajer,owner'])->group(function () {

    Route::get('/gudang/dashboard', [GudangDashboardController::class, 'index'])
        ->name('gudang.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Manajemen Produk
    |--------------------------------------------------------------------------
    */

    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products/store', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    /*
    |--------------------------------------------------------------------------
    | Manajemen Pergerakan Stok
    |--------------------------------------------------------------------------
    */

    Route::get('/stock-movements', [StockMovementController::class, 'index'])
        ->name('stock.index');

    Route::get('/stock-movements/create', [StockMovementController::class, 'create'])
        ->name('stock.create');

    Route::post('/stock-movements/store', [StockMovementController::class, 'store'])
        ->name('stock.store');

    /*
    |--------------------------------------------------------------------------
    | Manajemen Cabang
    |--------------------------------------------------------------------------
    */

    Route::resource('branches', BranchController::class);
});

/*
|--------------------------------------------------------------------------
| Role: Supervisor
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:supervisor'])->group(function () {

    Route::get('/supervisor/dashboard', [SupervisorDashboardController::class, 'index'])
        ->name('supervisor.dashboard');

    Route::get('/supervisor/transaksi-cabang/export/pdf', [ReportExportController::class, 'supervisorBranchTransactions'])
        ->name('supervisor.transactions.exportPdf');
    /*
    |--------------------------------------------------------------------------
    | Supervisor - Lihat Transaksi
    |--------------------------------------------------------------------------
    */

    Route::get('/supervisor/transaksi', [KasirController::class, 'indexTransaksi'])
        ->name('supervisor.transaksi.index');
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
