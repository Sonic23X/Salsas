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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblListaPedidoAdmin" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No. Pedido</th>
                                <th>Vendedor</th>
                                <th>Tienda</th>
                                <th>Fecha de Creación</th>
                                <th>Total de Pedido</th>
                                <th>Notas</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @forelse($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->seller->name}}</td>
                                    <td>{{$order->store->name}} </td>
                                    <td>{{$order->created_at}}</td>
                                    <td>${{$order->mount ?? 0.00}}</td>
                                    <td>{{$order->notes}}</td>

                                    <td>
                                        <button type="button"
                                                class="btn btn-block btn-primary btn-xs"
                                                onclick='location.href="{{url("/orders/{$order->id}")}}"'>
                                                Detalle
                                        </button>
                                        <button type="button"
                                                class="btn btn-block btn-danger btn-xs"
                                                data-toggle="modal"
                                                data-target="#deleteModal"
                                                data-order="{{$order->id}}"
                                                data-code="{{$order->id}}">
                                                Eliminar
                                        </button>
                                    </td>

                                </tr>
                              @empty
                              @endforelse

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No. Pedido</th>
                                <th>Vendedor</th>
                                <th>Tienda</th>
                                <th>Fecha de Creación</th>
                                <th>Total de Pedido</th>
                                <th>Notas</th>
                                <th>Acciones</th>
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


        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                <div class="modal-header">
                        <h4 class="modal-title">Cancelar Pedido <strong id="codeOrder"></strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Deseas eliminar el pedido?</p>
                    </div>

                    <div class="modal-footer float-right">
                        <form id="deleteForm"  method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">
                              Cancelar
                            </button>
                            <button type="submit" class="btn btn-outline-light swalDefaultSuccess" >
                              Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>
@endsection

@section('script')

    <!-- page script -->
    <script type="text/javascript">

        $('#tblListaPedidoAdmin').DataTable({
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

        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var order_id = button.data('order')
            var code = button.data('code') // Extract info from data-* attributes
            $('#codeOrder').html(code);
            $('#deleteForm').attr('action', '/orders/'+order_id);
        })
    </script>
@endsection
