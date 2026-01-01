<?php

namespace App\Http\Controllers;

use App\Models\CutiRiwayat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CutiRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cutiRiwayat = CutiRiwayat::all();
        return DataTables::of($cutiRiwayat)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nrp' => 'required|unique:cuti_kategori,kd_kategori|max:255',
            'kd_jenis_cuti' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'durasi' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'tgl_pengajuan' => 'required',
        ]);
        $kategori = CutiRiwayat::create([
            'kd_riwayat' => Str::uuid(),
            'nrp' => $validated['nrp'],
            'kd_jenis_cuti' => $validated['kd_jenis_cuti'],
            'tgl_mulai' => $validated['tgl_mulai'],
            'tgl_akhir' => $validated['tgl_akhir'],
            'durasi' => $validated['durasi'],
            'keterangan' => $validated['keterangan'],
            'status' => $validated['status'],
            'tgl_pengajuan' => $validated['tgl_pengajuan'],
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kd_riwayat = $request->kd_riwayat;
        $cutiRiwayat = CutiRiwayat::findOrFail($kd_riwayat);
        return response()->json($cutiRiwayat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_riwayat = $request->kd_riwayat;
        $jenisCuti = CutiRiwayat::find($kd_jenis_cuti);
        $validated = $request->validate([
            'nrp' => 'required',
            'kd_jenis_cuti' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'required',
            'durasi' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'tgl_pengajuan' => 'required',
        ]);

        $kategori->update([
            'kd_riwayat' => $kd_jenis_cuti,
            'nrp' => $validated['nrp'],
            'kd_jenis_cuti' => $validated['kd_jenis_cuti'],
            'tgl_mulai' => $validated['tgl_mulai'],
            'tgl_akhir' => $validated['tgl_akhir'],
            'durasi' => $validated['durasi'],
            'keterangan' => $validated['keterangan'],
            'status' => $validated['status'],
            'tgl_pengajuan' => $validated['tgl_pengajuan'],
        ]);

        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_riwayat = $request->kd_riwayat;
        $jenis_cuti = CutiRiwayat::find($kd_riwayat);
        if (!$jenis_cuti) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        if ($kategori->cuti_persetujuan()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai dipersetujuan'], 409);
        }
        $kategori->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
