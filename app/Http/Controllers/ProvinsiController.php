<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::orderBy('nm_provinsi')->get(['kd_provinsi','nm_provinsi'])->values();

        return response()->json($provinsi);
    }
    
}
