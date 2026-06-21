<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupervisorDashboardController extends Controller
{
    public function index()
    {
        $supervisor = Auth::user();
        $branchId = $supervisor->branch_id;

        $today = now()->toDateString();

        // Total transaksi hari ini
        $totalTransaksiHariIni = Transactions::where('branch_id', $branchId)
            ->whereDate('tanggal', $today)
            ->count();

        // Total pendapatan hari ini
        $pendapatanHariIni = Transactions::where('branch_id', $branchId)
            ->whereDate('tanggal', $today)
            ->sum('total');

        // Total transaksi bulan ini
        $totalTransaksiBulanIni = Transactions::where('branch_id', $branchId)
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        // Total pendapatan bulan ini
        $pendapatanBulanIni = Transactions::where('branch_id', $branchId)
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('total');

        // Transaksi terbaru
        $transaksiTerbaru = Transactions::with(['user', 'branch'])
            ->where('branch_id', $branchId)
            ->latest()
            ->take(5)
            ->get();

        // Ringkasan metode pembayaran
        $metodePembayaran = Transactions::where('branch_id', $branchId)
            ->select('payment_method', DB::raw('COUNT(*) as total_transaksi'), DB::raw('SUM(total) as total_pendapatan'))
            ->groupBy('payment_method')
            ->get();

        // Grafik sederhana transaksi 7 hari terakhir
        $transaksiPerHari = Transactions::where('branch_id', $branchId)
            ->whereDate('tanggal', '>=', now()->subDays(6)->toDateString())
            ->select(
                DB::raw('DATE(tanggal) as tanggal'),
                DB::raw('COUNT(*) as total_transaksi'),
                DB::raw('SUM(total) as total_pendapatan')
            )
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('supervisor.dashboard', compact(
            'supervisor',
            'totalTransaksiHariIni',
            'pendapatanHariIni',
            'totalTransaksiBulanIni',
            'pendapatanBulanIni',
            'transaksiTerbaru',
            'metodePembayaran',
            'transaksiPerHari'
        ));
    }
}