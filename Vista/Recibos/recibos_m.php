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
			<li><a href="index.php?c=Menu"title="">SALIR</a></li>
			<li><a href="index.php?c=Recibos" title="">LISTAR</a></li>
		</ul>
	</div>
    <br>
    <br>
    <br>
	<form autocomplete="off" class="datos1" id="forecibo"  action="index.php?c=Recibos&a=actualizar" method="post" accept-charset="utf-8">

		<a align="center" ><h3>RECTIFICADOR RECIBOS</h3></a>

		N° RECIBO: 
		<br>
		<input class="texto "type="text" name="idrecibo" value="<?php echo $data['recibo']['idrecibo']?>"> 
		<br>
		ID ROL:
		<br>
		<input class="texto "type="text" name="idrol" value="<?php echo $data['persona']['idrol']?>">
		<input type="hidden" name="usuarioid" value="<?php echo $_SESSION['rolide']['idpersona'];?>">
		<br> 
		<br>
		ID PERSONA:
		<br>
		<input class="texto" type="text" name="personaid" value="<?php echo $data['persona']['idpersona'] ?>">
		<br>
		DNI:
		<br>
		<input class='texto' type="text" id="dni" name="dni" value="<?php echo $data['persona']['dni']?>" placeholder="coloque su n° DNI" >
		<br>
		APELLIDO:
		<input class="texto" type="text" name="apellido" value="<?php echo $data['persona']['apellido']?>" placeholder="APELLIDO" required="">
		<br>
		NOMBRE:
		<br>
		<input class="texto" type="text" name="nombre" value="<?php echo $data['persona']['nombre']?>" placeholder="NOMBRE" required="">
		<br>
		ID GRUPO DE RECIBOS:
		<br>
		<select class="texto" id="ide" name="ide">
			<option value="<?php echo $data['recibo']['ide']?>"><?php echo $data['recibo']['grupo'];?></option>
			<option value="1">CARRERA</option>
			<option value="2">CURSO</option>
			<option value="3">POSTÍTULO</option>
			<option value="4">CONGRESO</option>
			<option value="5">JORNADA</option>
			<option value="6">ATENÉO</option>
			<option value="7">DONACIÓN</option>
			<option value="8">ANULADO</option>
			<option value="9">OBSEQUIO</option>
		</select>
		<br>
		CORRESPONDE A: ID CARRERA
		<br>
		<input class="texto" type="text" name="carreraid" value="<?php echo $data['carrera']['idcarrera']?>" placeholder="">
		<br>
		CORRESPONDE A: NOMBRE CARRERA
		<br>
		<input class="texto" type="text" name="" value="<?php echo $data['carrera']['nombrecarrera']?>" placeholder="">
		<br>
		MONTO:
		<input  class="texto" type="text" name="monto" value="<?php echo $data['recibo']['monto']?>">
		<br>
		MODO DE PAGO:
		<select class="texto" name="pago">
			<option value="<?php echo $data['recibo']['pago']?>"><?php echo $data['recibo']['value']?></option>
			<option value="1">EFECTIVO</option>
			<option value="2">TRASFERENCIA</option>
			<option value="3">COMPENSACIÓN</option>
			<option value="4">BECADO</option>
			<option value="5">BONIFICADO</option>
			<option value="6">OBSEQUIO</option>
			<option value="7">ANULADO</option>
		</select>
		<br>
		N° TRANSACCIÓN:
		<input class="texto" type="text"  name="trans" value="<?php echo $data['recibo']['trans']?>" placeholder="">
		<br>
		DETALLE:
		<textarea class="texto" name="detalle"  value="<?php echo $data['recibo']['detalle']?>"></textarea> 

		<input type="hidden" name="usuarioid" value="<?php echo $_SESSION['rolide']['idpersona'];?>">
		<br>
		<br>
		<input class="boton" id="recibo" type="submit" name="" value="ACTUALIZAR RECIBO" >
	</form>
</body>
</html>


