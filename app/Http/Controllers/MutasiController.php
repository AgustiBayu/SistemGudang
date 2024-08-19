<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Mutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MutasiController extends Controller
{
    public function mutasiMasuk(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer',
            'userId' => 'required|exists:users,id',
            'barangId' => 'required|exists:barangs,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '0',
                'message' => 'Validation failed field not null',
            ], 422);
        }

         $barang = Barang::findOrFail($request->barangId);
         $hargaBarang = $barang->harga;

         if ($request->jumlah > $barang->stok) {
             return response()->json([
                 'status' => '0',
                 'message' => 'Jumlah yang dikeluarkan melebihi stok yang tersedia.'
             ], 400);
         }
         $totalHarga = $hargaBarang * $request->jumlah;
         $barang->stok -= $request->jumlah;
         $barang->save();

        $mutasi = Mutasi::create([
            'tanggal' => $request->tanggal,
            'jenisMutasi' => 'Mutasi Masuk',
            'jumlah' => $request->jumlah,
            'totalHarga' => $totalHarga,
            'userId' => $request->userId,
            'barangId' => $request->barangId,
        ]);

        return response()->json([
            'status' => '1',
            'message' => 'Mutasi masuk berhasil ditambahkan!',
            'data' => $mutasi
        ], 201);
    }

    public function mutasi()
    {
        $mutasi = Mutasi::with('user', 'barang')->get();

        if ($mutasi) {
            return response()->json([
                'status' => '1',
                'data' => $mutasi
            ], 200);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'Mutasi tidak ditemukan.'
            ], 404);
        }
    }
    public function hapusMutasi($id)
    {
        $mutasi = Mutasi::find($id);

        if ($mutasi) {
            $mutasi->delete();

            return response()->json([
                'status' => '1',
                'message' => 'Mutasi berhasil dihapus!'
            ], 200);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'Mutasi tidak ditemukan.'
            ], 404);
        }
    }
}
