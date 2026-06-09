<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchProductStock;
use App\Models\User;
use App\Models\Transactions;
use App\Models\Transactions_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    /**
     * Tampilkan daftar kasir
     * Untuk owner
     */
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
        ]);

        $branchId = Auth::user()->branch_id;

        DB::beginTransaction();

        try {
            $branchStock = BranchProductStock::with('product')
                ->where('branch_id', $branchId)
                ->where('product_id', $request->product_id)
                ->firstOrFail();

            if ($branchStock->stok < $request->qty) {
                throw new \Exception('Stok produk di cabang tidak mencukupi.');
            }

            $harga = $branchStock->product->harga;
            $subtotal = $harga * $request->qty;

            $transaction = Transactions::create([
                'kode_transaksi' => 'TRX-' . time(),
                'user_id' => Auth::id(),
                'branch_id' => $branchId,
                'total' => $subtotal,
                'tanggal' => now(),
            ]);

            Transactions_detail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $request->product_id,
                'qty' => $request->qty,
                'harga' => $harga,
                'subtotal' => $subtotal,
            ]);

            $branchStock->stok -= $request->qty;
            $branchStock->save();

            DB::commit();

            return redirect()
                ->route('kasir.transaksi.index')
                ->with('success', 'Transaksi berhasil disimpan.');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', 'Transaksi gagal: ' . $e->getMessage());
        }
    }
}