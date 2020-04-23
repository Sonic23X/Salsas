<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $create = $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password',
        'rol' => 'required|in:admin,vendedor,repartidor,tienda',
      ]);

      if ($create->fails())
        return json_encode(['error' => $create->errors()]);

      $input = $request->all();
      $input['password'] = bcrypt($input['password']);
      $user = User::create($input);

      return json_encode(['message'=> 'User added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $update = $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email',
        'rol' => 'required|in:admin,vendedor,repartidor,tienda',
      ]);

      if ($update->fails())
        return json_encode(['error' => $update->errors()]);

      $input = $request->all();
      $user = User::where('id', $id)->update($input);

      return json_encode(['message' => 'User updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::where('id', $id)->delete())
          return json_encode(['message' => 'User deleted!']);
        else
          return json_encode(['message' => 'Error on delete the user']);
    }
}
