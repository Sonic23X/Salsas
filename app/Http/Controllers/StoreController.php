<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
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
        $usersList = User::where('rol','tienda')->get();
        return view('admin.tienda.crearTienda',compact('usersList'));
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
        'owner' => 'required|exists:users,id',
        'name' => 'required|string',
        'street' => 'required|string',
        'number' => '',
        'suburb' => '',
        'state' => 'required',
        'postal' => '',
        'phone' => '',
      ]);

      //buscamos al usuario
      // $user = User::where('name', 'like', '%' . $input['owner'] . '%')
      // //             ->first();
      //
      // if($user == null)
      //     return Redirect::back()
      //            ->withErrors(['error' => 'El usuario no existe']);

      //armamos la respuesta
      $data = array(
        'name' => $input['name'],
        'street' => $input['street'],
        'number' => $input['number'],
        'suburb' => $input['suburb'],
        'state' => $input['state'],
        'postal' => $input['postal'],
        'phone' => $input['phone'],
        'user_id' => $input['owner'],
        'qr_path' => 'path'
      );

      //save the store
      $store = Store::create($data);

      //generate the QR
      \QrCode::size(1000)
            ->format('png')
            ->generate(''.$store->id.'', public_path('images\qr\qr_'. str_replace(' ', '_', $store->name)  .'.png'));

      //update the qr_path of the store
      $store->qr_path = 'images\qr\qr_'.str_replace(' ', '_', $store->name).'.png';
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

      if($user == null)
          return Redirect::back()
                 ->withErrors(['error' => 'El usuario no existe']);

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

    public function getStoreCode( $id )
    {
      $store = Store::where( 'id', $id )->first();
      $pdf =  \PDF::loadView( 'tienda.print', compact( 'store' ) );
      return $pdf->download('print.pdf');
    }
}
