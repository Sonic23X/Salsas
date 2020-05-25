@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tienda: {{ $store->name }}</h1>
                    <h2>{lista de salsas a entregar}</h2>
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
                        <div class="card-header">
                            <h3 class="card-title float-left">Registrar entrega</h3>

                            <button type="button" class="btn btn-primary  .btn-sm float-right"
                                    onclick="location.href='./listaUsuarios.html'">Regresar</button>

                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <div class="card-body">
                            <form role="form" id="quickForm">

                                <div class="row">
                                    <div class="col-sm-6">

                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Salsas Entregadas</label>
                                            <input type="number" name="user" class="form-control" placeholder="Ingrese Cantidad de Salsas">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Monto Recibido</label>
                                            <input type="email" name="email" class="form-control" placeholder="Ingrese Monto">
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
