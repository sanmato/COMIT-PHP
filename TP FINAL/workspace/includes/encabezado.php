<?php 
	session_start();
	//include("includes/conexion.php");
	header('Content-Type: text/html; charset=UTF-8');
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/mdb.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
	<title>Restaurant</title>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark elegant-color fixed-top scrolling-navbar">
		    <a class="navbar-brand" href="index.php"><img src="img/Logo Raison contorno.png" height="50" alt=""></a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
		        aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		        <ul class="navbar-nav" id="inicio">
		            <li class="nav-item <?php
		                if($_SERVER['REQUEST_URI']=="/index.php") echo "active";
		                ?>">
		                <a class="nav-link" href="index.php">Inicio</a>
		            </li>
		            <li class="nav-item <?php
		                if($_SERVER['REQUEST_URI']=="/nosotros.php") echo "active";
		                ?>">
		                <a class="nav-link" href="nosotros.php">Nosotros</a>
		            </li>
		            <li class="nav-item <?php
		                if($_SERVER['REQUEST_URI']=="/ubicacion.php") echo "active";n
		                ?>">
		                <a class="nav-link" href="ubicacion.php">Ubicación</a>
		            </li>
		            <li class="nav-item <?php
		                if($_SERVER['REQUEST_URI']=="/reservas.php") echo "active";
		                ?>"> 
		                <a class="nav-link <?php if($_SESSION['name']==''){
		                	echo ' disabled';}?>"  <?php if($_SESSION['name']==''){
		                	echo ' title="Debes estar logueado para acceder a esta sección"';}?> href="reservas.php" id="inactivo">Reservas</a>
		            </li>
		            <li class="nav-item dropdown">
		                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
		                    aria-expanded="false">
		                Menú
		                </a>
		                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
		                    <a class="dropdown-item" href="menutradicional.php">Tradicional</a>
		                    <a class="dropdown-item" href="menuvegano.php">Vegano</a>
		                </div>
		            </li>
		        </ul>

		        <div class="col-md-6"></div> <!--div del row-->
				<div id="ocultar" <?php
		        	if(isset($_SESSION['mail']) && isset($_SESSION['name']) && isset($_SESSION['pass'])){
		        		echo 'style="display:none"';
		        	}
		        ?>>
			        <ul class="navbar-nav">
			            <li class="nav-item dropdown derecha">
			                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
			                    aria-expanded="false">
			                Iniciar Sesión
			                </a>
			                <div class="dropdown-menu dropdown-menu-right">
							  <?php 
							  	include("formulario-login.php");
							   ?>
							   <div id="msj_error" style="display: none"></div>
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" href="registro.php">Eres nuevo? Regístrate</a>
							  <a class="dropdown-item" href="recordar.php">Olvidaste la contraseña?</a>
							</div>
			            </li>    
			        </ul>
		        </div>
		        
		        <?php
		        	$visible_login = "none";
		        	//if(isset($_SESSION['mail']) && isset($_SESSION['name']) && isset($_SESSION['pass'])){
		        	if($_SESSION['mail']!=''){
		        		$visible_login = "block";
		        	}
		        ?>
		        
				<div id="show-login" style="display: <?php echo $visible_login; ?>">
			        <ul class="navbar-nav">
			            <li class="nav-item dropdown">
			                <a class="nav-link dropdown-toggle" id="msj_bienvenida" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			                	<?php echo "Bienvenido, ".$_SESSION['name']; ?>
			                </a>
			                
			                <div class="dropdown-menu dropdown-menu-right">
							  <!--<div class="dropdown-divider"></div>-->
							  <a class="dropdown-item" href="#">Mi Perfil</a>
							  <a class="dropdown-item" href="#">Mis Reservas</a>
							  <div class="dropdown-divider"></div>
							  <a class="dropdown-item" id="cerrarSesion">Cerrar Sesión</a>
							</div>
			            </li>    
			        </ul>
		        </div>
		    
		    </div>
		</nav>
	</header>
	<div class="corriendo"></div>
