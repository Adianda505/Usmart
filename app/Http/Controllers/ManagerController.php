<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = User::with('branch')
            ->where('role', 'manajer')
            ->get();

        return view('manajer.index', compact('managers'));
    }

    public function create()
    {
        $branches = Branch::all();

        return view('manajer.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'branch_id' => 'required|exists:branches,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'manajer',
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('manajer.index')
            ->with('success', 'Akun manajer berhasil dibuat.');
    }

    public function edit($id)
    {
        $manager = User::where('role', 'manajer')
            ->findOrFail($id);

        $branches = Branch::all();

        return view('manajer.edit', compact('manager', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $manager = User::where('role', 'manajer')
            ->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $manager->id,
            'password' => 'nullable|min:6',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $manager->name = $request->name;
        $manager->email = $request->email;
        $manager->branch_id = $request->branch_id;
        $manager->role = 'manajer';

        if ($request->password) {
            $manager->password = Hash::make($request->password);
        }

        $manager->save();

        return redirect()->route('manajer.index')
            ->with('success', 'Data manajer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $manager = User::where('role', 'manajer')
            ->findOrFail($id);

        $manager->delete();

        return redirect()->route('manajer.index')
            ->with('success', 'Data manajer berhasil dihapus.');
    }
}