<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\PegawaiJnsPekerjaan;

class PegawaiJnsPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJnsPekerjaan = PegawaiJnsPekerjaan::all();
        return DataTables::of($dataJnsPekerjaan)->make(true);
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
        $validate = $request->validate([
            'nm_jns_pekerjaan' => 'required',
        ]);

        $kd_jns_pekerjaan = $request->kd_jns_pekerjaan;
        $pegawaiJnsPekerjaan = PegawaiJnsPekerjaan::find($kd_jns_pekerjaan);

        if (!$pegawaiJnsPekerjaan) {
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
        $pegawaiJnsPekerjaan = PegawaiJnsPekerjaan::find($kd_jns_pekerjaan);
        if (!$pegawaiJnsPekerjaan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        if ($pegawaiJnsPekerjaan->pegawai()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai pegawai'], 409);
        }
        $pegawaiJnsPekerjaan->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
