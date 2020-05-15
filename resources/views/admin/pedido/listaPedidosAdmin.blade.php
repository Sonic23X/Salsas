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
                        <button type="button" class="btn btn-primary .btn-sm float-right"
                                onclick="location.href=''">Nuevo Pedido
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
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
                            <tr>
                                <td>8912316516</td>
                                <td>Ismael Gonzales</td>
                                <td>Superama
                                </td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>

                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs">Detalle
                                    </button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>98645157486</td>
                                <td>Brayan Asault</td>
                                <td>El Patón
                                </td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs">Detalle
                                    </button>
                                        <button type="button" class="btn btn-block btn-danger btn-xs">Eliminar
                                        </button>
                                </td>
                            </tr>
                            <tr>
                                <td>6321254523</td>
                                <td>Sofía Revoa</td>
                                <td>De la esquina
                                </td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs">Detalle
                                    </button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs">Eliminar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>12365445</td>
                                <td>Sam Cruz</td>
                                <td>La Fama
                                </td>
                                <td>22/05/2020</td>
                                <td>$190.00</td>
                                <td>El cliente pide la entrega en 2 partes.</td>
                                <td>
                                    <button type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal"
                                            data-target="#modal-danger">Detalle
                                    </button>
                                    <button type="button" class="btn btn-block btn-danger btn-xs">Detalle
                                    </button>
                                </td>
                            </tr>
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


        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detalle de Pedido <strong>8912316516</strong></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>Salsa</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Mango</td>
                                    <td>23</td>
                                    <td>$360.00</td>
                                </tr>
                                <tr>
                                    <td>Morita</td>
                                    <td>9</td>
                                    <td>$180.00</td>
                                </tr>
                                <tr>
                                    <td>Mango</td>
                                    <td>23</td>
                                    <td>$360.00</td>
                                </tr>
                                <tr>
                                    <td>Morita</td>
                                    <td>9</td>
                                    <td>$180.00</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>TOTAL</th>
                                    <th>34</th>
                                    <th>$540.00</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer float-right">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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
