<?php 

session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}

if(intval(($_SESSION['rolide']['idrol']) < 2)||(intval($_SESSION['rolide']['idrol']) > 5)){
	echo '<br><br><br><br><h4>Este ROL no tiene permisos para realizar cambios en estos registros</h4>';
	exit('<h4><a href="index.php?c=Menu">REGRESAR AL MENU..-');
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Expires" content="no-cache">
	<title><?php echo $data["titulo"];?></title>
	<link rel="stylesheet" type="text/css" href="Vista/css/menu.css">
	<link rel="stylesheet" type="text/css" href="Vista/css/uno.css">
	<link rel="stylesheet" type="text/css" href="Vista/css/carreras_n.css">	
</head>
<body>
	<div class="zocalo">
		<div class="logo">
			<img src="Vista/Imagen/LogoBlancoG.jpg" alt="Logo del la Institución">  	
		</div> 
		<div class="sesion">
			<?php
			echo 'SESIÓN: '.$_SESSION['rolide']['apellido'].' '.$_SESSION['rolide']['nombre'].'';?>
			<br>
			<?php
			echo 'ROL:  '.$_SESSION['rolide']['rol'].'';
			?>		 	
		</div> 
	</div>		
	<div id="cabecera">
		<ul class="navegador">
			<li><a href="index.php?c=Menu" title="">SALIR</a></li>
			<li><a href="index.php?c=Personas" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=Personas&a=guarda" method="post" accept-charset="utf-8">
		<br>
		<h2><?php echo $data["titulo"];?></h2>
		<br>
		APELLIDO:
		<input class="texto" type="text"   id="apellido"  name="apellido" value="" placeholder="Apellido"><br>
		NOMBRE:
		<input class="texto" type="text"   id="nombre" name="nombre" value="" placeholder="Nombre"><br>
		DNI:
		<input class="texto" type="number" id="dni"name="dni" value="" placeholder="DNI"><br>
		FECHA NAC.:
		<input class="texto" type="date"   id="fechanacido"name="fechanacido" value="" placeholder="Fecha Nacido"><br>
		TELEFONO:
		<input class="texto" type="tel"    id="telefono"name="telefono" value="" placeholder="Teléfono"><br>
		EMAIL:
		<input class="texto" type="email"  id="mail" name="mail" value="" placeholder="Email"><br>
		DOMICILIO:
		<input class="texto" type="text"   id="domicilio" name="domicilio" value="" placeholder="Domicilio"><br>
		LOCALIDAD:
		<input class="texto" type="text"   id="localidad"name="localidad" value="" placeholder="Localidad"><br><br>
		<input class="boton" type="submit" id=""name="guardar" value="GUARDAR">
	</form>
</body>
</html>
