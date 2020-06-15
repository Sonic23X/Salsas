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
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_delivery)
          {
            $deliveries = Delivery::all();
            $salsas = Delivery::getDeliveredSalsas();
            $mount = Delivery::getMountReceived();

            return view('admin.entregas.listaEntrega',
                      compact('deliveries','salsas','mount'));

          }
            return response(view('errors.403'),403);
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

      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_delivery)
          {

      $create = $request->validate([
        'order_id' => 'required',
        'mount_received' => 'required',
        'consicion' => 'required',
        'note' => '',
      ]);

      $total = 0;
      $i = 1;
      $salsas = [];

      //recorremos las salsas
      while ( $request->has( 'salsa_' . $i ) )
      {
        $total += ( $request[ 'count_' . $i ] * $request[ 'price_' . $i ] );
        $salsa = [ 'salsa_id' => $request[ 'count_' . $i ],
                   'quantity' => $request[ 'count_' . $i ],
                   'price' => $request[ 'price_' . $i ] ];
        array_push( $salsas, $salsa );
        $i++;
      }

      if ( $create[ 'mount_received' ] < $total && $create[ 'consicion' ] == '0' )
        return redirect()->back()->withErrors( [ 'error' => 'El monto ingresado es menor al monto total del pedido' ]);

      $create['total'] = $total;
      $create['note'] = ( $create['note'] == null ) ? ' ' : $create['note'];
      $create['delivery_man'] = Auth::user()->id;
      $create['delivery_date'] = Carbon::now()->toDateString();

      $envio = Delivery::create( $create );

      //guardamos los detalles
      $envio->salsas()->attach( $salsas );

      //redireccionamos
      return \Redirect::to('/dashboard');

    }
      return response(view('errors.403'),403);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entities\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_delivery)
          {
            $order = Order::find($delivery->order_id);
            return view( 'admin.entregas.detalleEntregaAdmin', compact( 'order', 'delivery' ) );
          }
            return response(view('errors.403'),403);

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

      if(Auth::user()->is_seller
        or Auth::user()->is_admin
        or Auth::user()->is_delivery)
          {
          $store = Store::findOrFail( $storeId );
          $order = Order::where( 'store_id', $storeId )->orderByDesc( 'id' )->limit( 1 )->first();
          $order->load( 'salsas' );

          return view('repartidor.entregas.registrarEntrega', compact( 'store', 'order' ));
        }
          return response(view('errors.403'),403);
    }
}
