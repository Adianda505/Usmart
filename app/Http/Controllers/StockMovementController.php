<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchProductStock;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with([
            'product',
            'branch',
        ])->latest()->get();

        return view('stock.index', compact('movements'));
    }

    public function indexview()
    {
        $movements = StockMovement::with([
            'product',
            'branch',
        ])->latest()->get();

        return view('stock.stocklist', compact('movements'));
    }

    public function create()
    {
        $products = Product::all();
        $branches = Branch::all();

        return view('stock.create', compact(
            'products',
            'branches'
        ));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'branch_id' => 'required|exists:branches,id',
    //         'type' => 'required|in:masuk,keluar',
    //         'qty' => 'required|integer|min:1',
    //         'tanggal' => 'required',
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         $product = Product::findOrFail($request->product_id);

    //         /*
    //          * KONSEP:
    //          * masuk  = barang dikirim dari gudang ke cabang
    //          * keluar = barang dikembalikan dari cabang ke gudang
    //          */

    //         if ($request->type == 'masuk') {

    //             // validasi stok gudang
    //             if ($product->stok < $request->qty) {
    //                 return back()->with('error', 'Stok gudang tidak cukup');
    //             }

    //             // kurangi stok gudang
    //             $product->stok -= $request->qty;
    //             $product->save();

    //             // tambah stok cabang
    //             $branchStock = BranchProductStock::firstOrCreate(
    //                 [
    //                     'branch_id' => $request->branch_id,
    //                     'product_id' => $request->product_id,
    //                 ],
    //                 [
    //                     'stok' => 0,
    //                 ]
    //             );

    //             $branchStock->stok += $request->qty;
    //             $branchStock->save();
    //         }

    //         if ($request->type == 'keluar') {

    //             // ambil stok produk di cabang
    //             $branchStock = BranchProductStock::where('branch_id', $request->branch_id)
    //                 ->where('product_id', $request->product_id)
    //                 ->first();

    //             if (!$branchStock || $branchStock->stok < $request->qty) {
    //                 return back()->with('error', 'Stok produk di cabang tidak cukup');
    //             }

    //             // kurangi stok cabang
    //             $branchStock->stok -= $request->qty;
    //             $branchStock->save();

    //             // tambah stok gudang
    //             $product->stok += $request->qty;
    //             $product->save();
    //         }

    //         // simpan log stock movement
    //         StockMovement::create([
    //             'product_id' => $request->product_id,
    //             'branch_id' => $request->branch_id,
    //             'type' => $request->type,
    //             'qty' => $request->qty,
    //             'tanggal' => str_replace('T', ' ', $request->tanggal),
    //             'keterangan' => $request->keterangan,
    //         ]);

    //         DB::commit();

    //         return redirect()
    //             ->route('stock.index')
    //             ->with('success', 'Stock movement berhasil');

    //     } catch (\Exception $e) {

    //         DB::rollBack();

    //         return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'branch_id' => 'required|exists:branches,id',
            'type' => 'required|in:masuk,keluar',
            'qty' => 'required|integer|min:1',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $product = Product::findOrFail($request->product_id);

            if ($request->type == 'masuk') {

                if ($product->stok < $request->qty) {
                    throw new \Exception('Stok gudang tidak cukup');
                }

                $product->stok -= $request->qty;
                $product->save();

                $branchStock = BranchProductStock::firstOrCreate(
                    [
                        'branch_id' => $request->branch_id,
                        'product_id' => $request->product_id,
                    ],
                    [
                        'stok' => 0,
                    ]
                );

                $branchStock->stok += $request->qty;
                $branchStock->save();
            }

            if ($request->type == 'keluar') {

                $branchStock = BranchProductStock::where('branch_id', $request->branch_id)
                    ->where('product_id', $request->product_id)
                    ->first();

                if (! $branchStock || $branchStock->stok < $request->qty) {
                    throw new \Exception('Stok produk di cabang tidak cukup');
                }

                $branchStock->stok -= $request->qty;
                $branchStock->save();

                $product->stok += $request->qty;
                $product->save();
            }

            StockMovement::create([
                'product_id' => $request->product_id,
                'branch_id' => $request->branch_id,
                'type' => $request->type,
                'qty' => $request->qty,
                'tanggal' => str_replace('T', ' ', $request->tanggal),
                'keterangan' => $request->keterangan,
            ]);

            DB::commit();

            return redirect()
                ->route('stock.index')
                ->with('success', 'Stock movement berhasil disimpan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}
