<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kd_kecamatan)
    {
        $kelurahan = Kelurahan::where('kd_kecamatan', $kd_kecamatan)->select('kd_kelurahan', 'nm_kelurahan')->orderBy('nm_kelurahan')->get();

        return response()->json($kelurahan);
    }
}
