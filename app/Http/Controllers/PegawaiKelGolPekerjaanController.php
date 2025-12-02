<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiKelGolPekerjaan;

class PegawaiKelGolPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKelGolPekerjaan = PegawaiKelGolPekerjaan::all();
        return response()->json($dataKelGolPekerjaan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kd_kelompok_gol_pekerjaan' => 'required|unique:pegawai_kel_gol_pekerjaan,kd_kelompok_gol_pekerjaan|max:255',
            'nm_kelompok_gol_pekerjaan' => 'required',
        ]);

        PegawaiKelGolPekerjaan::create([
            'kd_kelompok_gol_pekerjaan' => $validate['kd_kelompok_gol_pekerjaan'],
            'nm_kelompok_gol_pekerjaan' => $validate['nm_kelompok_gol_pekerjaan']
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_kelompok_gol_pekerjaan = $request->kd_kelompok_gol_pekerjaan;
        $KelGolPekerjaan = PegawaiKelGolPekerjaan::find($kd_kelompok_gol_pekerjaan);
        if (!$KelGolPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        return response()->json($KelGolPekerjaan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_kelompok_gol_pekerjaan = $request->kd_kelompok_gol_pekerjaan;
        $KelGolPekerjaan = PegawaiKelGolPekerjaan::find($kd_kelompok_gol_pekerjaan);
        $validate = $request->validate([
            'nm_kelompok_gol_pekerjaan' => 'required',
        ]);

        if (!$KelGolPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        $KelGolPekerjaan->update([
            'nm_kelompok_gol_pekerjaan' => $validate['nm_kelompok_gol_pekerjaan']
        ]);
        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_kelompok_gol_pekerjaan = $request->kd_kelompok_gol_pekerjaan;
        $KelGolPekerjaan = PegawaiKelGolPekerjaan::find($kd_kelompok_gol_pekerjaan);
        if (!$KelGolPekerjaan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $KelGolPekerjaan->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
