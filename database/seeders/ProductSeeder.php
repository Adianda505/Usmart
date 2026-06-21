<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Categories;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $elektronik = Categories::where('nama_kategori', 'Elektronik')->first();
        $mandi = Categories::where('nama_kategori', 'Kebutuhan Mandi')->first();
        $kesehatan = Categories::where('nama_kategori', 'Kesehatan')->first();
        $makanan = Categories::where('nama_kategori', 'Makanan')->first();
        $minuman = Categories::where('nama_kategori', 'Minuman')->first();
        $rumah = Categories::where('nama_kategori', 'Peralatan Rumah')->first();
        $sembako = Categories::where('nama_kategori', 'Sembako')->first();
        $snack = Categories::where('nama_kategori', 'Snack')->first();

        Product::insert([
            // Elektronik
            [
                'category_id' => $elektronik->id,
                'nama_barang' => 'Lampu LED Philips 12W',
                'harga' => 35000,
                'stok' => 30,
            ],
            [
                'category_id' => $elektronik->id,
                'nama_barang' => 'Kabel Charger Type C',
                'harga' => 25000,
                'stok' => 45,
            ],
            [
                'category_id' => $elektronik->id,
                'nama_barang' => 'Stop Kontak 4 Lubang',
                'harga' => 45000,
                'stok' => 25,
            ],
            [
                'category_id' => $elektronik->id,
                'nama_barang' => 'Baterai ABC AA',
                'harga' => 12000,
                'stok' => 60,
            ],
            [
                'category_id' => $elektronik->id,
                'nama_barang' => 'Headset Kabel',
                'harga' => 30000,
                'stok' => 35,
            ],

            // Kebutuhan Mandi
            [
                'category_id' => $mandi->id,
                'nama_barang' => 'Sabun Lifebuoy',
                'harga' => 7000,
                'stok' => 80,
            ],
            [
                'category_id' => $mandi->id,
                'nama_barang' => 'Sabun Dettol',
                'harga' => 9000,
                'stok' => 65,
            ],
            [
                'category_id' => $mandi->id,
                'nama_barang' => 'Shampoo Sunsilk',
                'harga' => 18000,
                'stok' => 45,
            ],
            [
                'category_id' => $mandi->id,
                'nama_barang' => 'Pasta Gigi Pepsodent',
                'harga' => 14000,
                'stok' => 55,
            ],
            [
                'category_id' => $mandi->id,
                'nama_barang' => 'Sikat Gigi Formula',
                'harga' => 8000,
                'stok' => 50,
            ],
            [
                'category_id' => $mandi->id,
                'nama_barang' => 'Conditioner Pantene',
                'harga' => 22000,
                'stok' => 35,
            ],

            // Kesehatan
            [
                'category_id' => $kesehatan->id,
                'nama_barang' => 'Masker Medis 1 Box',
                'harga' => 25000,
                'stok' => 40,
            ],
            [
                'category_id' => $kesehatan->id,
                'nama_barang' => 'Hand Sanitizer 100ml',
                'harga' => 15000,
                'stok' => 55,
            ],
            [
                'category_id' => $kesehatan->id,
                'nama_barang' => 'Minyak Kayu Putih',
                'harga' => 18000,
                'stok' => 45,
            ],
            [
                'category_id' => $kesehatan->id,
                'nama_barang' => 'Tolak Angin Cair',
                'harga' => 5000,
                'stok' => 90,
            ],
            [
                'category_id' => $kesehatan->id,
                'nama_barang' => 'Hansaplast',
                'harga' => 8000,
                'stok' => 70,
            ],
            [
                'category_id' => $kesehatan->id,
                'nama_barang' => 'Betadine 15ml',
                'harga' => 18000,
                'stok' => 30,
            ],

            // Makanan
            [
                'category_id' => $makanan->id,
                'nama_barang' => 'Indomie Goreng',
                'harga' => 3500,
                'stok' => 120,
            ],
            [
                'category_id' => $makanan->id,
                'nama_barang' => 'Indomie Soto',
                'harga' => 3500,
                'stok' => 100,
            ],
            [
                'category_id' => $makanan->id,
                'nama_barang' => 'Mie Sedaap Goreng',
                'harga' => 3500,
                'stok' => 95,
            ],
            [
                'category_id' => $makanan->id,
                'nama_barang' => 'Pop Mie Ayam',
                'harga' => 6000,
                'stok' => 70,
            ],
            [
                'category_id' => $makanan->id,
                'nama_barang' => 'Sarden ABC',
                'harga' => 12000,
                'stok' => 50,
            ],
            [
                'category_id' => $makanan->id,
                'nama_barang' => 'Kornet Pronas',
                'harga' => 18000,
                'stok' => 35,
            ],

            // Minuman
            [
                'category_id' => $minuman->id,
                'nama_barang' => 'Aqua 600ml',
                'harga' => 4000,
                'stok' => 150,
            ],
            [
                'category_id' => $minuman->id,
                'nama_barang' => 'Le Minerale 600ml',
                'harga' => 4000,
                'stok' => 130,
            ],
            [
                'category_id' => $minuman->id,
                'nama_barang' => 'Teh Botol Sosro',
                'harga' => 5000,
                'stok' => 100,
            ],
            [
                'category_id' => $minuman->id,
                'nama_barang' => 'Teh Pucuk Harum',
                'harga' => 5000,
                'stok' => 110,
            ],
            [
                'category_id' => $minuman->id,
                'nama_barang' => 'Pocari Sweat',
                'harga' => 9000,
                'stok' => 80,
            ],
            [
                'category_id' => $minuman->id,
                'nama_barang' => 'Ultra Milk Coklat',
                'harga' => 7000,
                'stok' => 90,
            ],

            // Peralatan Rumah
            [
                'category_id' => $rumah->id,
                'nama_barang' => 'Sapu Lantai',
                'harga' => 18000,
                'stok' => 35,
            ],
            [
                'category_id' => $rumah->id,
                'nama_barang' => 'Pel Lantai',
                'harga' => 25000,
                'stok' => 30,
            ],
            [
                'category_id' => $rumah->id,
                'nama_barang' => 'Ember Plastik',
                'harga' => 20000,
                'stok' => 40,
            ],
            [
                'category_id' => $rumah->id,
                'nama_barang' => 'Gayung Plastik',
                'harga' => 8000,
                'stok' => 60,
            ],
            [
                'category_id' => $rumah->id,
                'nama_barang' => 'Tempat Sampah Mini',
                'harga' => 30000,
                'stok' => 25,
            ],
            [
                'category_id' => $rumah->id,
                'nama_barang' => 'Lap Kanebo',
                'harga' => 12000,
                'stok' => 45,
            ],

            // Sembako
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Beras Ramos 5kg',
                'harga' => 75000,
                'stok' => 30,
            ],
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Minyak Goreng 1L',
                'harga' => 18000,
                'stok' => 80,
            ],
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Minyak Goreng 2L',
                'harga' => 35000,
                'stok' => 65,
            ],
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Gula Pasir 1kg',
                'harga' => 17000,
                'stok' => 70,
            ],
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Tepung Terigu 1kg',
                'harga' => 13000,
                'stok' => 55,
            ],
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Garam Dapur',
                'harga' => 5000,
                'stok' => 90,
            ],
            [
                'category_id' => $sembako->id,
                'nama_barang' => 'Telur Ayam 1kg',
                'harga' => 30000,
                'stok' => 45,
            ],

            // Snack
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Chitato Sapi Panggang',
                'harga' => 11000,
                'stok' => 60,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Qtela Singkong',
                'harga' => 10000,
                'stok' => 55,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Roma Kelapa',
                'harga' => 12000,
                'stok' => 65,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Oreo Original',
                'harga' => 9000,
                'stok' => 70,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Tango Wafer',
                'harga' => 8000,
                'stok' => 75,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'SilverQueen Mini',
                'harga' => 15000,
                'stok' => 40,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Beng-Beng',
                'harga' => 3000,
                'stok' => 100,
            ],
            [
                'category_id' => $snack->id,
                'nama_barang' => 'Taro Net',
                'harga' => 7000,
                'stok' => 80,
            ],
        ]);
    }
}