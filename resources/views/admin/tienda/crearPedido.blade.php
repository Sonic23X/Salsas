@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Levantar Pedido</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #1cc659">
                            <h3 class="card-title style="text-transform: uppercase" float-left"><strong>{{strtoupper($store->name)}}</strong></h3>

                            <button type="button" class="btn btn-primary  .btn-sm float-right"
                                      onclick="location.href='{{ url('/stores/'.$store->id.'/orders') }}'">Regresar
                            </button>

                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->

                        <div class="row">
                            <div class="card-body">
                              @if ($errors->any())
                                  <div class="alert alert-danger" role="alert">
                                      <ul>
                                          @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                          @endforeach
                                      </ul>
                                  </div>
                              @endif
                              <form method="post" action="{{url('/stores/'.$store->id.'/orders')}}">
                                @csrf

                                  <table class="table table-bordered">
                                      <thead>
                                      <tr>
                                          <th style="width: 10px"></th>
                                          <th>Salsa</th>
                                          <th>Cantidad</th>
                                          <th>Costo</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        @forelse($salsas as $salsa)

                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <input class="form-check-input" style="transform: scale(1.5);"
                                                            name="salsa[{{$salsa->id}}][salsa_id]"
                                                            value="{{$salsa->id}}"
                                                             type="checkbox">
                                                  </div>
                                              </td>
                                              <td>{{$salsa->name}}</td>
                                              <td style="text-align: center;">
                                                  <input style="width: 45px; text-align: center;" name="salsa[{{$salsa->id}}][quantity]" type="number" min="1">
                                              </td>
                                              <td style="text-align: center;">
                                                <span class="badge bbg-primary">${{$salsa->price}}</span>
                                                <input type="hidden" name="salsa[{{$salsa->id}}][price]" value="{{$salsa->price}}" />
                                              </td>
                                          </tr>
                                        @empty
                                        @endforelse
                                      </tbody>
                                      <tfoot>
                                      <!-- <tr>
                                          <th></th>
                                          <th>TOTAL</th>
                                          <th>34</th>
                                          <th>$540.00</th>
                                      </tr> -->
                                      </tfoot>
                                  </table>
                                  <br>
                                  <div>
                                      <label>Notas</label>
                                      <textarea name="notes" class="form-control" rows="2" placeholder="Notas ..."></textarea>
                                  </div>
                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                                  </div>
                                      </form>
                              </div>

                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
