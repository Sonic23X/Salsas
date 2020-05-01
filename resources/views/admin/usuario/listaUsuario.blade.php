@extends('layouts.admin')

@section('content')


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
                             {{--<tbody>
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
                              --}}
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
