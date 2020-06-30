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

                            @if(isset($store))
                                <h3 class="card-title style="text-transform: uppercase" float-left"><strong>{{strtoupper($store->name)}}</strong></h3>
                                <button type="button" class="btn btn-primary  .btn-sm float-right"
                                          onclick="location.href='{{ url('/stores/'.$store->id.'/orders') }}'">Regresar
                                </button>
                            @else
                              @if ( request()->user()->is_admin )
                                <button type="button" class="btn btn-primary  .btn-sm float-right"
                                          onclick="location.href='{{ url('/orders') }}'">Regresar
                                </button>
                              @else
                              <button type="button" class="btn btn-primary  .btn-sm float-right"
                                        onclick="location.href='{{ url('/dashboard') }}'">Regresar
                              </button>
                              @endif

                            @endif


                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->

                        <div class="row">
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
                              <form method="post"
                                @if(isset($store))
                                      action="{{url('/stores/'.$store->id.'/orders')}}"
                                @else
                                      action="{{url('/orders')}}"
                                @endif
                                >
                                @csrf

                                @if(isset($store))
                                @else

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                          <label>Tienda </label>
                                          <div class="autocompleteselect">
                                            <select id="store" type="text" name="store"
                                                 class="form-control">
                                                 <option value="">Selecciona una tienda...</option>
                                                 @forelse($stores as $storeSelect)
                                                    <option value="{{$storeSelect->id}}">{{$storeSelect->name}}</option>
                                                 @empty
                                                    <option value="">No hay tiendas registradas</option>
                                                 @endforelse
                                            <select>
                                          </div>
                                        </div>
                                    </div>
                                @endif



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
                                        @forelse($salsas as $salsa)

                                          <tr>
                                              <td>
                                                  <div class="form-check">
                                                      <input class="form-check-input" style="transform: scale(1.5);"
                                                            name="salsa[{{$salsa->id}}][salsa_id]"
                                                            value="{{$salsa->id}}"
                                                             type="checkbox">
                                                  </div>
                                              </td>
                                              <td>{{$salsa->name}}</td>
                                              <td style="text-align: center;">
                                                  <input style="width: 45px; text-align: center;" name="salsa[{{$salsa->id}}][quantity]" type="number" min="1">
                                              </td>
                                              <td style="text-align: center;">
                                                <span class="badge bbg-primary">${{$salsa->price}}</span>
                                                <input type="hidden" name="salsa[{{$salsa->id}}][price]" value="{{$salsa->price}}" />
                                              </td>
                                          </tr>
                                        @empty
                                        @endforelse
                                      </tbody>
                                      <tfoot>
                                      <!-- <tr>
                                          <th></th>
                                          <th>TOTAL</th>
                                          <th>34</th>
                                          <th>$540.00</th>
                                      </tr> -->
                                      </tfoot>
                                  </table>
                                  <br>
                                  <div>
                                      <label>Notas</label>
                                      <textarea name="notes" class="form-control" rows="2" placeholder="Notas ..."></textarea>
                                  </div>
                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                                  </div>
                                      </form>
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


@section('script')

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

        $( "#store" ).combobox();

    } );
    </script>
@endsection
