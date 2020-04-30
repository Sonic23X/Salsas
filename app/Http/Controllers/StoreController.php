<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Store;

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

    //Ejemplo de busqueda
    public function get($id)
    {
      return Store::findOrFail($id);
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
      //validaciones con unique ¿? | busqueda de usuario existente
      $input = $request->validate(
      [
        'name' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'user_id' => 'required|int',
      ]);

      //adaptar para que el campo qr_path permita ser null al crear el registro
      //en caso de que el QR contenga el ID de la tienda
      $input['qr_path'] = 'path';

      //save the store
      $store = Store::create($input);

      //generate the QR
      \QrCode::size(500)
            ->generate(''.$store->id.'', public_path('images\qr\qr_'.$store->name.'.svg'));

      //update the qr_path of the store
      $store->qr_path = 'images\qr\qr_'.$store->name.'.svg';
      $store->save();

      return $store;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
      $store->fill($request->validate(
      [
        'name' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'user_id' => 'required|int',
      ]));

      $store->save();

      return $store;
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

        return array('status' => 200, 'message' => '¡Tienda borrada!');
    }
}
