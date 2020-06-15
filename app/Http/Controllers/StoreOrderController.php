<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use App\Entities\Store;
use App\Entities\Salsa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class StoreOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
          return view('admin.tienda.tiendaPedido',
                    compact('store'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Store $store)
    {
        $salsas=Salsa::where('active', 1)->get();
        return view('admin.tienda.crearPedido',
                compact('store','salsas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $store, Request $request)
    {

        $data = $request->validate([
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
            'store_id' => $store->id,
            'seller_id' => $request->user()->id,
            'mount' => $sum,
            'notes' => $data['notes'] ?? ''
        ]);

        $id_salsas= Arr::pluck( $data['salsa'], 'salsa_id');
        $id_salsas= array_values(array_filter($id_salsas));
        $salsas = Arr::only($data['salsa'], $id_salsas);

        $order->salsas()->attach($salsas);

        if ( Auth::user()->is_store )
          return redirect("/dashboard");
        else
          return redirect("/stores/{$store->id}/orders");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store,Order $order)
    {
      $salsas=Salsa::all();
      $order->load('salsas');
      return view('admin.tienda.crearPedido',
              compact('store','order','salsas'));

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
        $data = $request->validate([
            'code' => ['required'],
            'store_id' => ['required'],
            'seller_id' => ['required'],
            'mount' => ['required'],
            'notes' => ['required'],
            'salsa_id' => ['required'],
            'quantity' => ['required'],
            'price' => ['required']
        ]);

        $orders = Order::find($order);
        $orders->code = $data['code'];
        $orders->store_id = $data['store_id'];
        $orders->seller_id = $data['seller_id'];
        $orders->mount = $data['mount'];
        $orders->notes = $data['notes'];
        $orders->save();

        $orders->salsas()->updateExistingPivot($order,['salsa_id'=>$data['salsa_id'],'quantity'=>$data['quantity'], 'price'=>$data['price']]);

        return response()->json($orders);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store,Order $order)
    {
        $order->delete();
        return redirect("/stores/{$store->id}/orders")->with('message', 'El pedido se borró correctamente!');
    }
}
