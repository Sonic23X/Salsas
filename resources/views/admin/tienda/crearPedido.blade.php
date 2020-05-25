@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Levantar Pedido</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #1cc659">
                            <h3 class="card-title float-left"><strong>{{$store->name}}</strong></h3>

                            <button type="button" class="btn btn-primary  .btn-sm float-right"
                                    onclick="location.href=''">Regresar
                            </button>

                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->

                        <div class="row">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px"></th>
                                        <th>Salsa</th>
                                        <th>Cantidad</th>
                                        <th>Costo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Jamaica</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Guajillo</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Pasilla</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Mora</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Tamarindo</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Piña</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Árbol</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Mango</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Jalapeño</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" style="transform: scale(1.5);"
                                                       type="checkbox">
                                            </div>
                                        </td>
                                        <td>Chipote</td>
                                        <td style="text-align: center;">
                                            <input style="width: 45px; text-align: center;" type="number" min="1">
                                        </td>
                                        <td style="text-align: center;"><span class="badge bbg-primary">$60.00</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th>TOTAL</th>
                                        <th>34</th>
                                        <th>$540.00</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <div>
                                    <label>Notas</label>
                                    <textarea class="form-control" rows="2" placeholder="Notas ..."></textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                                </div>
                            </div>

                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>


@endsection
