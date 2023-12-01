<?php

session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}

if(intval(($_SESSION['rolide']['idrol'] > 0)) && intval(($_SESSION['rolide']['idrol']) < 5) || (intval($_SESSION['rolide']['idrol']) > 5)){

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
			<li><a href="index.php?c=Menu"title="">MENÚ</a></li>
			<li><a href="index.php?c=Usuarios" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form name="roles" class='datos1' action="index.php?c=Usuarios&a=guarda" method="post" accept-charset="utf-8" autocomplete="off">
		
		<h2><?php  echo $data["titulo"];?></h2>
		<br>
		APELLIDO: 
		<br>
		<input class='texto' type="text" id="apellido" name="apellido" value="" placeholder="Apellido" >
		<br>
		NOMBRE:
		<br>
		<input class='texto' type="text" id="nombre" name="nombre" value="" placeholder="Nombre" >
		<br>
		DNI: 
		<input class='texto' type="text" id="dni" name="dni" value="" placeholder="Nombre" >
		<br>
		EMAIL: 
		<br>
		<input class='texto' type="text" id="mail" name="mail" value="" placeholder="dni" >
		<br>
		CLAVE: 
		<br>
		<input class='texto' type="password" id="clave" name="clave" value="" placeholder="Clave" >
		<br>
		ROLID:
		<br>
		<select class="texto" name="idrol">
			<option value="">ROL</option>
			<?php 
			for ($i=0 ; $i < count($data["usuarios"]) ; $i++ ) { 
				
				echo '<option value="'.$data["usuarios"][$i]["idrol"].'">'.$data["usuarios"][$i]["tiporol"].'</option>';
			}
			?>
		</select>
		<br>
		ESTADO:
		<br>
		<select class="texto" name="estado">
			<option value="">ESTADO</option>
			<option value="1">ACTIVO</option>}
			<option value="0">INACTIVO</option>}
		</select>
		<br>
		<br>
		<button class='boton' id="guardar" name="guardar" type="submit">GUARDAR</button>
	</form>
</body>
</html>