@extends('layouts.admin')

@section('content')
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Editar Usuario</h1>
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
                              <h3 class="card-title float-left">Editar Usuario</h3>

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
                            <form role="form" action="{{ url('/users/'.$user->id) }}" id="quickForm" method="post">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="row">
                                    <div class="col-sm-6">

                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="Ingrese Nombre de Usuario"
                                                   value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="Ingrese E-mail"
                                                   value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tipo de Usuario</label>
                                            <select class="form-control" name="rol">
                                                <option value="repartidor" {{ ($user->rol == 'repartidor') ? 'selected' : '' }}>Repartidor</option>
                                                <option value="admin" {{ ($user->rol == 'admin') ? 'selected' : '' }}>Administrador</option>
                                                <option value="vendedor" {{ ($user->rol == 'vendedor') ? 'selected' : '' }}>Vendedor</option>
                                                <option value="tienda" {{ ($user->rol == 'tienda') ? 'selected' : '' }}>Tienda</option>
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
                        alert("Actualizado con éxito");
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
                    },
                    messages: {
                        name: {
                            required: "Por favor ingrese un nombre de usuario",
                        },
                        email: {
                            required: "Por favor ingrese un email.",
                            email: "Por favor ingrese un email válido"
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
