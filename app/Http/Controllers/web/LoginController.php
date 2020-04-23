<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
  public function login(Request $request)
  {
    $login = $request->validate([
      'email' => 'required|string',
      'password' => 'required|string',
    ]);

    if (!Auth::attempt($login))
      return json_encode(['message' => 'invalid argumments']);

    return json_encode(['user' => Auth::user());
  }
}
