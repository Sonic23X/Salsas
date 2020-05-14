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
                    <div class="card-header">
                        <h1 class="card-title" style="text-transform: uppercase"><strong>El patón</strong></h1>
                        <button type="button" class="btn btn-primary .btn-sm float-right" onclick="location.href=''">Levantar
                            Pedido</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
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
                            <tr>
                                <td>8912316516</td>
                                <td>Ismael Gonzales</td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>

                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal"
                                            data-target="#modal-lg">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal"
                                            data-target="#modal-danger">Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>98645157486</td>
                                <td>Brayan Asault</td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal"
                                            data-target="#modal-lg">Editar</button>

                                    <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal"
                                            data-target="#modal-danger">Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>6321254523</td>
                                <td>Sofía Revoa</td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal"
                                            data-target="#modal-lg">Editar</button>

                                    <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal"
                                            data-target="#modal-danger">Cancelar</button>
                                </td>
                            </tr>
                            <tr>
                                <td>12365445</td>
                                <td>Sam Cruz</td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal"
                                            data-target="#modal-lg">Editar</button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs" data-toggle="modal"
                                            data-target="#modal-danger">Cancelar</button>
                                </td>
                            </tr>
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

        <div class="modal fade" id="modal-danger">
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
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-outline-light swalDefaultSuccess"
                                data-dismiss="modal">Cancelar Pedido</button>
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
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>




@endsection


@endsection
