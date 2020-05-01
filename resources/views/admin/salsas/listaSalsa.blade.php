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

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Salsas</h3>
                        <button type="button" class="btn btn-primary .btn-sm float-right"
                                onclick="location.href='#'">Registrar Salsa
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Características</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>BBQ</td>
                                <td>-----
                                </td>
                                <td>$125.00</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs"
                                            onclick="location.href='#'">Editar
                                    </button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Verde</td>
                                <td>-----
                                </td>
                                <td>$125.00</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Roja</td>
                                <td>-----
                                </td>
                                <td>$125.00</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Brava</td>
                                <td>-----
                                </td>
                                <td>$125.00</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
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
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar
                        </button>
                        <button type="button" class="btn btn-outline-light"
                                data-dismiss="modal">Eliminar
                        </button>
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
