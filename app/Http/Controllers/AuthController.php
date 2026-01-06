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
        $user = User::where('email', $request->email)->first();
        if (!$user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['username atau password salah'],
            ]);
        }
        $token = $user->createToken('token-login')->plainTextToken;
        return response()->json(['data' => $user, 'token' => $token]);
    }

    public function logOut()  {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Anda berhasil logout']);
    }
}
