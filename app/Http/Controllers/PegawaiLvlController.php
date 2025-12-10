<?php

namespace App\Http\Controllers;

use App\Models\PegawaiLvl;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PegawaiLvlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataLvl = PegawaiLvl::all();
        return DataTables::of($dataLvl)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_lvl' => 'required|unique:pegawai_lvl,kd_lvl|max:255',
            'nm_lvl' => 'required'
        ]);
        PegawaiLvl::create([
            'kd_lvl' => $validated['kd_lvl'],
            'nm_lvl' => $validated['nm_lvl']
        ]);

        return response()->json(['message' => 'Data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_lvl = $request->kd_lvl;
        $dataLvl = PegawaiLvl::findOrFail($kd_lvl);
        return response()->json($dataLvl);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_lvl = $request->kd_lvl;
        $validated = $request->validate([
            'nm_lvl' => 'required'
        ]);

        $pegawai_lvl = PegawaiLvl::find($kd_lvl);
        $pegawai_lvl->update([
            'nm_lvl' => $request->nm_lvl
        ]);
        return response()->json(['message' => 'Data berhasil diubah'], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_lvl = $request->kd_lvl;
        $pegawai_lvl = PegawaiLvl::find($kd_lvl);
        if (!$pegawai_lvl) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        if ($pegawai_lvl->pegawai()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai pegawai'], 409);
        }
        $pegawai_lvl->delete();
        return response()->json(['message' => 'Data Berhasil dihapus'], 200);
    }
}
