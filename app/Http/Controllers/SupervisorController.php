<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupervisorController extends Controller
{
    public function index()
    {
        $supervisors = User::with('branch')
            ->where('role', 'supervisor')
            ->get();

        return view('supervisor.index', compact('supervisors'));
    }

    public function create()
    {
        $branches = Branch::all();

        return view('supervisor.create', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'branch_id' => 'required|exists:branches,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'supervisor',
            'branch_id' => $request->branch_id,
        ]);

        return redirect()
            ->route('supervisor.index')
            ->with('success', 'Akun supervisor berhasil dibuat.');
    }

    public function edit($id)
    {
        $supervisor = User::where('role', 'supervisor')
            ->findOrFail($id);

        $branches = Branch::all();

        return view('supervisor.edit', compact('supervisor', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $supervisor = User::where('role', 'supervisor')
            ->findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$supervisor->id,
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

        $supervisor->update($data);

        return redirect()
            ->route('supervisor.index')
            ->with('success', 'Data supervisor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $supervisor = User::where('role', 'supervisor')
            ->findOrFail($id);

        $supervisor->delete();

        return redirect()
            ->route('supervisor.index')
            ->with('success', 'Data supervisor berhasil dihapus.');
    }
}
