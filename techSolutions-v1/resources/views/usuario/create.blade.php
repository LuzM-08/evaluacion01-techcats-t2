<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de nuevo usuario</title>
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</head>

<body>
    <form action="{{ Route('usuario.registrar') }}" method="POST">
        <div class="container text-center">
            <!-- Errores -->
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <h1 class="justify-content-center mt-3 mb-3">Ingrese sus datos</h1>
            <div class="row justify-content-center">
                @csrf
                <div class="col-6 mb-3">
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Ingrese su email">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-3 mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                </div>
                <div class="col-3 mb-3">
                    <input type="password" class="form-control" name="rePassword"
                        placeholder="Ingrese nuevamente su contraseña">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 mb-3">
                    <input type="password" class="form-control" name="dayCode" placeholder="Ingrese código del día">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Registrar</button>
            <p>Si usted ya tiene una cuenta, entonces <a href="/login">inicie sesión</a></p>
        </div>
    </form>
    </div>
    </div>
</body>

</html>
