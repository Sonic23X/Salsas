<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\Salsa;
use App\Entities\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $orders = Order::all();

          return view('admin.pedido.listaPedidosAdmin', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $stores=Store::all();
      $salsas=Salsa::where('active', 1)->get();
      return view('admin.tienda.crearPedido',
              compact('salsas','stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->validate([
          'store'=>'required',
          'notes' =>'',
          'salsa.*.salsa_id' =>'',
          'salsa.*.quantity' =>'',
          'salsa.*.price' =>'required'
      ]);

      $sum=0;
      foreach ($data['salsa'] as $key => $value) {
        if($value['quantity']){
          $sum =+ $value['price'] * $value['quantity'];
        }
      }

      $order = Order::create([
          'code' => '123',
          'store_id' => $data['store'],
          'seller_id' => $request->user()->id,
          'mount' => $sum,
          'notes' => $data['notes'] ?? ''
      ]);

      $id_salsas= Arr::pluck( $data['salsa'], 'salsa_id');
      $id_salsas= array_values(array_filter($id_salsas));
      $salsas = Arr::only($data['salsa'], $id_salsas);

      $order->salsas()->attach($salsas);
      return redirect("/orders");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
      $order->load('salsas');
      return view('admin.pedido.detallePedidoAdmin', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders')->with('message', 'El pedido se borró correctamente!');
    }
}
