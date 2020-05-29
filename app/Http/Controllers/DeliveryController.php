<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryPost;
use App\Entities\Store;
use App\Entities\Order;
use App\Entities\Salsa;
use App\Entities\Delivery;
use Auth;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveries = Delivery::all();
        $salsas = Delivery::getDeliveredSalsas();
        $mount = Delivery::getMountReceived();

        return view('admin.entregas.listaEntrega',
                  compact('deliveries','salsas','mount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  )
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $create = $request->validate([
        'order_id' => 'required',
        'total' => 'required',
        'mount_received' => 'required',
        'note' => 'required'
      ]);

      $create['delivery_man'] = Auth::user()->id;
      $create['delivery_date'] = Carbon::now()->toTimeString();

      Delivery::create( $create );

      return \Redirect::to('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entities\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entities\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entities\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
    }

    public function setDelivery( $storeId )
    {
      $store = Store::findOrFail( $storeId );
      $order = Order::where( 'store_id', $storeId )->orderByDesc( 'id' )->limit( 1 )->first();
      $order->load( 'salsas' );

      return view('repartidor.entregas.registrarEntrega', compact( 'store', 'order' ));
    }
}
