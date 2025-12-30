<?php

namespace App\Http\Controllers;

use App\Models\CutiSaldo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CutiSaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti_saldo = CutiSaldo::all();
        return DataTables::of($cuti_saldo)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nrp' => 'required',
            'jatuh_tempo' => 'required',
            'cuti_berakhir' => 'required',
            'cuti_berikut' => 'required',
            'hak_cuti' => 'required',
            'cuti_diambil' => 'required',
            'saldo_cuti' => 'required',
        ]);
        $kategori = CutiSaldo::create([
            'kd_saldo' => Str::uuid(),
            'nrp' => $validated['nrp'],
            'jatuh_tempo' => $validated['jatuh_tempo'],
            'cuti_berakhir' => $validated['cuti_berikut'],
            'cuti_berikut' => $validated['cuti_berikut'],
            'hak_cuti' => $validated['hak_cuti'],
            'cuti_diambil' => $validated['cuti_diambil'],
            'saldo_cuti' => $validated['saldo_cuti'],
        ]);

        return response()->json(['message' => 'data berhasil dibuat'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kd_saldo = $request->kd_saldo;
        $saldoCutiShow = CutiSaldo::findOrFail($kd_saldo);
        return response()->json($saldoCutiShow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $kd_saldo = $request->kd_saldo;
        $saldoCuti = CutiSaldo::find($kd_saldo);
        $validated = $request->validate([
            'nrp' => 'required',
            'jatuh_tempo' => 'required',
            'cuti_berakhir' => 'required',
            'cuti_berikut' => 'required',
            'hak_cuti' => 'required',
            'cuti_diambil' => 'required',
            'saldo_cuti' => 'required',
        ]);

        $kategori->update([
            'kd_saldo' => $kd_saldo,
            'nrp' => $validated['nm_jenis_cuti'],
            'jatuh_tempo' => $validated['jatuh_tempo'],
            'cuti_berakhir' => $validated['cuti_berakhir'],
            'hak_cuti' => $validated['hak_cuti'],
            'cuti_diambil' => $validated['cuti_diambil'],
            'saldo_cuti' => $validated['saldo_cuti'],
        ]);

        return response()->json(['message' => 'data berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $kd_saldo = $request->kd_saldo;
        $saldo_cuti = CutiSaldo::find($kd_saldo);
        if (!$saldo_cuti) {
            return response()->json(['message' => 'data tidak ditemukan'], 404);
        }
        $kategori->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
