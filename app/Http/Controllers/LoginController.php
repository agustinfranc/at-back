<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repositories\User\GetUserRepository;
use Illuminate\Http\Client\Request;
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

    $user = $repository->getOne($user->id);

    return $user;
  }
}
