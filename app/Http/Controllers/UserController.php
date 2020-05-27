<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.usuario.listaUsuario', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.crearUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $errorMessages =
      [
        'name.required' => 'Ingrese el nombre del usuario',
        'email.required' => 'Ingrese el correo del usuario',
        'email.email' => 'Ingrese un correo válido',
        'email.unique' => 'El correo ya está en uso',
        'rol.in' => 'Seleccione un rol válido'
      ];

      $input = $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'c_password' => 'required|same:password',
        'rol' => 'required|in:admin,vendedor,repartidor,tienda',
      ], $errorMessages);

      $usuario = User::onlyTrashed()->where( 'email', $input['email'] )->first();

      if ( $usuario == null )
      {
        $input['password'] = bcrypt($input['password']);
        User::create($input);
      }
      else
      {
        User::onlyTrashed()->where( 'email', $input['email'] )->first()->restore();

        $update = $request->validate(
        [
          'name' => 'required',
          'email' => 'required|email',
          'password' => 'required',
          'rol' => 'required|in:admin,vendedor,repartidor,tienda',
        ], $errorMessages);

        $update['password'] = bcrypt($update['password']);
        User::where('id', $usuario->id)->update($update);
      }

      return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.usuario.editarUsuario', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $errorMessages =
      [
        'name.required' => 'Ingrese el nombre del usuario',
        'email.required' => 'Ingrese el correo del usuario',
        'email.email' => 'Ingrese un correo válido',
        'email.unique' => 'El correo ya está en uso',
        'rol.in' => 'Seleccione un rol válido'
      ];

      $update = $request->validate(
      [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'rol' => 'required|in:admin,vendedor,repartidor,tienda',
      ], $errorMessages);

      $user = User::where('id', $id)->update($update);

      return redirect('/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      User::find($id)->delete();
      return redirect('/users')->with('message', 'El usuario se borró correctamente!');
    }
}
