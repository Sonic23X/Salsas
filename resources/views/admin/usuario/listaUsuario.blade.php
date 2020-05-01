@extends('layouts.admin')

@section('content')
{{--
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    </head>
    --}}

          <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Usuarios</h1>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      @if (session('status'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
      @endif

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h3 class="card-title">Listado de Usuarios</h3>
                          <button type="button" class="btn btn-primary .btn-sm float-right"
                                  onclick="location.href='{{ url('/users/create') }}'">Nuevo Usuario
                          </button>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <table id="example2" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>Usuario</th>
                                  <th>E-mail</th>
                                  <th>Rol</th>
                                  <th>Acciones</th>
                              </tr>
                              </thead>
                              <tbody>
                                @forelse ($users as $user)
                                  <tr>
                                      <td>{{ $user->name }}</td>
                                      <td>{{ $user->email }}</td>
                                      <td>{{ $user->rol }}</td>
                                      <td>
                                          <button type="button" class="btn btn-block btn-info btn-xs"
                                                  onclick="location.href='{{ url('/users/'.$user->id.'/edit') }}'">Editar
                                          </button>
                                          <button type="button" class="btn btn-block btn-danger btn-xs"
                                                  data-toggle="modal"
                                                  data-whatever="{{$user->id}}"
                                                  data-target="#modal-danger">Eliminar
                                          </button>
                                      </td>
                                  </tr>
                                @empty
                                    <tr>
                                        <td>No hay usuarios</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                @endforelse
                              <tr>

                              </tr>
                              </tbody>
                              <tfoot>
                              <tr>
                                  <th>Usuario</th>
                                  <th>E-mail</th>
                                  <th>Rol</th>
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



    {{--
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../../plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function () {
                Toast.fire({
                    icon: 'success',
                    title: 'Registro Eliminado'
                })
            });

            $('.swalDefaultError').click(function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Registro no eliminado, ocurrió un error.'
                })
            });

        });

    </script>
    --}}
    @section('script')
    <script type="text/javascript">
    $('#modal-danger').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var user_id = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        $('#deleteForm').attr('action', '/users/'+user_id);
        })
    </script>
    @endsection

@endsection
