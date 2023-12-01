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
			<li><a href="index.php?c=Recibos" title="">LISTAR</a></li>
		</ul>
	</div>
    <br>
    <br>
    <br>
	<form class="datos1" name="frecibo" action="index.php?c=Recibos&a=nuevo" method="post" accept-charset="utf-8">

		<a align="center"><h3>Seleccione referido:</h3></a>
        <br>
		CARRERA / CURSO / EVENTO
		<select class="texto" name="ide" >
			<option value="">Seleccione</option>
			<option value="1">CARRERA</option>
			<option value="2">CURSO</option>
			<option value="3">POSTITULO</option>
			<option value="4">CONGRESO</option>
			<option value="5">JORNADA</option>
			<option value="6">ATENEO</option>
		</select>	
		<br>
        DNI:
        <br>
        <input class="texto" type="text" name="dni" value="" placeholder="Coloque dni">
		<br>
        <br>
		<input class="boton" type="submit" name="" id="frecibo" value="PRECARGA">		

	</form >
	<form autocomplete="off" class="datos1" id="forecibo"  action="index.php?c=Recibos&a=guarda" method="post" accept-charset="utf-8">
		<a align="center" ><h3>CARGUE DATOS EN RECIBO</h3></a>

		<input type="hidden" name="ide" value="<?php echo $data["ide"];?>" >

		<input type="hidden" name="personaid" value="<?php echo $data['personas']['idpersona'] ?>">

		<input type="hidden" name="usuarioid" value="<?php echo ''.$_SESSION['rolide']['idpersona'].''?>"> 
		APELLIDO:
		<input class="texto" type="text" name="apellido" value="<?php echo $data['personas']['apellido']?>" placeholder="APELLIDO" required=""><br>

		NOMBRE:
		<input class="texto" type="text" name="nombre" value="<?php echo $data['personas']['nombre']?>" placeholder="NOMBRE" required=""><br>

		INGRESE DNI:
		<input class='texto' type="text" id="dni" name="dni" value="<?php echo $data['personas']['dni']?>" placeholder="coloque su n° DNI" ><br>

		<br>
		CORRESPONDE A:
		<select class="texto" name="carreraid">
			<option value="">SELECCIONE</option>
			<?php  
			for($i=0 ; $i<count($data["carreras"]); $i++) {
				echo '<option value="'.$data["carreras"][$i]['idcarrera'].'">'
				.$data["carreras"][$i]['nombrecarrera'].
				'-----'
				.$data["carreras"][$i]['resolucion']. 
				'</option>';
			}?>
		</select>
		<br>
		MONTO:
		<input  class="texto" type="text" name="monto" placeholder="Ingrese importe:$ ">
		<br>
		MODO DE PAGO:
		<select class="texto" name="pago">
			<option value="">Efectivo/Trasferencia</option>
			<option value="1">EFECTIVO</option>
			<option value="2">TRASFERENCIA</option>
			<option value="3">COMPENSACIÓN</option>
			<option value="4">BECADO</option>
			<option value="5">BONIFICADO</option>
		</select>
		<br>
		N° TRANSACCIÓN:
		<input class="texto" type="text" name="trans" value="" placeholder="">
		<br>
		DETALLE:
		<textarea class="texto" name="detalle"></textarea> 

		<input type="hidden" name="usuarioid" value="<?php echo $_SESSION['rolide']['idpersona'];?>">
		<br>
		<br>
		<input class="boton" id="recibo" type="submit" name="" value="EMITIR RECIBO" >
	</form>
</body>
</html>
