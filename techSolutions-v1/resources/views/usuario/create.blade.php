<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de nuevo usuario</title>
</head>
<body>
    <h1>Ingrese sus datos</h1>
    <form action="" method="POST">
        <input type="text" name="nombre" placeholder="Ingrese su nombre">
        <input type="text" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="password" name="rePassword" placeholder="Ingrese nuevamente su contraseña">
        <input type="text" name="dayCode" placeholder="Ingrese código del día">
        <button type="submit">Registrar</button>
    </form>
    <hr>
    Si usted ya tiene una cuenta, entonces <a href="/login">inicie sesión</a>
</body>
</html>