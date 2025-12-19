<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kd_provinsi)
    {
        $kabupaten = Kabupaten::where('kd_provinsi', $kd_provinsi)->select('kd_kabupaten','nm_kabupaten')->orderBy('nm_kabupaten')->get();

        return response()->json($kabupaten);
    }
}
