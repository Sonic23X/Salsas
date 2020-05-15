@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>¡Hola Ruben Aguirre!</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>6</h3>

                        <p>Entregadas Hechas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>$1205</h3>

                        <p>Dinero Recibido</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->


        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary btn-block">Registrar Entrega</button>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
