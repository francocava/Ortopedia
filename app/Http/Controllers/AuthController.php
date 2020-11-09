<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'password' => 'required',
            'device_name' => 'nullable',
        ]);

        $user = Usuario::where('usuario', $request->usuario)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            exit;
            throw ValidationException::withMessages([
                'usuario' => ['Usuario y/o contraseña incorrectos'],
            ]);

        }

        return response()->json(['token' => $user->createToken($request->device_name ?? 'generic')->plainTextToken]);
    }

    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json(['user' => $user]);
    }

    public function logout(Request $request)
    {
        $user->tokens()->where('id', $id)->delete();
    }
}
