<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="stylesheet" href="./../css/font-awesome.min.css">
	<link rel="stylesheet" href="./../css/dashboard.css">
	<link rel="stylesheet" href="../css/mediaquery.css">

</head>
<body>
 <header>

		<form>
		    <button>
				<i class="fa fa-search"></i>
			</button>

			<input type="search" placeholder="Búsqueda">

		</form>
		 <ul>

		    <li>
				<i class="fa fa-home"></i>
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
       <img src="../img/user.jpg" class="userr">
      <div class="contendo">

      		<ul>

			<li>
				<a href="#">
					<i class="fa fa-address-card"></i>
					Pacientes General
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-user"></i>
					Pacientes
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-credit-card"></i>
					Pagos
				</a>
			</li>
			<li>
				<a href="{{ url('/login')}}">
					<i class="fa fa-sign-out"></i>
					Cerrar Sesión
				</a>
			</li>

		</ul>
	   </div>
	</nav>

</body>
</html>
