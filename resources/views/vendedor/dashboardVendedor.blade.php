@extends('layouts.admin')

@section('content')

  <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">

          </div>
      </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="row">
          <div class="col-12">
              <div class="card">
                <div class="card-header" style="background-color: #1cc659">
                    <h1 class="card-title" style="text-transform: uppercase"><strong></strong></h1>
                </div>
                <div class="card-body">
                  <h2 class="text-center">Acciones rápidas</h2>
                  <hr>
                  <div class="row">
                    <div class="col-sm">
                      <a href="{{ url('/users/create') }}" class="btn btn-block btn-primary">
                        <i class="fas fa-user-plus"></i>
                        Registrar usuario
                      </a>
                    </div>
                    <div class="col-sm">
                      <a href="{{ url('/stores/create') }}" class="btn btn-block btn-primary">
                        <i class="fas fa-store-alt"></i>
                        Registrar tienda
                      </a>
                    </div>
                    <div class="col-sm">
                      <a href="{{ url('/orders/create') }}" class="btn btn-block btn-primary">
                        <i class="far fa-clipboard"></i>
                        Registrar pedido
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>


@section('script')
  <script>
    $(function ()
    {

    });
  </script>
@endsection

@endsection
