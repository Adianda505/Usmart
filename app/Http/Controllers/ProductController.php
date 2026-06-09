<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use App\Models\BranchProductStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function managerBranchProducts()
    {
        $branchId = Auth::user()->branch_id;

        $products = BranchProductStock::with(['product', 'branch'])
            ->where('branch_id', $branchId)
            ->where('stok', '>', 0)
            ->get();

        return view('manajer.products.branch_products', compact('products'));
    }

    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function indexview()
    {
        $products = Product::with('category')->get();

        return view('products.product', compact('products'));
    }

    public function create()
    {
        $categories = Categories::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        Product::create([
            'category_id' => $request->category_id,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $categories = Categories::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'nama_barang' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $product->update([
            'category_id' => $request->category_id,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}
