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
			<li><a href="index.php?c=menu" title="">SALIR</a></li>
			<li><a href="index.php?c=Facturas" title="">LISTAR</a></li>
		</ul>
	</div>
	<form class="datos1" name="factura" action="index.php?c=Facturas&a=guarda" method="post" accept-charset="utf-8">
		<br>
		<h2>Formulario de egreso por factura<h2>
		<br>
		FACTURA ID:
		<input class="texto" type="text"   id="factura"  name="facturaid" value="" placeholder="N° de factura"><br>
		DETALLE DE FACTURA:
		<input class="texto" type="textarea"   id="factura" name="detalle" value="" placeholder="Describa el Egreso"><br>
		MONTO DE EGRESO:
		<input class="texto" type="number" id="factura" name="egreso" value="" placeholder="Monto"><br>
		FECHA:
		<input class="texto" type="date"   id="factura"name="fecha" value="" placeholder="Fecha comprobante"><br>
		<br><br>
		<input class="boton" type="submit" id="factura" name="guardar" value="GUARDAR">
	</form>
</body>
</html>
