<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = User::with(['role_user']);
        return DataTables::of($dataUser)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users,email',
            'password'=> 'required',
            'role_id'=> 'required',
        ]);

        User::create([
            'id'=> Str::uuid(),
            'name'=>$validate['name'],
            'email'=>$validate['email'],
            'password'=>$validate['password'],
            'role_id'=>$validate['role_id']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id_user = $request->id;
        $user = User::with(['role_user'])->find($id_user);
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id_user = $request->id;
        $user = User::find($id_user);
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        $user->update([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => $validate['password'],
            'role_id' => $validate['role_id']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_user = $request->id;
        $user = User::find($id_user);
        if (!$user) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'data berhasil dihapus']);
    }
}
