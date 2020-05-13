@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pedidos</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Pedidos</h3>
                        <button type="button" class="btn btn-primary .btn-sm float-right" onclick="location.href=''">
                            Nuevo
                            Pedido
                        </button>
                    </div>
                    <!-- /.card-header -->


                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Salsa</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Mango</td>
                                <td>23</td>
                                <td>$360.00</td>
                            </tr>
                            <tr>
                                <td>Morita</td>
                                <td>9</td>
                                <td>$180.00</td>
                            </tr>
                            <tr>
                                <td>Mango</td>
                                <td>23</td>
                                <td>$360.00</td>
                            </tr>
                            <tr>
                                <td>Morita</td>
                                <td>9</td>
                                <td>$180.00</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>TOTAL</th>
                                <th>34</th>
                                <th>$540.00</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


    </section>
    <!-- /.content -->
@endsection
