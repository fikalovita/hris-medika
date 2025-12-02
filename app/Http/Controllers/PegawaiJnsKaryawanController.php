<?php

namespace App\Http\Controllers;

use App\Models\PegawaiJnsKaryawan;
use Illuminate\Http\Request;

class PegawaiJnsKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJnsKaryawan =  PegawaiJnsKaryawan::all();
        return response()->json($dataJnsKaryawan, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kd_jns_karyawan' => 'required|unique:pegawai_jns_karyawan,kd_jns_karyawan|max:255',
            'nm_jns_karyawan' => 'required'
        ]);
        PegawaiJnsKaryawan::create([
            'kd_jns_karyawan' => $validate['kd_jns_karyawan'],
            'nm_jns_karyawan' => $validate['nm_jns_karyawan']
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_jns_karyawan = $request->kd_jns_karyawan;
        $jnsKaryawan = PegawaiJnsKaryawan::find($kd_jns_karyawan);

        if (!$jnsKaryawan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        return response()->json($jnsKaryawan, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_jns_karyawan = $request->kd_jns_karyawan;
        $jnsKaryawan = PegawaiJnsKaryawan::find($kd_jns_karyawan);
        $validate = $request->validate([
            'nm_jns_karyawan' => 'required'
        ]);
        if (!$jnsKaryawan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $jnsKaryawan->update([
            'nm_jns_karyawan' => $validate['nm_jns_karyawan']
        ]);


        return response()->json(['message' => 'data berhasil diubah'], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_jns_karyawan = $request->kd_jns_karyawan;
        $jnsKaryawan = PegawaiJnsKaryawan::find($kd_jns_karyawan);
        if (!$jnsKaryawan) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $jnsKaryawan->delete();

        return response()->json(['message' => 'data berhasil dihapus'], 200);
    }
}
