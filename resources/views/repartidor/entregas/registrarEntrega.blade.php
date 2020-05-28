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
                    <div class="card-body text-center">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Tipo de Salsa</th>
                            <th scope="col">Cantidad a entregar</th>
                            <th scope="col">c/u</th>
                            <th scope="col">total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach($order->salsas as $salsa)
                              <tr>
                                  <td>{{$salsa->name}}</td>
                                  <td>{{$salsa->pivot->quantity}} Piezas</td>
                                  <td>${{$salsa->pivot->price ?? 0.00}}</td>
                                  <td>${{$salsa->pivot->price * $salsa->pivot->quantity}}.00</td>
                              </tr>
                            @endforeach
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
          </div>
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #1cc659">
                            <h3 class="card-title float-left">Registrar entrega</h3>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <div class="card-body">
                            <form role="form" id="quickForm" action="{{ url('/deliveries') }}" method="post">
                              @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                      <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Salsas Entregadas</label>
                                            <input type="number" name="total" class="form-control" placeholder="Ingrese Cantidad de Salsas">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Monto Recibido</label>
                                            <input type="number" name="mount_received" class="form-control" placeholder="Ingrese Monto">
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
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Registrar Entrega</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
