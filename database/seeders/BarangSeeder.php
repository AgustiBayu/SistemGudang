<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Service\CodeGenerator;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    protected $codeGenerator;

        public function __construct(CodeGenerator $codeGenerator)
        {
            $this->codeGenerator = $codeGenerator;
        }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kodeUnik = $this->codeGenerator->generate();
        DB::table('barangs')->insert([
            [
                'kode' => $kodeUnik,
                'namaBarang' => 'Ale-ale',
                'kategory' => 'Minuman',
                'harga' => 3000,
                'stok' => 100,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
            [
                'kode' => $kodeUnik,
                'namaBarang' => 'Teh Gelas',
                'kategory' => 'Minuman',
                'harga' => 1000,
                'stok' => 100,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
            [
                'kode' => $kodeUnik,
                'namaBarang' => 'Beng beng',
                'kategory' => 'Snack',
                'harga' => 3000,
                'stok' => 100,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
            [
                'kode' => $kodeUnik,
                'namaBarang' => 'Potatos',
                'kategory' => 'Scank',
                'harga' => 7000,
                'stok' => 100,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
        ]);
    }
}
