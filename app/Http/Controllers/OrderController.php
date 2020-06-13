<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\Salsa;
use App\Entities\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_store)
          {
          $orders = Order::all();
          if(Auth::user()->is_store && !empty(Auth::user()->stores())){
              $stores_id=Auth::user()->stores()->modelKeys();
              $orders = $orders->whereIn('store_id',$stores_id);
          }

          return view('admin.pedido.listaPedidosAdmin', compact('orders'));
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
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_store)
        {
            $stores=Store::all();
            if(Auth::user()->is_store && !empty(Auth::user()->stores())){
                $stores_id=Auth::user()->stores()->modelKeys();
                $stores = $stores->only($stores_id);
            }

            $salsas=Salsa::where('active', 1)->get();
            return view('admin.tienda.crearPedido',
                    compact('salsas','stores'));
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
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_store)
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
          return response(view('errors.403'),403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_store)
        {
            $order->load('salsas');
            return view('admin.pedido.detallePedidoAdmin', compact('order'));
          }
            return response(view('errors.403'),403);
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
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_store)
        {
            $order->delete();
            return redirect('/orders')->with('message', 'El pedido se borró correctamente!');
          }
            return response(view('errors.403'),403);
    }
}
