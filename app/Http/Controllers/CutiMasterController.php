<?php

namespace App\Http\Controllers;

use App\Models\CutiMaster;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CutiMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_cuti = CutiMaster::all();
        return DataTables::of($jenis_cuti)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_jenis_cuti' => 'required|unique:cuti_kategori,kd_kategori|max:255',
            'nm_jenis_cuti' => 'required',
            'kd_kategori' => 'required',
            'durasi' => 'required',
            'indikator' => 'required',
            'syarat' => 'required',
            'reset_tahunan' => 'required',
        ]);
        $kategori = CutiMaster::create([
            'kd_jenis_cuti' => $validated['kd_jenis_cuti'],
            'nm_jenis_cuti' => $validated['nm_jenis_cuti'],
            'kd_kategori' => $validated['kd_kategori'],
            'durasi' => $validated['durasi'],
            'indikator' => $validated['indikator'],
            'syarat' => $validated['syarat'],
            'reset_tahunan' => $validated['reset_tahunan'],
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_jenis_cuti = $request->kd_jenis_cuti;
        $jenisCutiShow = CutiMaster::findOrFail($kd_jenis_cuti);
        return response()->json($jenisCutiShow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_jenis_cuti = $request->kd_jenis_cuti;
        $jenisCuti = CutiMaster::find($kd_jenis_cuti);
        $validated = $request->validate([
            'nm_jenis_cuti' => 'required',
            'kd_kategori' => 'required',
            'durasi' => 'required',
            'indikator' => 'required',
            'syarat' => 'required',
            'reset_tahunan' => 'required',
        ]);

        $kategori->update([
            'kd_jenis_cuti' => $kd_jenis_cuti,
            'nm_jenis_cuti' => $validated['nm_jenis_cuti'],
            'kd_kategori' => $validated['kd_kategori'],
            'durasi' => $validated['durasi'],
            'indikator' => $validated['indikator'],
            'syarat' => $validated['syarat'],
            'reset_tahunan' => $validated['reset_tahunan'],
        ]);

        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_jenis_cuti = $request->kd_jenis_cuti;
        $jenis_cuti = CutiMaster::find($kd_jenis_cuti);
        if (!$jenis_cuti) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        if ($jenis_cuti->cuti_riwayat()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai pegawai'], 409);
        }
        $kategori->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
