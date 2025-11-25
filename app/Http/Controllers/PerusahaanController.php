<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPerusahaan = Perusahaan::all();
        return response()->json($dataPerusahaan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nm_perusahaan' => 'required'
        ]);

        Perusahaan::create([
            'kd_perusahaan' => Str::uuid(),
            'nm_perusahaan' => $validated['nm_perusahaan']
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_perusahaan = $request->kd_perusahaan;
        $perusahaan = Perusahaan::findOrFail($kd_perusahaan);

        return response()->json($perusahaan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_perusahaan = $request->kd_perusahaan;
        $validated = $request->validate([
            'nm_perusahaan' => 'required'
        ]);

        $perusahaan =  Perusahaan::find($kd_perusahaan);
        $perusahaan->update([
            'nm_perusahaan' => $validated['nm_perusahaan']
        ]);

        return response()->json(['message data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_perusahaan = $request->kd_perusahaan;
        $perusahaan = Perusahaan::find($kd_perusahaan);
        $perusahaan->delete();

        return response()->json(['message' => 'data berhasil dihapus']);
    }
}
