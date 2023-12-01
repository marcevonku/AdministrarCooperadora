<?php 
 
session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}

if(intval(($_SESSION['rolide']['idrol']) < 3)||(intval($_SESSION['rolide']['idrol']) > 5)){
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
	<link rel="stylesheet" href="Vista/Carreras/carreras_n.css">
</head>
<body>
	<div class="zocalo" style="background: #48B1F8">  
		<?php
		echo 'Sesión: '.$_SESSION['rolide']['apellido'].' '.$_SESSION['rolide']['nombre'].' // ';
		echo 'Permiso ROL: '.$_SESSION['rolide']['rol'].'';
		?>
	</div>
	<div id="cabecera">
		<ul class="navegador">
			<li><a href="index.php?c=Menu" title="">SALIR</a></li>
			<li><a href="index.php?c=Destinos" title="">LISTAR</a></li>
		</ul>
	</div>
	<form class="datos1" action="index.php?c=Destinos&a=modificar" method="post" accept-charset="utf-8" autocomplete="off">
		
		<h2><?php echo $data["titulo"]; ?></h2><br>

		<input type="hidden" name="idcaja" value="<?php echo $data["idcaja"] ?>" placeholder="">
		FECHA:<br>
		<input type="date" class="texto" id="fecha" name="fecha" value="<?php echo $data["destinos"]["fecha"] ?>" required=""><br>
		FACTURA N°:<br>
		<input type="text" class="texto" id="facturaid" name="facturaid" value="<?php echo $data["destinos"]["facturaid"] ?>" required=""><br>
		DETALLE:<br>
		<textarea name="detalle" class="texto" value="" required=""><?php echo $data["destinos"]["detalle"]?></textarea><br>
		MONTO:<br>
		<input type="text" class="texto" id="egreso" name="egreso" value="<?php echo $data["destinos"]["egreso"] ?>" required=""><br>

		<button class="boton" id="guardar" name="guardar" type="submit">GUARDAR</button>
	</form>
</body>
</html>