<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchProductStock;
use App\Models\User;
use App\Models\Transactions;
use App\Models\Transactions_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KasirController extends Controller
{
    /**
     * Tampilkan daftar kasir
     * Untuk owner
     */

    public function dashboard()
{
    $kasir = Auth::user();

    $branchId = $kasir->branch_id;

    $today = Carbon::today();

    // Total transaksi hari ini
    $totalTransaksiHariIni = Transactions::where('branch_id', $branchId)
        ->whereDate('tanggal', $today)
        ->count();

    // Total pendapatan hari ini
    $pendapatanHariIni = Transactions::where('branch_id', $branchId)
        ->whereDate('tanggal', $today)
        ->sum('total');

    // Total semua transaksi cabang kasir
    $totalSemuaTransaksi = Transactions::where('branch_id', $branchId)
        ->count();

    // Total pendapatan semua transaksi cabang kasir
    $totalPendapatan = Transactions::where('branch_id', $branchId)
        ->sum('total');

    // Ringkasan metode pembayaran
    $metodePembayaran = Transactions::selectRaw('payment_method, COUNT(*) as total_transaksi, SUM(total) as total_pendapatan')
        ->where('branch_id', $branchId)
        ->groupBy('payment_method')
        ->get();

    // Transaksi terbaru
    $transactions = Transactions::with(['branch', 'user'])
        ->where('branch_id', $branchId)
        ->latest()
        ->take(10)
        ->get();

    return view('kasir.dashboard', compact(
        'kasir',
        'totalTransaksiHariIni',
        'pendapatanHariIni',
        'totalSemuaTransaksi',
        'totalPendapatan',
        'metodePembayaran',
        'transactions'
    ));
}

    public function index()
    {
        $kasirs = User::with('branch')
            ->where('role', 'kasir')
            ->latest()
            ->get();

        return view('kasir.index', compact('kasirs'));
    }

    /**
     * Form tambah kasir
     * Untuk owner
     */
    public function create()
    {
        $branches = Branch::all();

        return view('kasir.create', compact('branches'));
    }

    /**
     * Simpan kasir baru
     * Untuk owner
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'branch_id' => 'required|exists:branches,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'kasir',
            'branch_id' => $request->branch_id,
        ]);

        return redirect()
            ->route('kasir.index')
            ->with('success', 'Kasir berhasil ditambahkan');
    }

    /**
     * Form edit kasir
     * Untuk owner
     */
    public function edit(string $id)
    {
        $kasir = User::findOrFail($id);
        $branches = Branch::all();

        return view('kasir.edit', compact('kasir', 'branches'));
    }

    /**
     * Update data kasir
     * Untuk owner
     */
    public function update(Request $request, string $id)
    {
        $kasir = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $kasir->id,
            'branch_id' => 'required|exists:branches,id',
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'branch_id' => $request->branch_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $kasir->update($data);

        return redirect()
            ->route('kasir.index')
            ->with('success', 'Kasir berhasil diupdate');
    }

    /**
     * Hapus kasir
     * Untuk owner
     */
    public function destroy(string $id)
    {
        $kasir = User::findOrFail($id);

        $kasir->delete();

        return redirect()
            ->route('kasir.index')
            ->with('success', 'Kasir berhasil dihapus');
    }

    /**
     * Tampilkan data transaksi
     * Untuk kasir
     */
    public function indexTransaksi()
    {
        $branchId = Auth::user()->branch_id;

        $transactions = Transactions::with(['user', 'branch', 'details.product'])
            ->where('branch_id', $branchId)
            ->latest()
            ->get();

        return view('kasir.transaksi.index', compact('transactions'));
    }

    /**
     * Form tambah transaksi
     * Untuk kasir
     */
    public function createTransaksi()
    {
        $branchId = Auth::user()->branch_id;

        $products = BranchProductStock::with('product')
            ->where('branch_id', $branchId)
            ->where('stok', '>', 0)
            ->get();

        return view('kasir.create_transaksi', compact('products'));
    }

    /**
     * Simpan transaksi
     * Untuk kasir
     */
  public function storeTransaksi(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
        'payment_method' => 'required|in:cash,qris,e_wallet,transfer',
        'cash_received' => 'nullable|numeric|min:0',
    ]);

    DB::beginTransaction();

    try {
        $branchId = Auth::user()->branch_id;

        $product = Product::findOrFail($request->product_id);

        $branchStock = BranchProductStock::where('branch_id', $branchId)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$branchStock || $branchStock->stok < $request->qty) {
            return back()->with('error', 'Stok produk tidak mencukupi.');
        }

        $total = $product->harga * $request->qty;

        $cashReceived = null;
        $changeAmount = null;

        if ($request->payment_method === 'cash') {
            if ($request->cash_received === null) {
                return back()->with('error', 'Uang tunai wajib diisi untuk pembayaran cash.');
            }

            if ($request->cash_received < $total) {
                return back()->with('error', 'Uang tunai kurang dari total pembayaran.');
            }

            $cashReceived = $request->cash_received;
            $changeAmount = $cashReceived - $total;
        }

        $transaction = Transactions::create([
            'kode_transaksi' => 'TRX-' . time(),
            'user_id' => Auth::id(),
            'branch_id' => $branchId,
            'total' => $total,
            'payment_method' => $request->payment_method,
            'cash_received' => $cashReceived,
            'change_amount' => $changeAmount,
            'tanggal' => now(),
        ]);

        Transactions_detail::create([
            'transaction_id' => $transaction->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'harga' => $product->harga,
            'subtotal' => $total,
        ]);

        $branchStock->decrement('stok', $request->qty);

        DB::commit();

        return redirect()
            ->route('kasir.transaksi.index')
            ->with('success', 'Transaksi berhasil disimpan.');

    } catch (\Exception $e) {
        DB::rollBack();

        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
}