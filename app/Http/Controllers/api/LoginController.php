<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
  public function register(Request $request)
  {
    $register = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required',
      'c_password' => 'required|same:password',
    ]);

    if ($register->fails())
      return response()->json(['error'=>$register->errors()], 401);

    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);

    return response()->json(['message'=> 'User added!'], 200);
  }

  public function login(Request $request)
  {
    $login = $request->validate([
      'email' => 'required|string',
      'password' => 'required|string',
    ]);

    if (!Auth::attempt($login))
      return response()->json(['message' => 'invalid argumments'], 200);

    $accessToken = Auth::user()->createToken('authToken')->accessToken;

    return response(['user' => Auth::user(), 'access_toekn' => $accessToken]);
  }
}
