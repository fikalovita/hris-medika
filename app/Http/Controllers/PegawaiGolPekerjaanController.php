<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\PegawaiGolPekerjaan;

class PegawaiGolPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataGolPekerjaan = PegawaiGolPekerjaan::all();
        return DataTables::of($dataGolPekerjaan)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kd_gol_pekerjaan' => 'required|unique:pegawai_gol_pekerjaan,kd_gol_pekerjaan|max:255',
            'nm_gol_pekerjaan' => 'required',
        ]);

        PegawaiGolPekerjaan::create([
            'kd_gol_pekerjaan' => $validate['kd_gol_pekerjaan'],
            'nm_gol_pekerjaan' => $validate['nm_gol_pekerjaan']
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_gol_pekerjaan = $request->kd_gol_pekerjaan;
        $GolPekerjaan = PegawaiGolPekerjaan::find($kd_gol_pekerjaan);
        if (!$GolPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        return response()->json($GolPekerjaan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_gol_pekerjaan = $request->kd_gol_pekerjaan;
        $GolPekerjaan = PegawaiGolPekerjaan::find($kd_gol_pekerjaan);
        $validate = $request->validate([
            'nm_gol_pekerjaan' => 'required',
        ]);

        if (!$GolPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        $GolPekerjaan->update([
            'nm_gol_pekerjaan' => $validate['nm_gol_pekerjaan']
        ]);
        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_gol_pekerjaan = $request->kd_gol_pekerjaan;
        $GolPekerjaan = PegawaiGolPekerjaan::find($kd_gol_pekerjaan);
        if (!$GolPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        if ($GolPekerjaan->pegawai()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai pegawai'], 409);
        }
        $GolPekerjaan->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
