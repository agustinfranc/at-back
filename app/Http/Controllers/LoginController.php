<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\User\GetUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request, GetUserRepository $repository)
    {
        $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'nullable',
        ]);

        $user = $repository->getByEmail($validatedData['email']);

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['error' => 'Usuario y/o contraseña incorrectos'], 401);
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
        $request->user()->currentAccessToken()->delete();
    }
}
