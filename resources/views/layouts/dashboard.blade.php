<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="./../css/font-awesome.min.css">
	<link rel="stylesheet" href="./../css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
	<link rel="stylesheet" href="../css/mediaquery.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">

</head>
<body>
 <header>

		<form>
		    <button>
          <div class="s">
				        <i class="fa fa-search"></i>
          </div>
			</button>
    <div class="bu">
			<input type="search" placeholder="Búsqueda">

    </div>
		</form>
		 <ul>

       <li>
         <li>
 				<i class="fa fa-homee"></i>
 			</li>
     </li>
			<li>
				<i class="fa fa-calendar-o"></i>
			</li>
			<li>
				<img src="../img/logotipo.png" class="user">
			</li>
		</ul>

</header>

<nav class="con">

        <div class="ti">
         <h2>Centro de </h2>
        <h2>Rehabilitación</h2>
       </div>
       <img src="../img/logotipoo.png" class="userr">
      <div class="contendo">

      <ul>
      <li>
        <a href="{{ url('/dashboard')}}">
        <h4>
       <i class="fa fa-home"></i>
       Home
     </h4>
     </a>
     </li>
			<li>
          <a href="{{ url('/admin/pacientes')}}">
					<h4>
          <i class="fa fa-user"></i>
          Pacientes
        </h4>
				</a>
			</li>
			<li>
				<a href="{{ url('/login')}}">
        <h4>
				<i class="fa fa-sign-out"></i>
					Cerrar Sesión

        </h4>
        </a>
			</li>

		</ul>
	   </div>
	</nav>
<div class="col-md-8 col-md-offset-3 contenedor">
  @yield('contenido')
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 @yield('scripts')
</body>
</html>
