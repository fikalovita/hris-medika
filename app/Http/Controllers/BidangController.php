<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBidang = Bidang::all();
        return DataTables::of($dataBidang)->make(true);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
                'kd_bidang' => 'required|unique:pegawai_bidang,kd_bidang|max:255',
            'nm_bidang' => 'required',
            ],
            [
                'kd_bidang.unique' => "kode bidang sudah ada"
            ]
        );
        Bidang::create([
            'kd_bidang' => $validated['kd_bidang'],
            'nm_bidang' => $validated['nm_bidang'],
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_bidang = $request->kd_bidang;
        $bidangShow = Bidang::findOrFail($kd_bidang);
        return response()->json($bidangShow);
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_bidang = $request->kd_bidang;
        $bidang = Bidang::find($kd_bidang);
        $validated = $request->validate([
            'nm_bidang' => 'required',
        ]);

        $bidang->update([
            'nm_bidang' => $validated['nm_bidang']
        ]);
        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_bidang = $request->input('kd_bidang');
        $bidang = Bidang::find($kd_bidang);
        if ($bidang->pegawai()->count() > 0) {
            return response()->json(['message' => 'data sudah dipakai pegawai'], 409);
        }
        if (!$bidang) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $bidang->delete();
        return response()->json(['message' => 'data berhasil dihapus']);
    }
}
