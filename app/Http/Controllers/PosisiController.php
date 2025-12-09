<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPosisi = Posisi::all();

        return DataTables::of($dataPosisi)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nm_posisi' => 'required',
        ]);
        $kategori = Posisi::create([
            'kd_posisi' => Str::uuid(),
            'nm_posisi' => $validated['nm_posisi'],
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_posisi = $request->kd_posisi;
        $posisiShow = Posisi::findOrFail($kd_posisi);
        return response()->json($posisiShow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_posisi = $request->kd_posisi;
        $posisi = Posisi::find($kd_posisi);
        $validated = $request->validate([
            'nm_posisi' => 'required',
        ]);

        $posisi->update([
            'kd_posisi' => $kd_posisi,
            'nm_posisi' => $validated['nm_posisi'],
        ]);

        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_posisi = $request->kd_posisi;
        $posisi = Posisi::find($kd_posisi);
        if ($posisi->pegawai()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai pegawai'], 409);
        }
        if (!$posisi) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $posisi->delete();

        return response()->json(['message' => 'data berhasil dihapus']);
    }
}
