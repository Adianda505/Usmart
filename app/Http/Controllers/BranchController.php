<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index()
    {
    $branches = Branch::all();
    return view('branches.index', compact('branches'));
    }

    public function create()
    {
    return view('branches.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama_cabang' => 'required',
        'kota' => 'required',
    ]);

    Branch::create($request->all());

    return redirect()->route('branches.index')
        ->with('success', 'Cabang berhasil ditambahkan');
    }

    public function edit($id)
    {
    $branch = Branch::findOrFail($id);
    return view('branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
{
    $branch = Branch::findOrFail($id);

    $branch->update([
        'nama_cabang' => $request->nama_cabang,
        'kota' => $request->kota,
        'alamat' => $request->alamat,
    ]);

    return redirect()->route('branches.index')
        ->with('success', 'Cabang berhasil diupdate');
    }

    public function destroy($id)
    {
    Branch::findOrFail($id)->delete();

    return redirect()->route('branches.index')
        ->with('success', 'Cabang berhasil dihapus');
    }

}
