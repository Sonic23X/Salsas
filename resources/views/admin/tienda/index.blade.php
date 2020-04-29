@extends('layouts.admin')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Tiendas</h3>
                        <button type="button" class="btn btn-primary .btn-sm float-right"
                                onclick="location.href=''">Nueva tienda
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
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
                            <tr>
                                <td>Ismael Gonzales</td>
                                <td>El Patón
                                </td>
                                <td>Libre Comercio 225 Col Palmitas. Pachuca de Soto, Hgo.</td>
                                <td>771458236</td>
                                <td><img src="./qr.png" alt="Código QR" width="150" height="150"></td>

                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs"
                                            onclick="location.href='./editarUsuario.html'">Editar
                                    </button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Brayan Asault</td>
                                <td>El Patón
                                </td>
                                <td>Libre Comercio 225 Col Palmitas. Pachuca de Soto, Hgo.</td>
                                <td>771458236</td>
                                <td><img src="./qr.png" alt="Código QR" width="150" height="150"></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Sofía Revoa</td>
                                <td>El Patón
                                </td>
                                <td>Libre Comercio 225 Col Palmitas. Pachuca de Soto, Hgo.</td>
                                <td>771458236</td>
                                <td><img src="./qr.png" alt="Código QR" width="150" height="150"></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-info btn-xs">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs"
                                            data-toggle="modal"
                                            data-target="#modal-danger">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Sam Cruz</td>
                                <td>El Patón
                                </td>
                                <td>Libre Comercio 225 Col Palmitas. Pachuca de Soto, Hgo.</td>
                                <td>771458236</td>
                                <td><img src="./qr.png" alt="Código QR" width="150" height="150"></td>
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

@endsection
