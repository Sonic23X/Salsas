<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FavIcon -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Laravel Css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')

  </head>
  <body class="hold-transition sidebar-mini">

    <div class="wrapper">

      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              Bienvenido, {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                Salir
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </nav>

      <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #1d1711 !important;">
        <!-- Logo -->
        <a href="#" class="brand-link">
          <img src="{{ asset('img/favicon.ico') }}" alt="Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light">Salsas</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{ asset('img/profile.svg') }}" class="img-circle elevation-2" alt="User">
            </div>
            <div class="info">
              <a href="#" class="d-block">User</a>
            </div>
          </div>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              @if( request()->user()->is_admin )
              <li class="nav-item">
                <a href="{{ url('/users') }}" class="nav-link {{ (request()->is('users*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuarios
                  </p>
                </a>
              </li>
              @endif
              @if( !request()->user()->is_delivery )
              <li class="nav-item">
                <a href="{{ url('/stores') }}" class="nav-link {{ (request()->is('stores*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-store"></i>
                  <p>
                    Tiendas
                  </p>
                </a>
              </li>
              @endif
              @if( !request()->user()->is_delivery )
              <li class="nav-item">
                <a href="{{ url('/orders') }}" class="nav-link">
                  <i class="nav-icon fas fa-clipboard"></i>
                  <p>
                    Pedidos
                  </p>
                </a>
              </li>
              @endif
              @if( !request()->user()->is_delivery )
              <li class="nav-item">
                <a href="{{ url('/deliveries') }}" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                  <p>
                    Entregas
                  </p>
                </a>
              </li>
              @endif
              @if( !request()->user()->is_delivery )
              <li class="nav-item">
                <a href="{{ url('/salsas') }}" class="nav-link {{ (request()->is('salsas*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-pepper-hot"></i>
                  <p>
                    Productos
                  </p>
                </a>
              </li>
              @endif
            </ul>
          </nav>
        </div>
      </aside>

      <div class="content-wrapper">
        @yield('content')
      </div>

      <footer class="main-footer">
        <div class="float-right d-none d-sm-inline">
          Anything you want
        </div>
          <strong>Copyright &copy; 2014-2019 All rights reserved.</strong>
      </footer>

    </div>

    <!-- JS de Laravel -->
    <script src="{{ asset('js/app.js') }}"></script>


    @yield('script')
  </body>
</html>
