<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang1 = Barang::findOrFail(1);
        $barang2 = Barang::findOrFail(2);
        $barang3 = Barang::findOrFail(3);
        $barang4 = Barang::findOrFail(4);

        //20 diambil dari jumlah jadi harus sama
        $totalHarga1 = $barang1->harga * 20;
        $totalHarga2 = $barang2->harga * 20;
        $totalHarga3 = $barang3->harga * 20;
        $totalHarga4 = $barang4->harga * 20;

        $barang1->stok -= 20;
        $barang1->save();

        $barang2->stok -= 20;
        $barang2->save();

        $barang3->stok -= 20;
        $barang3->save();

        $barang4->stok -= 20;
        $barang4->save();

        DB::table('mutasis')->insert([
            [
                'tanggal' => '2024-06-26',
                'jenisMutasi'=> 'Mutasi Masuk',
                'jumlah' => 20,
                'totalHarga' =>$totalHarga1,
                'userId' => 1,
                'barangId' => 1,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
            [
                'tanggal' => '2024-06-26',
                'jenisMutasi'=> 'Mutasi Masuk',
                'jumlah' => 20,
                'totalHarga' =>$totalHarga2,
                'userId' => 1,
                'barangId' => 2,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
            [
                'tanggal' => '2024-06-26',
                'jenisMutasi'=> 'Mutasi Masuk',
                'jumlah' => 20,
                'totalHarga' =>$totalHarga3,
                'userId' => 1,
                'barangId' => 3,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
            [
                'tanggal' => '2024-06-26',
                'jenisMutasi'=> 'Mutasi Masuk',
                'jumlah' => 20,
                'totalHarga' =>$totalHarga4,
                'userId' => 1,
                'barangId' => 4,
                'created_at' => '2024-01-17 09:49:36',
                'updated_at' => '2024-01-17 09:49:36',
            ],
        ]);
    }
}
