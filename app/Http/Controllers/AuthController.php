<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::with(['pegawai:nrp,nm_pegawai,nm_pegawai_tmb,kd_manager'])->where('email', $request->email)->first();
        if (!$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['username atau password salah'],
            ]);
        }
        $token = $user->createToken('token-login')->plainTextToken;
        $pegawai = $user->pegawai;
        $dataPegawai = $pegawai ? [
            'nm_pegawai' => $pegawai->nm_pegawai,
            'nm_pegawai_tmb' => $pegawai->nm_pegawai_tmb,
            'kd_manager' => $pegawai->kd_manager
        ] : null;
        return response()->json([
            'data' => $user,
            'pegawai' => $dataPegawai,
            'token' => $token
        ]);
    }

    public function logOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Anda berhasil logout']);
    }
}
