<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
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

      //validaciones con unique ¿? | busqueda de usuario existente
      $input = $request->validate(
      [
        'name' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',
        'user_id' => 'required|int',
        'qr_path' => '',
      ]);

      //adaptar para que el campo qr_path permita ser null al crear el registro
      //en caso de que el QR contenga el ID de la tienda
      $input['qr_path'] = 'path';

      //save the store
      $store = Store::create($input);

      //generate the QR
      \QrCode::size(500)
            ->format('png')
            ->generate($store->id, public_path('stores/'. $store->name .'.png'));

      //update the qr_path of the store
      $input['qr_path'] = 'stores/'. $store->name .'.png';
      $store->update($input);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
