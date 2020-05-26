@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
  .custom-combobox {
   position: relative;
   display: inline-block;
  }
  .autocompleteselect{
    display: block;
  }
  .custom-combobox-toggle {
   position: absolute;
   top: 0;
   bottom: 0;
   margin-left: -1px;
   padding: 0;
  }
  .custom-combobox-input {
   margin: 0;
   padding: 5px 10px;
  }
</style>
@endsection
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
                        <div class="card-header">
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
                                            <label>Responsable de la tienda (<a href="{{url('users/create')}}">Crear usuario</a>)</label>
                                            <div class="autocompleteselect">
                                              <select id="owner" type="text" name="owner"
                                                   class="form-control">
                                                   <option value="">Selecciona un usuario...</option>
                                                   @forelse($usersList as $user)
                                                      <option value="{{$user->id}}">{{$user->name}}</option>
                                                   @empty
                                                   @endforelse
                                              <select>
                                            </div>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $.widget( "custom.combobox", {
          _create: function() {
            this.wrapper = $( "<span>" )
              .addClass( "custom-combobox" )
              .insertAfter( this.element );

            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
          },

          _createAutocomplete: function() {
            var selected = this.element.children( ":selected" ),
              value = selected.val() ? selected.text() : "";

            this.input = $( "<input>" )
              .appendTo( this.wrapper )
              .val( value )
              .attr( "title", "" )
              .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
              .autocomplete({
                delay: 0,
                minLength: 0,
                source: $.proxy( this, "_source" )
              })
              .tooltip({
                classes: {
                  "ui-tooltip": "ui-state-highlight"
                }
              });

            this._on( this.input, {
              autocompleteselect: function( event, ui ) {
                ui.item.option.selected = true;
                this._trigger( "select", event, {
                  item: ui.item.option
                });
              },

              autocompletechange: "_removeIfInvalid"
            });
          },

          _createShowAllButton: function() {
            var input = this.input,
              wasOpen = false;

            $( "<a>" )
              .attr( "tabIndex", -1 )
              .attr( "title", "Mostrar todo" )
              .tooltip()
              .appendTo( this.wrapper )
              .button({
                icons: {
                  primary: "ui-icon-triangle-1-s"
                },
                text: false
              })
              .removeClass( "ui-corner-all" )
              .addClass( "custom-combobox-toggle ui-corner-right" )
              .on( "mousedown", function() {
                wasOpen = input.autocomplete( "widget" ).is( ":visible" );
              })
              .on( "click", function() {
                input.trigger( "focus" );

                // Close if already visible
                if ( wasOpen ) {
                  return;
                }

                // Pass empty string as value to search for, displaying all results
                input.autocomplete( "buscar", "" );
              });
          },

          _source: function( request, response ) {
            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
            response( this.element.children( "option" ).map(function() {
              var text = $( this ).text();
              if ( this.value && ( !request.term || matcher.test(text) ) )
                return {
                  label: text,
                  value: text,
                  option: this
                };
            }) );
          },

          _removeIfInvalid: function( event, ui ) {

            // Selected an item, nothing to do
            if ( ui.item ) {
              return;
            }

            // Search for a match (case-insensitive)
            var value = this.input.val(),
              valueLowerCase = value.toLowerCase(),
              valid = false;
            this.element.children( "option" ).each(function() {
              if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                this.selected = valid = true;
                return false;
              }
            });

            // Found a match, nothing to do
            if ( valid ) {
              return;
            }

            // Remove invalid value
            this.input
              .val( "" )
              .attr( "title", value + " no coincide con ningún usuario" )
              .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
              this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.autocomplete( "instance" ).term = "";
          },

          _destroy: function() {
            this.wrapper.remove();
            this.element.show();
          }
        });

        $( "#owner" ).combobox();

    } );
    </script>
@endsection

@endsection
