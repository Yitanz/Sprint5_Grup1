<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/img/icon.png">

    <title>Parc Atraccions Univeylandia</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('home') }}">
                        <img class="img-rounded img-responsive mb-4 mt-4" src="/img/univeylandia_logo_petit.png" alt="logo">
                    </a>
                </div>

                <div class="card">

                    <div class="card-header h4 font-weight-bold" style="background-color: transparent;">{{
                        __('Editar Contrasenya') }}</div>

                    <div class="card-body">

                        <form action="{{ route('updatePassword', Auth::user()->id)}}" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="password_old" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Contrasenya Anterior')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input  type="password" class="form-control{{ $errors->has('password_old') ? ' is-invalid' : '' }}"
                                        name="password_old" placeholder="Introdueix la contrasenya actual" required>

                                    @if ($errors->has('password_old'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_old') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Contrasenya Nova')
                                    }}</label>

                                <div class="col-sm-6">
                                    <input  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" placeholder="Mínim de 6 caràcters" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-sm-4 col-form-label text-sm-right font-weight-bold">{{
                                    __('Confirmar contrasenya') }}</label>

                                <div class="col-sm-6">
                                    <input  type="password" class="form-control" name="password_confirmation"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-sm-6 offset-sm-4">
                                    <button type="submit" class="btn btn-success" onclick="regexDNI()">
                                        {{ __('Modificar') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
  function nif(dni) {
    numero = dni.substr(0,dni.length-1);
    let = dni.substr(dni.length-1,1);
    numero = numero % 23;
    letra='TRWAGMYFPDXBNJZSQVHLCKET';
    letra=letra.substring(numero,numero+1);
    if (letra!=let)
      alert('Dni erroneo');
  }

</script>
