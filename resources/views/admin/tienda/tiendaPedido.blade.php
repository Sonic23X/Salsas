  @extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #1cc659">
                        <h1 class="card-title" style="text-transform: uppercase">
                            <strong>{{$store->name}}</strong>
                        </h1>
                        <button type="button"
                                class="btn btn-primary btn-sm float-right"
                                onclick="location.href='{{ url('/stores/'.$store->id.'/orders/create') }}'">
                            Levantar Pedido
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblPedido" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No. Pedido</th>
                                <th>Vendedor</th>
                                <th>Fecha de Creación</th>
                                <th>Total de Pedido</th>
                                <th>Notas</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                              @forelse($store->orders as $order)
                                <tr>
                                  <td>{{$order->code}}</td>
                                  <td>{{$order->seller->name}}</td>
                                  <td>{{$order->created_at}}</td>
                                  <td>${{$order->mount ?? 0.00}}</td>
                                  <td>{{$order->notes}}</td>

                                    <td>
                                        <button type="button"
                                                class="btn btn-block btn-primary btn-xs"
                                                  onclick='location.href="{{url("/stores/{$store->id}/orders/{$order->id}")}}"'>
                                                Editar
                                        </button>
                                        <button type="button"
                                                class="btn btn-block btn-danger btn-xs"   data-toggle="modal"
                                                  data-target="#deleteModal"
                                                  data-order="{{$order->id}}"
                                                  data-code="{{$order->code}}">
                                                  Cancelar
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
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Estás a punto de <strong>cancelar</strong> el pedido</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Deseas cancelar el pedido?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <form id="deleteForm"  method="post">
                          @csrf
                          @method('delete')
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">
                            Cerrar
                          </button>
                          <button type="submit" class="btn btn-outline-light swalDefaultSuccess" >
                            Cancelar Pedido
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
    <!-- /.content -->

@section('script')
    <script>
        $(function () {
            $('#tblPedido').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
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


@endsection
