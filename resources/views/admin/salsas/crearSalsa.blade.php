@extends('layouts.admin')

@section('content')
    {{--<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    </head>
    --}}

    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Agregar Salsa</h1>
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
                                <div class="card-header">
                                    <h3 class="card-title float-left">Registrar Salsa</h3>

                                    <button type="button" class="btn btn-primary  .btn-sm float-right"
                                            onclick="location.href='./ListaSalsa.html'">Regresar
                                    </button>

                                </div>
                                <!-- /.card-header -->

                                <!-- form start -->
                                <div class="card-body">
                                    <form role="form">

                                        <div class="row">
                                            <div class="col-sm-6">

                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Ingrese Nombre de Salsa">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Características</label>
                                                    <input type="email" name="features" class="form-control"
                                                           placeholder="Seleccione carácteristicas">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">

                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Precio</label>
                                                    <input type="number" name="price" class="form-control"
                                                           placeholder="Ingrese Precio">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card -->

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
{{--
    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../../plugins/toastr/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>

    <script type="text/javascript">
        function redireccionar() {
            setTimeout("location.href='./listaUsuarios.html'", 2300);
        }
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
                    title: '¡Usuario Registrado!'
                })
            });

            $('.swalDefaultError').click(function () {
                Toast.fire({
                    icon: 'error',
                    title: 'Usuario no Registrado, ocurrió un error.'
                })
            });

        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert("Correctamente registrado");
                    window.location.href = "listausuarios.html";
                }
            });
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    features: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Por favor ingrese un nombre",
                    },
                    features: {
                        required: "Por favor seleccione un característica.",
                    },
                    price: {
                        required: "Por favor ingrese un precio",
                    },

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    --}}

    </body>
@endsection
