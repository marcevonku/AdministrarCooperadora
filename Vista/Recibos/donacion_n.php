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
			<li><a href="index.php?c=Menu"title="">SALIR</a></li>
			<li><a href="index.php?c=Donacion&nuevo" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" id="forecibo"  action="index.php?c=Donacion&a=guarda" method="post" accept-charset="utf-8">

		<a><h2><?PHP echo $data["titulo"]?></h2></a>
		<br>
		APELLIDO:
		<br>
		<input class="texto" type="text" name="apellido" value="" placeholder="APELLIDO" required="">
		<br>
		NOMBRE:
		<br>
		<input class="texto" type="text" name="nombre" value="" placeholder="NOMBRE" required="">
		<br>
		DNI:
		<br>
		<input class="texto" type="text" name="dni" value=""placeholder="DNI" required="">
		<br>
		MONTO:
		<br>
		<input  class="texto" type="text" name="monto" placeholder="Ingrese importe:$ ">
		<br>
		MODO DE PAGO:
		<br>
		<select class="texto" name="pago">
			<option value="">Efectivo/Trasferencia</option>
			<option value="1">EFECTIVO</option>
			<option value="2">TRASFERENCIA</option>
		</select>
		<br>
		N° TRANSACCIÓN:
		<br>
		<input class="texto" type="text" name="trans" value="" placeholder="N° de Trasferencia">
		<br>
		DETALLE:
		<br>
		<textarea class="texto" type="text" name="detalle" placeholder="Aclaraciones"></textarea> 
		<br>
		<input type="hidden" name="usuarioid" value="<?php echo $_SESSION['rolide']['idpersona'];?>">
		<br>
		<br>
		<input class="boton" id="recibo" type="submit" name="" value="EMITIR RECIBO" >
	</form>
</body>
</html>
