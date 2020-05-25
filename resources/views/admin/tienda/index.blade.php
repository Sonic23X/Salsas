@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Tiendas</h3>
                        <button type="button" class="btn btn-primary .btn-sm float-right"
                                onclick="location.href='{{ url('/stores/create') }}'">Nueva tienda
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" name="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Dueño</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Código QR</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($tiendas as $tienda)
                                <tr>
                                    <td>{{ $tienda->user()->name }}</td>
                                    <td>{{ $tienda->name }}</td>
                                    <td>
                                        {{ $tienda->street }} {{ $tienda->number }}, {{ $tienda->suburb }}
                                        , {{ $tienda->state }}, CP {{ $tienda->postal }}
                                    </td>
                                    <td>{{ $tienda->phone }}</td>
                                    <td>
                                      <a href="{{ url('/stores/getQr') }}/{{ $tienda->id }}" class="btn btn-info ml-5 mt-5">
                                        Descargar código QR
                                      </a>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-block btn-info btn-xs"
                                                onclick="location.href='{{ url('/stores/'.$tienda->id.'/orders') }}'">
                                                Pedidos
                                        </button>
                                        <button type="button" class="btn btn-block btn-info btn-xs"
                                                onclick="location.href='{{ url('/stores/'.$tienda->id.'/edit') }}'">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-block btn-danger btn-xs"
                                                data-toggle="modal"
                                                data-whatever="{{$tienda->id}}"
                                                data-target="#modal-danger">Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No hay tiendas</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Dueño</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Código</th>
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
        <div class="modal fade" id="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Estás a punto de eliminar el registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Deseas eliminar el registro?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <form id="deleteForm" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-outline-light swalDefaultSuccess">
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
        });

    </script>

    <script type="text/javascript">
        $('#modal-danger').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var store_id = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            $('#deleteForm').attr('action', '/stores/' + store_id);
        });
    </script>

@endsection

@endsection
