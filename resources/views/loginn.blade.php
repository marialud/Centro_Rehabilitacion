<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
  </head>
  <body>


      <form class="form">
      <h1> Centro de Rehabilitación </h1>
        <div class="imagenl">
          <img src="./img/loginn.png">
        </div>
          <fieldset>
            <input type="email" name="" value="" placeholder="Email">
          </fieldset>
          <fieldset>
            <input type="password" name="" value="" placeholder="Password">

          </fieldset>
          <fieldset>
            <button type="button" name="button" href="{{ url('/dashboard')}}">Ingresar</button>
            <br>
            <a href="{{ url('/registro')}}">Registro</a>
          </fieldset>
      </form>


  </body>
</html>
