<?php 
 
session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}

if(intval(($_SESSION['rolide']['idrol']) < 4)||(intval($_SESSION['rolide']['idrol']) > 5)){
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
			<li><a href="index.php?c=Ajustes" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=Ajustes&a=modificar" method="post" accept-charset="utf-8" autocomplete="off">
		
		<h2><?php echo $data["titulo"]; ?></h2>
		<br>
		<input type="hidden" name="idcaja" value="<?php echo $data["idcaja"] ?>" placeholder="">
		<br>
		FECHA:
		<br>
		<input type="date" class="texto" id="fecha" name="fecha" value="<?php echo $data["ajustes"]["fecha"] ?>" required="">
		<br>
		FACTURA N°:
		<br>
		<input type="text" class="texto" id="facturaid" name="facturaid" value="<?php echo $data["ajustes"]["facturaid"] ?>" required="">
		<br>
		DETALLE:
		<br>
		<textarea name="detalle" class="texto" value="" required=""><?php echo $data["ajustes"]["detalle"]?></textarea>
		<br>
		MONTO:
		<br>
		<input type="text" class="texto" id="egreso" name="egreso" value="<?php echo $data["ajustes"]["egreso"] ?>" required="">
		<br>
		<br>
		<button class="boton" id="guardar" name="guardar" type="submit">GUARDAR</button>
	</form>
</body>
</html>