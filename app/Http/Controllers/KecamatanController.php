<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kd_kabupaten)
    {
        $kecamatan = Kecamatan::where('kd_kabupaten', $kd_kabupaten)->select('kd_kecamatan', 'nm_kecamatan')->orderBy('nm_kecamatan')->get();

        return response()->json($kecamatan);
    }
}
