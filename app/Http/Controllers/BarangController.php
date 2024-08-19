<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Service\CodeGenerator;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    protected $codeGenerator;

    public function __construct(CodeGenerator $codeGenerator)
    {
        $this->codeGenerator = $codeGenerator;
    }
    public function store(Request $request)
    {
        $request->validate([
            'namaBarang' => 'required',
            'kategory' => 'required',
            'harga' => 'required|numeric',
        ]);
        $kodeUnik = $this->codeGenerator->generate();
        $barang = new Barang([
            'kode' => $kodeUnik,
            'namaBarang' => $request->get('namaBarang'),
            'kategory' => $request->get('kategory'),
            'harga' => $request->get('harga'),
        ]);

        $barang->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Barang berhasil ditambahkan!',
            'data' => $barang
        ], 201);
    }

    public function show($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            return response()->json([
                'status' => 'success',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }
    }
    public function index()
    {
        $barang = Barang::all();

        if ($barang) {
            return response()->json([
                'status' => 'success',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaBarang' => 'required',
            'kategory' => 'required',
            'harga' => 'required|numeric',
        ]);

        $barang = Barang::find($id);

        if ($barang) {
            $barang->update([
                'namaBarang' => $request->get('namaBarang'),
                'kategory' => $request->get('kategory'),
                'harga' => $request->get('harga'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Barang berhasil diperbarui!',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            $barang->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Barang berhasil dihapus!'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Barang tidak ditemukan.'
            ], 404);
        }
    }
}
