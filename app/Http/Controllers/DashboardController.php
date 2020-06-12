<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Delivery;
use App\Entities\Order;
use App\Entities\Store;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if( $request->user()->is_delivery )
      {
        $entregas = Delivery::where( 'delivery_man', Auth::user()->id )->count();
        $dinero = Delivery::where( 'delivery_man', Auth::user()->id )->sum( 'mount_received' );

        return view('repartidor.entregas.dashRepartidor', compact( 'entregas', 'dinero' ));
      }
      else if ( $request->user()->is_store )
      {
        $store = Store::where( 'user_id', Auth::user()->id )->first( );
        $orders = Order::where( 'store_id', 1 )->get( );
        return view( 'tienda.dashboardStore', compact( 'store', 'orders' ) );
      }
      else if ( $request->user()->is_seller )
      {

      }
      else if ( $request->user()->is_admin )
      {
        return view('dashboard');
      }
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
        //
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
