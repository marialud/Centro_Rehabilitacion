<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
  </head>
  <body>
    <div class="columna col-md-6 col-md-offset-3">
      <h1>Registro</h1>
      <form action="" method="POST">
        <fieldset>
          <input type="text" name="nombre" placeholder="Nombre">
        </fieldset>
        <fieldset>
          <input type="text" name="ap" placeholder="Apelidos">
        </fieldset>
          <fieldset>
            <input type="email" name="correo" value="" placeholder="Email">
          </fieldset>
          <fieldset>
            <input type="password" name="p1" value="" placeholder="Password">
          </fieldset>
          <fieldset>
            <input type="password" name="p2" value="" placeholder="Confirmar Password">
          </fieldset>
          <fieldset>
            <button type="submit" name="button">Registrar</button>
            <br>
          </fieldset>
      </form>
    </div>
    <div class="columna fondologin">

    </div>
  </body>
</html>
