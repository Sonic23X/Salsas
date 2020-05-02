<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Store;
use App\User;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tiendas = Store::all();
      return view('admin.tienda.index', compact('tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tienda.crearTienda');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //validaciones con unique ¿? | busqueda de usuario existente
      $input = $request->validate(
      [
        'owner' => 'required|string',
        'name' => 'required|string',
        'street' => 'required|string',
        'number' => 'required|numeric',
        'suburb' => 'required|string',
        'state' => 'required',
        'postal' => 'required|numeric',
        'phone' => 'required|numeric',
      ]);

      //buscamos al usuario
      $user = User::where('name', 'like', '%' . $input['owner'] . '%')
                  ->first();

      //armamos la respuesta
      $data = array(
        'name' => $input['name'],
        'street' => $input['street'],
        'number' => $input['number'],
        'suburb' => $input['suburb'],
        'state' => $input['state'],
        'postal' => $input['postal'],
        'phone' => $input['phone'],
        'user_id' => $user->id,
        'qr_path' => 'path'
      );

      //save the store
      $store = Store::create($data);

      //generate the QR
      \QrCode::size(500)
            ->generate(''.$store->id.'', public_path('images\qr\qr_'.$store->name.'.svg'));

      //update the qr_path of the store
      $store->qr_path = 'images\qr\qr_'.$store->name.'.svg';
      $store->save();

      return redirect('/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('admin.tienda.editarTienda', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $input = $request->validate(
      [
        'owner' => 'required|string',
        'name' => 'required|string',
        'street' => 'required|string',
        'number' => 'required|numeric',
        'suburb' => 'required|string',
        'state' => 'required',
        'postal' => 'required|numeric',
        'phone' => 'required|numeric',
      ]);

      //buscamos al usuario
      $user = User::where('name', 'like', '%' . $input['owner'] . '%')
                  ->first();

      //armamos la respuesta
      $data = array(
        'name' => $input['name'],
        'street' => $input['street'],
        'number' => $input['number'],
        'suburb' => $input['suburb'],
        'state' => $input['state'],
        'postal' => $input['postal'],
        'phone' => $input['phone'],
        'user_id' => $user->id,
      );

      $store = Store::where('id', $id)->update($data);

      return redirect('/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->delete();

        return redirect('/stores')->with('message', 'La tienda se borró correctamente!');
    }
}
