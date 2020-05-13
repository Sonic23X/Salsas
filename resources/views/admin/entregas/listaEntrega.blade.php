@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Entregas</h1>
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
                        <div class="row">
                            <div class="col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>150</h3>

                                        <p>Salsas Entregadas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>$1035</h3>

                                        <p>Total Ganancias</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Repartidor</th>
                                <th>Fecha Entrega</th>
                                <th>Monto Recibido</th>
                                <th>Total de Entrega</th>
                                <th>Notas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>23456</td>
                                <td>Juan Fernando Perez</td>
                                <td>12/05/2020</td>
                                <td>$350.00</td>
                                <td>$362.00</td>
                                <td>Quedaban pendiente 2 salsas</td>
                            </tr>
                            <tr>
                                <td>23456</td>
                                <td>Juan Fernando Perez</td>
                                <td>12/05/2020</td>
                                <td>$350.00</td>
                                <td>$362.00</td>
                                <td>Quedaban pendiente 2 salsas</td>
                            </tr>
                            <tr>
                                <td>23456</td>
                                <td>Juan Fernando Perez</td>
                                <td>12/05/2020</td>
                                <td>$350.00</td>
                                <td>$362.00</td>
                                <td>Quedaban pendiente 2 salsas</td>
                            </tr>
                            <tr>
                                <td>23456</td>
                                <td>Juan Fernando Perez</td>
                                <td>12/05/2020</td>
                                <td>$350.00</td>
                                <td>$362.00</td>
                                <td>Quedaban pendiente 2 salsas</td>
                            </tr>
                            <tr>
                                <td>23456</td>
                                <td>Juan Fernando Perez</td>
                                <td>12/05/2020</td>
                                <td>$350.00</td>
                                <td>$362.00</td>
                                <td>Quedaban pendiente 2 salsas</td>
                            </tr>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Pedido</th>
                                <th>Repartidor</th>
                                <th>Fecha Entrega</th>
                                <th>Monto Recibido</th>
                                <th>Total de Entrega</th>
                                <th>Notas</th>
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
@section('script')
    <!-- page script -->
    <script type="text/javascript">

        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    </script>
@endsection


@endsection
