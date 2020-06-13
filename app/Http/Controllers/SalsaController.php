<?php

namespace App\Http\Controllers;

use App\Entities\Salsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SalsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->is_admin){
          $salsas = Salsa::all();
          return view('admin.salsas.listaSalsa', compact('salsas'));
      }
        return response(view('errors.403'),403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Auth::user()->is_admin){
        return view('admin.salsas.crearSalsa');
      }
        return response(view('errors.403'),403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::user()->is_admin){
        $errorMessages =
        [
          'name.required' => 'Ingrese el nombre del producto',
          'description.required' => 'Ingrese la descripción del producto',
          'price.required' => 'Ingrese el precio del producto',
          'price.min' => 'Ingrese el precio correcto del producto',
          'price.max' => 'Ingrese el precio correcto del producto',
        ];

        $validatedData = $request->validate([
          'name' => ['required'],
          'description' => ['required'],
          'price' => ['required', 'numeric', 'min:1', 'max:999'],
        ], $errorMessages);

        $salsa = new Salsa([
           'name' => $request->get('name'),
           'description' => $request->get('description'),
           'price' => $request->get('price'),
        ]);
        $salsa->save();

        return redirect('/salsas');
      }
        return response(view('errors.403'),403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function show(Salsa $salsa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function edit(Salsa $salsa)
    {
      if(Auth::user()->is_admin){
        return view('admin.salsas.editarSalsa', compact('salsa'));
      }
        return response(view('errors.403'),403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if(Auth::user()->is_admin){
        $errorMessages =
        [
          'name.required' => 'Ingrese el nombre del producto',
          'description.required' => 'Ingrese la descripción del producto',
          'price.required' => 'Ingrese el precio del producto',
          'price.min' => 'Ingrese el precio correcto del producto',
          'price.max' => 'Ingrese el precio correcto del producto',
        ];

        $validatedData = $request->validate([
              'name' => ['required'],
              'description' => ['required'],
              'price' => ['required', 'numeric', 'min:1', 'max:999']
        ], $errorMessages);

        $validatedData['active'] = isset($validatedData['active']) ? true : 0;
        $update = Salsa::find($id)->update($validatedData);


        return redirect('/salsas');
      }
        return response(view('errors.403'),403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function destroy($salsa)
    {
      if(Auth::user()->is_admin){
        Salsa::find($salsa)->delete();
        return redirect('/salsas')->with('message', 'El producto se borró correctamente!');
      }
        return response(view('errors.403'),403);

    }
}
