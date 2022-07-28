<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tujuan;
use Illuminate\Support\Facades\Validator;

class TujuanController extends Controller
{
    public function index()
    {
        $data = Tujuan::all();
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $data = Tujuan::where('id', $id)->first();
    if (empty($data)) {
        return response()->json([
            'pesan' => 'Data tidak ditemukan',
            'data' => $data
        ], 404);
    }

    return response()->json([
        'pesan' => 'Data ditemukan',
        'data' => $data
    ], 200);
    }
    public function store(Request $request)
    {
        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'kota_tujuan' => 'required|min:5',
            'tempat_wisata' => 'required',
            'harga_tiket_masuk' => 'required', 
            
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Tujuan::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($id, 200);
        $data = Tujuan::where('id', $id)->first();

        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'kota_tujuan' => 'required|min:5',
            'tempat_wisata' => 'required',
            'harga_tiket_masuk' => 'required', 
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }

    public function delete($id)
    {
        $data = Tujuan::where('id', $id)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
}
