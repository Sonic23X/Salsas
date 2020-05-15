<?php

namespace App\Http\Controllers;

use App\Entities\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
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
            
        $order = Order::create([
            'code' => $data['code'],
            'store_id' => $data['store_id'],
            'seller_id' => $data['seller_id'],
            'mount' => $data['mount'],
            'notes' => $data['notes']
        ]);
        
        $id = Order::max('id');
        
        $detail= Order::find($id);

        $detail->salsas()->attach($id,['salsa_id'=>$data['salsa_id'],'quantity'=>$data['quantity'], 'price'=>$data['price']]);
        
        return response()->json($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
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
    public function destroy(Order $order)
    {
        $orders = Order::find($order);
        $orders->delete();
        return response()->json($orders);
    }
}
