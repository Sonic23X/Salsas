@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Salsas</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style="background-color: #1cc659">
                        <h3 class="card-title">Listado de Salsas</h3>
                        <button type="button" class="btn btn-primary .btn-sm float-right"
                                onclick="location.href='{{ url('/salsas/create') }}'">Registrar Salsa
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tblListaSalsa" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Características</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($salsas as $salsa)
                              <tr>
                                  <td>{{ $salsa->name }}</td>
                                  <td>{{ $salsa->description }}</td>
                                  <td>${{ $salsa->price }}</td>
                                  <td>
                                      <button type="button" class="btn btn-block btn-primary btn-xs">Activar</button>
                                      <button type="button" class="btn btn-block btn-primary btn-xs"
                                              onclick="location.href='{{ url('/salsas/'.$salsa->id.'/edit') }}'">Editar
                                      </button>
                                      <button type="button" class="btn btn-block btn-danger btn-xs"
                                              data-toggle="modal"
                                              data-whatever="{{$salsa->id}}"
                                              data-target="#modal-danger">Eliminar
                                      </button>
                                  </td>
                              </tr>
                            @empty
                                <tr>
                                    <td>No hay salsas</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Caracteristicas</th>
                                <th>Precio</th>
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
    <!-- /.content -->

@section('script')
    <script type="text/javascript">

    $('#tblListaSalsa').DataTable({
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
    <script type="text/javascript">
        $('#modal-danger').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var salsa_id = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            $('#deleteForm').attr('action', '/salsas/'+salsa_id);
        })
    </script>

@endsection


@endsection
