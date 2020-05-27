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
                        <h3 class="card-title">Detalle de pedido</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body row" >

                      <div class="col-md-6">
                        <p><strong>No. Pedido</strong>: {{$order->code}}</p>
                        <p><strong>Fecha</strong>: {{$order->created_at}}</p>
                        <p><strong>Vendedor</strong>: {{$order->seller->name}}</p>
                        <p><strong>Tienda</strong>: {{$order->store->name}}</p>
                        <p><strong>Total</strong>: ${{$order->mount ?? 0.00}}</p>
                      </div>
                      <div class="col-md-6">
                        <p><strong>Notas</strong>: {{$order->notes}}</p>
                      </div>
                    </div>

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
                              @forelse($order->salsas as $salsa)
                                <tr>
                                    <td>{{$salsa->name}}</td>
                                    <td>{{$salsa->pivot->quantity}}</td>
                                    <td>${{$salsa->pivot->price ?? 0.00}}</td>
                                </tr>
                              @empty
                              @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>TOTAL</th>
                                <th>{{count($order->salsas)}}</th>
                                <th>${{$order->total()}}</th>
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
