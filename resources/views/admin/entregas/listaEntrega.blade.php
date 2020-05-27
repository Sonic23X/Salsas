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
                                        <h3>{{$salsas}}</h3>

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
                                        <h3>${{$mount}}</h3>

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
                        <table id="tblListaEntrega" class="table table-bordered table-striped">
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
                              @forelse($deliveries as $delivery)
                                <tr>
                                    <td>{{$delivery->id}}</td>
                                    <td>{{$delivery->man->name}}</td>
                                    <td>{{$delivery->created_at}}</td>
                                    <td>${{$delivery->mount_received ?? 0.00}}</td>
                                    <td>${{$delivery->total ?? 0.00}}</td>
                                    <td>{{$delivery->note}}</td>
                                </tr>
                              @empty
                              @endforelse
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

        $('#tblListaEntrega').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

    </script>
@endsection


@endsection
