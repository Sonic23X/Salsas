<?php

namespace App\Http\Controllers;

use App\Entities\Salsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalsaController extends Controller
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
        $validatedData = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);
        
        $salsa = new Salsa([
           'name' => $request->get('name'), 
           'description' => $request->get('description'), 
           'price' => $request->get('price'), 
        ]);
        $salsa->save();
        return response()->json($salsa);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salsa $salsa)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);
       
        $update = Salsa::find($salsa);
        $update->name = $request->get('name');
        $update->description = $request->get('description');
        $update->price = $request->get('price');
        $update->save();
        
        return response()->json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salsa $salsa)
    {
        $delete = Salsa::find($salsa);
        $delete->delete();
        
        return response()->json($delete);
    }
}
