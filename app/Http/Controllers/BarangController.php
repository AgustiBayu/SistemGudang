<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Service\CodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    protected $codeGenerator;

    public function __construct(CodeGenerator $codeGenerator)
    {
        $this->codeGenerator = $codeGenerator;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaBarang' => 'required|unique:barangs',
            'kategory' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '0',
                'message' => 'failed',
                'data' => $validator->errors()
            ], 422);
        }

        $kodeUnik = $this->codeGenerator->generate();
        $barang = new Barang([
            'kode' => $kodeUnik,
            'namaBarang' => $request->get('namaBarang'),
            'kategory' => $request->get('kategory'),
            'harga' => $request->get('harga'),
            'stok' => $request->get('stok'),
        ]);

        $barang->save();
        return response()->json([
            'status' => '1',
            'message' => 'success',
            'data' => $barang
        ], 201);
    }

    public function show($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'failed'
            ], 404);
        }
    }
    public function index()
    {
        $barang = Barang::all();

        if ($barang) {
            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'failed'
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'namaBarang' => 'required|unique:barangs',
            'kategory' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => '0',
                'message' => 'failed',
                'data' => $validator->errors()
            ], 422);
        }

        $barang = Barang::find($id);

        if ($barang) {
            $barang->update([
                'namaBarang' => $request->get('namaBarang'),
                'kategory' => $request->get('kategory'),
                'harga' => $request->get('harga'),
                'stok' => $request->get('stok'),
            ]);

            return response()->json([
                'status' => '1',
                'message' => 'success',
                'data' => $barang
            ], 200);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'failed'
            ], 404);
        }
    }
    public function destroy($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            $barang->delete();

            return response()->json([
                'status' => '1',
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'failed'
            ], 404);
        }
    }
}
