<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Branch;

class UserBranchSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | DATA CABANG
        |--------------------------------------------------------------------------
        */

        $branches = [
            [
                'nama_cabang' => 'Us Mart Cibadak',
                'kota' => 'Sukabumi',
                'alamat' => 'Jl. Raya Cibadak No. 12, Sukabumi',
            ],
            [
                'nama_cabang' => 'Us Mart Cibeber',
                'kota' => 'Cianjur',
                'alamat' => 'Jl. Cibeber Raya No. 21, Cianjur',
            ],
            [
                'nama_cabang' => 'Us Mart Cileunyi',
                'kota' => 'Bandung',
                'alamat' => 'Jl. Cileunyi No. 8, Bandung',
            ],
            [
                'nama_cabang' => 'Us Mart Baros',
                'kota' => 'Sukabumi',
                'alamat' => 'Jl. Baros No. 15, Sukabumi',
            ],
            [
                'nama_cabang' => 'Us Mart Cipanas',
                'kota' => 'Cianjur',
                'alamat' => 'Jl. Raya Cipanas No. 30, Cianjur',
            ],
        ];

        $createdBranches = [];

        foreach ($branches as $branch) {
            $createdBranches[] = Branch::updateOrCreate(
                ['nama_cabang' => $branch['nama_cabang']],
                $branch
            );
        }

        /*
        |--------------------------------------------------------------------------
        | OWNER
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(
            ['email' => 'owner@usmart.com'],
            [
                'name' => 'Bapak Hendra Wijaya',
                'email' => 'owner@usmart.com',
                'password' => Hash::make('password'),
                'role' => 'owner',
                'branch_id' => null,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | GUDANG
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(
            ['email' => 'gudang@usmart.com'],
            [
                'name' => 'Rizky Maulana',
                'email' => 'gudang@usmart.com',
                'password' => Hash::make('password'),
                'role' => 'gudang',
                'branch_id' => null,
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | DATA USER PER CABANG
        |--------------------------------------------------------------------------
        */

        $usersPerBranch = [
            [
                'branch_index' => 0,

                'manajer' => [
                    'name' => 'Andi Pratama',
                    'email' => 'andi.manajer@usmart.com',
                ],

                'supervisor' => [
                    'name' => 'Dedi Saputra',
                    'email' => 'dedi.supervisor@usmart.com',
                ],

                'kasir' => [
                    'name' => 'Fajar Ramadhan',
                    'email' => 'fajar.kasir@usmart.com',
                ],
            ],
            [
                'branch_index' => 1,

                'manajer' => [
                    'name' => 'Rina Amelia',
                    'email' => 'rina.manajer@usmart.com',
                ],

                'supervisor' => [
                    'name' => 'Siti Nurhaliza',
                    'email' => 'siti.supervisor@usmart.com',
                ],

                'kasir' => [
                    'name' => 'Nabila Putri',
                    'email' => 'nabila.kasir@usmart.com',
                ],
            ],
            [
                'branch_index' => 2,

                'manajer' => [
                    'name' => 'Budi Santoso',
                    'email' => 'budi.manajer@usmart.com',
                ],

                'supervisor' => [
                    'name' => 'Agus Setiawan',
                    'email' => 'agus.supervisor@usmart.com',
                ],

                'kasir' => [
                    'name' => 'Dinda Maharani',
                    'email' => 'dinda.kasir@usmart.com',
                ],
            ],
            [
                'branch_index' => 3,

                'manajer' => [
                    'name' => 'Maya Lestari',
                    'email' => 'maya.manajer@usmart.com',
                ],

                'supervisor' => [
                    'name' => 'Rahmat Hidayat',
                    'email' => 'rahmat.supervisor@usmart.com',
                ],

                'kasir' => [
                    'name' => 'Aulia Fitri',
                    'email' => 'aulia.kasir@usmart.com',
                ],
            ],
            [
                'branch_index' => 4,

                'manajer' => [
                    'name' => 'Eko Nugroho',
                    'email' => 'eko.manajer@usmart.com',
                ],

                'supervisor' => [
                    'name' => 'Lina Marlina',
                    'email' => 'lina.supervisor@usmart.com',
                ],

                'kasir' => [
                    'name' => 'Bagas Firmansyah',
                    'email' => 'bagas.kasir@usmart.com',
                ],
            ],
        ];

        foreach ($usersPerBranch as $data) {
            $branch = $createdBranches[$data['branch_index']];

            User::updateOrCreate(
                ['email' => $data['manajer']['email']],
                [
                    'name' => $data['manajer']['name'],
                    'email' => $data['manajer']['email'],
                    'password' => Hash::make('password'),
                    'role' => 'manajer',
                    'branch_id' => $branch->id,
                ]
            );

            User::updateOrCreate(
                ['email' => $data['supervisor']['email']],
                [
                    'name' => $data['supervisor']['name'],
                    'email' => $data['supervisor']['email'],
                    'password' => Hash::make('password'),
                    'role' => 'supervisor',
                    'branch_id' => $branch->id,
                ]
            );

            User::updateOrCreate(
                ['email' => $data['kasir']['email']],
                [
                    'name' => $data['kasir']['name'],
                    'email' => $data['kasir']['email'],
                    'password' => Hash::make('password'),
                    'role' => 'kasir',
                    'branch_id' => $branch->id,
                ]
            );
        }
    }
}