@extends('layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Agregar Tienda</h1>
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
                            <h3 class="card-title float-left">Registrar Tienda</h3>

                            <button type="button" class="btn btn-primary  .btn-sm float-right"
                                    onclick="location.href='{{ url('/stores') }}'">Regresar
                            </button>

                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" action="{{ url('/stores') }}" id="quickForm" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Dueño</label>
                                            <input id="owner" type="text" name="owner"
                                                   class="form-control"
                                                   placeholder="Ingrese Nombre del Dueño">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nombre del Establecimiento</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Ingrese nombre del establecimiento.">
                                        </div>
                                    </div>
                                </div>
                                <h5>Dirección de Establecimiento</h5>
                                <div class="row">

                                    <div class="col-sm-2">

                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Calle</label>
                                            <input type="text" name="street" class="form-control"
                                                   placeholder="Ingrese Calle">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Número</label>
                                            <input type="number" name="number" class="form-control"
                                                   placeholder="Ingrese Número">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Colonia</label>
                                            <input type="text" name="suburb" class="form-control"
                                                   placeholder="Ingrese Colonia">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" name="state" class="form-control"
                                                   placeholder="Ingrese Estado">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Código Postal</label>
                                            <input type="number" name="postal" class="form-control"
                                                   placeholder="Ingrese C.P.">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Teléfono</label>
                                            <input type="number" name="phone" class="form-control"
                                                   placeholder="Ingrese Teléfono">
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            /*$.validator.setDefaults({
                submitHandler: function () {
                    alert("Correctamente registrado");
                    window.location.href = "listausuarios.html";
                }
            });*/
            $('#quickForm').validate({
                rules: {
                    owner: {
                        required: true,
                    },
                    place: {
                        required: true,
                    },
                    street: {
                        required: true,
                    },
                    number: {
                        required: true,
                    },
                    suburb: {
                        required: true,
                    },
                    state: {
                        required: true
                    },
                    postal: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        minlength: 7,
                    },
                },
                messages: {
                    owner: {
                        required: "Por favor ingrese el nombre del dueño",
                    },
                    place: {
                        required: "Por favor ingrese el nombre del establecimiento.",
                    },
                    street: {
                        required: "Por favor ingrese la calle",
                    },
                    number: {
                        required: "Por favor ingrese el número",
                    },
                    suburb: {
                        required: "Por favor ingrese la colonia",
                    },
                    state: {
                        required: "Por favor ingrese el estado",
                    },
                    postal: {
                        required: "Por favor ingrese el código postal",
                    },
                    phone: {
                        required: "Por favor ingrese número de teléfono",
                        minlegth: "El teléfono debe ser de al menos 7 números",
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
@endsection

@endsection
