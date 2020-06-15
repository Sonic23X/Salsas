@extends('layouts.admin')

@section('content')


  <section class="content">
      <div class="row">
          <div class="col-12">
              <div class="card">
                @if(isset($store))
                  <div class="card-header" style="background-color: #1cc659">
                      <h1 class="card-title" style="text-transform: uppercase"><strong>Tienda {{ $store->name }}</strong></h1>
                      <button type="button" class="btn btn-primary .btn-sm float-right" onclick="location.href='{{ url('/stores/'.$store->id.'/orders/create') }}'">
                        <i class="nav-icon fas fa-pepper-hot"> </i>
                        <span> Nuevo Pedido</span>
                      </button>
                  </div>
                  <div class="card-body">
                    <h2 class="text-center">Lista de pedidos realizados</h2>
                    <hr>
                    <table id="tblPedidosTienda" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>No. Pedido</th>
                          <th>Fecha de Creación</th>
                          <th>Total de Pedido</th>
                          <th>Notas</th>
                      </tr>
                      </thead>
                      <tbody>
                        @forelse( $orders as $order )
                          <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>${{ $order->mount ?? 0.00 }}</td>
                            <td>{{ ( $order->notes == '' ) ? 'N/A' : $order->notes  }}</td>
                          </tr>
                        @empty
                        @endforelse
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>No. Pedido</th>
                          <th>Fecha de Creación</th>
                          <th>Total de Pedido</th>
                          <th>Notas</th>
                          </tr>
                      </tfoot>
                    </table>
                  </div>
                @else
                  <div class="card-header" style="background-color: #1cc659">
                      <h1 class="card-title" style="text-transform: uppercase"><strong>Error</strong></h1>
                  </div>
                  <div class="card-body">
                    <p class="text-center">
                      No existe ninguna tienda registrada a su perfil
                    </p>
                    <p class="text-center">
                      <a class="btn btn-primary" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                        Salir
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </p>
                  </div>
                @endif
              </div>
              <!-- /.card -->
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>


@section('script')
  <script>
    $(function () {
        $('#tblPedidosTienda').DataTable(
        {
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          "language":
          {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
          }
        });
    });
  </script>
@endsection

@endsection
