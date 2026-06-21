<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StockMovement;
use App\Models\Product;
use App\Models\Branch;
use Carbon\Carbon;

class StockMovementSeeder extends Seeder
{
    public function run(): void
    {
        $branchNames = [
            'Cabang Kampung Cireundeu',
            'Cabang Kampung Naga',
            'Cabang Kampung Pulo',
            'Cabang Kampung Ciptagelar',
            'Cabang Kampung Cikondang',
            'Us Mart Cibadak',
            'Us Mart Cibeber',
            'Us Mart Cileunyi',
            'Us Mart Baros',
            'Us Mart Cipanas',
        ];

        $products = Product::all();

        $branches = Branch::whereIn('nama_cabang', $branchNames)->get();

        $types = ['masuk', 'keluar'];

        $keteranganMasuk = [
            'Stok masuk dari gudang pusat',
            'Penambahan stok produk',
            'Restock barang cabang',
            'Pengiriman barang ke cabang',
            'Barang masuk untuk persediaan',
        ];

        $keteranganKeluar = [
            'Stok keluar karena transaksi',
            'Barang terjual',
            'Pengurangan stok cabang',
            'Stok keluar untuk penjualan',
            'Barang keluar dari persediaan',
        ];

        for ($i = 1; $i <= 100; $i++) {
            $type = $types[array_rand($types)];

            StockMovement::create([
                'product_id' => $products->random()->id,
                'branch_id' => $branches->random()->id,
                'type' => $type,
                'qty' => rand(1, 30),
                'tanggal' => Carbon::now()->subDays(rand(0, 30)),
                'keterangan' => $type === 'masuk'
                    ? $keteranganMasuk[array_rand($keteranganMasuk)]
                    : $keteranganKeluar[array_rand($keteranganKeluar)],
            ]);
        }
    }
}