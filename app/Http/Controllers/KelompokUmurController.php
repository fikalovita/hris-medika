<?php

namespace App\Http\Controllers;

use App\Models\KelompokUmur;
use Illuminate\Http\Request;

class KelompokUmurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKelompokUmur = KelompokUmur::all();
        return response()->json($dataKelompokUmur, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'kd_kelompok_umur' => 'required|unique:kelompok_umur,kd_kelompok_umur|max:255',
                'nm_kelompok_umur' => 'required',
            ]
        );
        KelompokUmur::create([
            'kd_kelompok_umur' => $validated['kd_kelompok_umur'],
            'nm_kelompok_umur' => $validated['nm_kelompok_umur']
        ]);

        return response()->json(['message' => 'Data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_kelompok_umur = $request->kd_kelompok_umur;
        $kelompokUmurShow = KelompokUmur::findOrFail($kd_kelompok_umur);
        return response()->json($kelompokUmurShow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_kelompok_umur = $request->kd_kelompok_umur;
        $kelompokUmur = KelompokUmur::find($kd_kelompok_umur);
        $validated = $request->validate([
            'nm_kelompok_umur' => 'required',
        ]);

        $kelompokUmur->update([
            'nm_kelompok_umur' => $validated['nm_kelompok_umur']
        ]);

        return response()->json(['message' => 'data berhasil diubah'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_kelompok_umur = $request->kd_kelompok_umur;
        $kelompokUmur = KelompokUmur::find($kd_kelompok_umur);
        $kelompokUmur->delete();

        return response()->json(['message' => 'data berhasil dihapus']);
    }
}
