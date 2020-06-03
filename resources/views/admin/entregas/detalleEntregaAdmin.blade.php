@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Entrega No. {{ $delivery->id }}</h1>
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
                        <h3 class="card-title">Detalles de la entrega</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body row" >

                      <div class="col-md-6">
                        <p><strong>No. Pedido entregado</strong>: {{$order->id}}</p>
                        <p><strong>Fecha de entrega</strong>: {{$delivery->delivery_date}}</p>
                        <p><strong>Repartidor</strong>: {{ $delivery->man->name }}</p>
                        <p><strong>Tienda</strong>: {{$order->store->name}}</p>
                        <p><strong>Total estimado</strong>: ${{$order->mount ?? 0.00}}</p>
                        <p><strong>Total</strong>: ${{ $delivery->total ?? 0.00}}</p>
                      </div>
                      <div class="col-md-6">
                        <p><strong>Notas</strong>: {{$delivery->notes}}</p>
                      </div>
                    </div>



                    <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                            <tr>
                                <th>Salsa</th>
                                <th>Cantidad a entregar</th>
                                <th>Cantidad entregada</th>
                                <th>c/u</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                              @forelse($delivery->salsas as $salsa)
                                <tr>
                                    <td>{{ $salsa->name }}</td>
                                    <td>{{ $order->salsas[$loop->iteration - 1 ]->pivot->quantity }}</td>
                                    <td>{{ $salsa->pivot->quantity }}</td>
                                    <td>${{ $salsa->pivot->price ?? 0.00 }}</td>
                                    <td>${{ $salsa->pivot->price * $salsa->pivot->quantity }}</td>
                                </tr>
                              @empty
                              @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>TOTAL</th>
                                <th></th>
                                <th>{{ $delivery->getDeliveredSalsas() }}</th>
                                <th></th>
                                <th>${{ $delivery->total() }}</th>
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });

    </script>
@endsection
@endsection
