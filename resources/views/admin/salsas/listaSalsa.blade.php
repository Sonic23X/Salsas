@extends('layouts.admin')

@section('content')
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

    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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
                                        onclick="location.href='./crearSalsa.html'">Registrar Salsa
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
                                                    onclick="location.href='./editarSalsa.html'">Editar
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
                                <button type="button" class="btn btn-outline-light swalDefaultSuccess"
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
        </div>

    </div>
    <!-- ./wrapper -->

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

    </body>

@endsection
