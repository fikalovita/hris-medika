<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\PegawaiJnsPekerjaan;
use Illuminate\Http\Request;

class PegawaiJnsPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJnsPekerjaan = PegawaiJnsPekerjaan::all();
        return response()->json($dataJnsPekerjaan);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kd_jns_pekerjaan' => 'required|unique:pegawai_jns_pekerjaan,kd_jns_pekerjaan|max:255',
            'nm_jns_pekerjaan' => 'required',
        ]);

        PegawaiJnsPekerjaan::create([
            'kd_jns_pekerjaan' => $validate['kd_jns_pekerjaan'],
            'nm_jns_pekerjaan' => $validate['nm_jns_pekerjaan']
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_jns_pekerjaan = $request->kd_jns_pekerjaan;
        $pegawaiJnsPekerjaan = PegawaiJnsPekerjaan::find($kd_jns_pekerjaan);
        if (!$pegawaiJnsPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        return response()->json($pegawaiJnsPekerjaan, 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_jns_pekerjaan = $request->kd_jns_pekerjaan;
        $pegawaiJnsPekerjaan = PegawaiJnsPekerjaan::find($kd_jns_pekerjaan);
        $validate = $request->validate([
            'nm_jns_pekerjaan' => 'required',
        ]);

        if (!$PegawaiJnsPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        $pegawaiJnsPekerjaan->update([
            'nm_jns_pekerjaan' => $validate['nm_jns_pekerjaan']
        ]);
        return response()->json(['message' => 'data berhasil diubah']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_jns_pekerjaan = $request->kd_jns_pekerjaan;
        $PegawaiJnsPekerjaan = PegawaiJnsPekerjaan::find($kd_jns_pekerjaan);
        if (!$PegawaiJnsPekerjaan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $pegawaiJnsPekerjaan->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
