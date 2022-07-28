<?php

namespace App\Http\Controllers\API;
use App\Models\Pariwisata;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PariwisataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['index']]);
    }

    public function index()
    {
        //$data = Pariwisata::all();
        $data = Pariwisata::with('pengunjung', 'tujuan', 'transportasi')->get();
        return response()->json($data, 200);
    }
    // cara pertama menampilkan data
    // public function show(Pariwisata $id)
    // {
    //     return response()->json($id, 200);
    // }

    // cara kedua menampilkan detail data
    public function show($id)
    {
        $data = Pariwisata::with('pengunjung', 'tujuan', 'transportasi')->where('id', $id)->first();
    {
        //$data = Pariwisata::where('id', $id)->first();
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
}

    public function store(Request $request)
    {
        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'nama_pengunjung' => 'required|min:5',
            'kota_tujuan' => 'required',
            'perusahaan_transportasi' => 'required', 
            'harga_tiket_transportasi' => 'required',
            
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Pariwisata::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($id, 200);
        $data = Pariwisata::where('id', $id)->first();

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
            'nama_pengunjung' => 'required|min:5',
            'kota_tujuan' => 'required',
            'perusahaan_transportasi' => 'required', 
            'harga_tiket_transportasi' => 'required',
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
        $data = Pariwisata::where('id', $id)->first();
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
