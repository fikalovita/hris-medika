<?php

namespace App\Http\Controllers;

use App\Models\PtkpSttsAnak;
use Illuminate\Http\Request;

class PtkpSttsAnakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPtkpAnak = PtkpSttsAnak::all();
        return response()->json($dataPtkpAnak);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kd_ptkp' => 'required|unique:ptkp_stts_anak,kd_ptkp|max:255',
            'nm_ptkp' => 'required',
        ]);

        PtkpSttsAnak::create([
            'kd_ptkp' => $validate['kd_ptkp'],
            'nm_ptkp' => $validate['nm_ptkp']
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_ptkp = $request->kd_ptkp;
        $PtkpAnak = PtkpSttsAnak::find($kd_ptkp);
        if (!$PtkpAnak) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        return response()->json($PtkpAnak, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_ptkp = $request->kd_ptkp;
        $PtkpAnak = PtkpSttsAnak::find($kd_ptkp);
        $validate = $request->validate([
            'nm_ptkp' => 'required',
        ]);

        if (!$PtkpAnak) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }

        $PtkpAnak->update([
            'nm_ptkp' => $validate['nm_ptkp']
        ]);
        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_ptkp = $request->kd_ptkp;
        $PtkpAnak = PtkpSttsAnak::find($kd_ptkp);
        if (!$PtkpAnak) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $PtkpAnak->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
