@extends('layouts.admin')

@section('content')

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
                                  onclick="location.href='{{ url('/salsas') }}'">Regresar
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
                          <form role="form" action="{{ url('/salsas') }}" id="quickForm" method="post">
                              @csrf

                              <div class="row">
                                  <div class="col-sm-6">
                                      <!-- text input -->
                                      <div class="form-group">
                                          <label>Nombre</label>
                                          <input id="name" type="text" name="name"  class="form-control @error('name', 'cSausage') is-invalid @enderror"
                                                 placeholder="Ingrese Nombre de Salsa">

                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Características</label>
                                          <input type="text" name="description" class="form-control"
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
                    name: {
                        required: true,
                    },
                    description: {
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
                    description: {
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
@endsection

@endsection
