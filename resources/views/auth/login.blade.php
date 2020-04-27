
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- FavIcon -->
  <link rel="icon" href="{{ asset('img/favicon.ico') }}">

  <!-- Laravel Css -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{ asset('img/favicon.ico') }}" alt="logo"><b>{{ config('app.name', 'Laravel') }}</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form method="post" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                 name="email" value="{{ old('email') }}" required autocomplete="email"
                 placeholder="Correo electrónico" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="password" required autocomplete="current-password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Acceder</button>
          </div>

        </div>
      </form>

      @if (Route::has('password.request'))
        <p class="mb-1">
          <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
        </p>
      @endif
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<!-- JS de Laravel -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
