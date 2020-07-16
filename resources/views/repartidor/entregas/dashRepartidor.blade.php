@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>¡Hola {{ Auth::user()->name  }}!</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $entregas }}</h3>

                        <p>Entregadas Hechas</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>${{ $dinero }} </h3>

                        <p>Dinero Recibido</p>
                    </div>
                </div>
            </div>
            <!-- ./col -->


        </div>
        <div class="row">
          <label class="btn btn-primary btn-block" style="display: inline-block; cursor: pointer;">
            <i class="fas fa-qrcode"></i>
            Registrar entrega
            <input type=file
                   accept="image/*"
                   capture=environment
                   onChange="scanQR(this);"
                   tabindex=-1
                   style="position: absolute; overflow: hidden; opacity: 0;"
                   />
          </label>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    @section('script')

    <script type="text/javascript" src="{{ asset('js/qr_packed.js') }}"></script>

    <!-- Análisis del QR -->
    <script type="text/javascript">

      function scanQR(node)
      {
        let reader = new FileReader();

        reader.onload = function()
        {
          node.value = "";
          qrcode.callback = function(res)
          {
            if ( !( res instanceof Error ) )
            {
              //console.log( res );
              window.location.href = `{{ url('/deliveries/setDelivery') }}/${res}`;
            }
            else
            {
              console.log( res );
              alert("Error al escanear el QR. Intente de nuevo");
            }
          };
          qrcode.decode(reader.result);
        };
        reader.readAsDataURL(node.files[0]);
      }

    </script>

    @endsection

@endsection
