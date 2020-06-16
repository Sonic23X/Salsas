@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tienda: {{ $store->name }}</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header" style="background-color: #1cc659">
                      <h3 class="card-title float-left">Registrar entrega</h3>

                      <button type="button" class="btn btn-primary  .btn-sm float-right"
                              onclick="location.href='{{ url('dashboard') }}'">Regresar</button>

                  </div>
                  @if ( isset($order) )
                    <div class="card-body text-center">
                      @if (session('errors'))
                          <div class="alert alert-danger" role="alert">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <form role="form" id="quickForm" action="{{ url('/deliveries') }}" method="post">
                        @csrf
                        <input type="hidden" name="order_id" value=" {{ $order->id }} ">
                        <input type="hidden" name="store_id" value=" {{ $store->id }} ">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Tipo de Salsa</th>
                              <th scope="col">Cantidad a entregar</th>
                              <th scope="col">c/u</th>
                              <th scope="col">Entregado</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              @foreach($order->salsas as $salsa)
                                <tr>
                                    <td>{{$salsa->name}}</td>
                                    <td>{{$salsa->pivot->quantity}} Piezas</td>
                                    <td>${{$salsa->pivot->price ?? 0.00}}</td>
                                    <td>
                                      <input type="hidden" name="salsa_{{ $loop->iteration }}" value="{{ $salsa->id }}">
                                      <input type="number" id="count_{{ $loop->iteration }}" name="count_{{ $loop->iteration }}" class="form-control"
                                            onkeyup="calculate( {{ $salsa->pivot->price }}, {{ $loop->iteration }} )" required>
                                      <input type="hidden" id="price_{{ $loop->iteration }}" name="price_{{ $loop->iteration }}" value="{{ $salsa->pivot->price }}">
                                    </td>
                                    <td><span id="total_{{ $loop->iteration }}"></span></td>
                                </tr>
                              @endforeach
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="col"> <strong>Total</strong> </td>
                              <td colspan="col"></td>
                              <td colspan="col"></td>
                              <td colspan="col"></td>
                              <td colspan="col"><span id="sumTotal"></span></td>
                            </tr>
                          </tfoot>
                        </table>
                        <hr class="mt-5" >
                        <div class="row">
                          <div class="col-sm-9">
                              <div class="form-group">
                                  <label>Monto recibido</label>
                                  <input type="number" name="mount_received" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                                <label>¿Entrega concisionada?</label>
                                <select class="form-control" name="concesion">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Nota</label>
                                  <textarea name="note" class="form-control" rows="2"></textarea>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrar Entrega</button>
                      </form>
                    </div>
                  @endif
                  @if ( isset($salsas) )
                    <div class="">
                      asd
                    </div>
                  @endif
                  @if ( isset($delivery) )
                    <div class="card-body text-center">
                      @if (session('errors'))
                          <div class="alert alert-danger" role="alert">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      <form role="form" id="quickForm" action="{{ url('/deliveries/concesion') }}" method="post">
                        @csrf
                        <input type="hidden" id="store_id" name="store_id" value=" {{ $store->id }} ">
                        <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">Tipo de Salsa</th>
                              <th scope="col">c/u</th>
                              <th scope="col">Cantidad concesionada</th>
                              <th scope="col">Cantidad devuelta</th>
                              <th scope="col">Monto por cobrar</th>
                              <th scope="col">Salsas a dejar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              @foreach($delivery->salsas as $salsa)
                                <tr>
                                    <td>{{$salsa->name}}</td>
                                    <td>${{$salsa->pivot->price ?? 0.00}}</td>
                                    <td>{{$salsa->pivot->quantity}} Piezas</td>
                                    <td>
                                      <input type="hidden" name="salsa_{{ $loop->iteration }}" value="{{ $salsa->id }}">
                                      <input type="number" id="count_{{ $loop->iteration }}" name="count_{{ $loop->iteration }}" class="form-control"
                                            onkeyup="calculateDelivery( {{ $salsa->pivot->price }}, {{ $loop->iteration }}, {{ $salsa->pivot->quantity }} )" required>
                                      <input type="hidden" id="price_{{ $loop->iteration }}" name="price_{{ $loop->iteration }}" value="{{ $salsa->pivot->price }}">
                                      <input type="hidden" id="quantity_{{ $loop->iteration }}" name="quantity_{{ $loop->iteration }}" value="{{ $salsa->pivot->quantity }}">
                                    </td>
                                    <td><span id="total_{{ $loop->iteration }}"></span></td>
                                    <td>
                                      <input type="number" id="drop_{{ $loop->iteration }}" name="drop_{{ $loop->iteration }}" class="form-control" required>
                                    </td>
                                </tr>
                              @endforeach
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="col"> <strong>Total</strong> </td>
                              <td colspan="col"></td>
                              <td colspan="col"></td>
                              <td colspan="col"></td>
                              <td colspan="col"><span id="sumTotal"></span></td>
                              <td colspan="col"></td>
                            </tr>
                          </tfoot>
                        </table>
                        <hr class="mt-5" >
                        <div class="row">
                          <div class="col-sm-9">
                              <div class="form-group">
                                  <label>Monto recibido</label>
                                  <input type="number" name="mount_received" class="form-control" required>
                              </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-group">
                                <label>¿Entrega concisionada?</label>
                                <select class="form-control" name="concesion">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                              <div class="form-group">
                                  <label>Nota</label>
                                  <textarea name="note" class="form-control" rows="2"></textarea>
                              </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Registrar Entrega</button>
                      </form>
                    </div>
                  @endif
                  </div>
                </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    @section('script')
      <script type="text/javascript">

        let sumTotal = 0;

        /* Functions of Orders */

        function calculate( price, loop )
        {
          if ( $( '#count_' + loop ).val() != null || $( '#count_' + loop ).val() != '')
          {
            let total = price * $( '#count_' + loop ).val();
            $( '#total_' + loop).html( `$${total}` );

            //aumentamos al total
            sumTotalCalculate( );
          }

        }

        function sumTotalCalculate( )
        {
          sumTotal = 0;
          let i = 1;
          let id = '#count_';

          while ( $( id + i).length != 0 )
          {
            let valor = $( '#price_' + i ).val() * $( id + i).val();

            sumTotal += valor;

            i++;
          }

          $( '#sumTotal' ).html( '$' + sumTotal );
        }

        /* Functions of Deliveriies */

        function calculateDelivery( price, loop, concesion )
        {
          if ( $( '#count_' + loop ).val() != null || $( '#count_' + loop ).val() != '')
          {
            let total = price * ( concesion - $( '#count_' + loop ).val() );
            $( '#total_' + loop).html( `$${total}` );

            sumTotalDelivery( );
          }
        }

        function sumTotalDelivery( )
        {
          sumTotal = 0;
          let i = 1;
          let id = '#count_';

          while ( $( id + i).length != 0 )
          {
            let valor = $( '#price_' + i ).val() * ( $( '#quantity_' + i ).val() - $( id + i).val() ) ;

            sumTotal += valor;

            i++;
          }

          $( '#sumTotal' ).html( '$' + sumTotal );
        }


      </script>
    @endsection

@endsection
