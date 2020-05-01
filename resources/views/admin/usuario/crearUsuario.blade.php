@extends('layouts.admin')

@section('content')

      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Agregar Usuario</h1>
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
                              <h3 class="card-title float-left">Nuevo Usuario</h3>

                              <button type="button" class="btn btn-primary  .btn-sm float-right"
                                      onclick="location.href='{{ url('/users') }}'">Regresar
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
                              <form role="form" action="{{ url('/users') }}" id="quickForm" method="post">
                                  @csrf
                                  <div class="row">
                                      <div class="col-sm-6">

                                          <!-- text input -->
                                          <div class="form-group">
                                              <label>Nombre</label>
                                              <input type="text" name="name" class="form-control"
                                                     placeholder="Ingrese Nombre de Usuario">
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>E-mail</label>
                                              <input type="email" name="email" class="form-control"
                                                     placeholder="Ingrese E-mail">
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <!-- text input -->
                                          <div class="form-group">
                                              <label>Contraseña</label>
                                              <input type="password" name="password" id="password" class="form-control"
                                                     placeholder="Ingrese Contraseña">
                                          </div>
                                      </div>
                                      <div class="col-sm-6">
                                          <!-- text input -->
                                          <div class="form-group">
                                              <label>Confirmar contraseña</label>
                                              <input type="password" name="c_password" id="c_password" class="form-control"
                                                     placeholder="Ingrese Contraseña">
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-sm-6">
                                          <div class="form-group">
                                              <label>Tipo de Usuario</label>
                                              <select class="form-control" name="rol">
                                                  <option value="repartidor">Repartidor</option>
                                                  <option value="admin">Administrador</option>
                                                  <option value="vendedor">Vendedor</option>
                                                  <option value="tienda">Tienda</option>
                                              </select>
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
                       email: {
                           required: true,
                           email: true,
                       },
                       password: {
                           required: true,
                           minlength: 8
                       },
                       c_password: {
                           required: true,
                           equalTo: "#password"
                       }
                   },
                   messages: {
                       name: {
                           required:"Por favor ingrese un nombre de usuario",
                       },
                       email: {
                           required: "Por favor ingrese un email.",
                           email: "Por favor ingrese un email válido"
                       },
                       password: {
                           required: "Por favor ingrese un contraseña",
                           minlength: "La contraseña debe tener al menos 8 caracteres"
                       },
                       c_password: {
                           required: "Por favor confirme contraseña",
                           equalTo: "Las contraseñas no coinciden"
                       }

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
