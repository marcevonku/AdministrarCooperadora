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
			<li><a href="index.php?c=Menu"title="">SALIR</a></li>
			<li><a href="index.php?c=InscriptosCong" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" name="buscar" action="index.php?c=InscriptosCong&a=nuevo" method="post" accept-charset="utf-8">
		<h2><?php echo $data["titulo"];?></h2>
		<br>
		INGRESE DNI:
		<br> 
		<input class='texto' type="text" id="dni" name="dni" value="" placeholder="DNI">
		<br>
		<br>		
		<input class='boton' type="submit" name="" id="buscar" value="BUSCAR">
		<br>	
	</form >
	<form class="datos1" name="finsc" action="index.php?c=InscriptosCong&a=nuevo" method="post" accept-charset="utf-8">	

		<h2><?php echo $data["titulo"];?></h2>
		<br>
		APELLIDO:
		<br>
		<input class="texto" type="text" name="apellido" value="<?php echo $data['personas']['apellido']; ?>" placeholder="APELLIDO">
		<br>
		NOMBRE:
		<br>
		<input class="texto" type="text" name="nombre" value="<?php echo $data['personas']['nombre']; ?>" placeholder="NOMBRE">
		<br>
		DNI:
		<br>
		<input class="texto" type="text" name="dni" value="<?php echo $data['personas']['dni']; ?>"placeholder="DNI">
		<br>
		EMAIL:
		<br>
		<input class="texto"  type="text" name="mail" value="<?php echo $data['personas']['mail']; ?>" placeholder="EMAIL">
		<br>	
	</form>	
	<form class="datos1" name="finsc" action="index.php?c=InscriptosCong&a=guarda" id="ferecibo" method="post" accept-charset="utf-8">
		<br>
		FECHA:
		<br>
		<input class="texto" type="date" name="fecha" id="finsc" value="" placeholder="">
		<br>
		<input type="hidden" name="personaid" id="finsc" value="<?php echo $data['personas']['idpersona'] ?>" placeholder="">
		CONGRESO:
		<br>
		<select class="texto" id="finsc" name="carreraid">
			<option value="">Seleccionar Congreso</option>
			<?php  
			for($i=0 ; $i<count($data1[0]); $i++) {
				echo '<option value="'.$data1[0][$i]['idcarrera'].'">'
				.$data1[0][$i]['nombrecarrera'].
				'-----'
				.$data1[0][$i]['resolucion']. 
				'</option>';
			}?>
		</select>
		<br>
		CICLO:
		<br>
		<select class="texto" id="finsc" name="cicloid">
			<option value="">Seleccionar ciclo</option>
			<?php  
			for($i=0 ; $i<count($data2[0]); $i++) {
				echo '<option value="'.$data2[0][$i]['idciclo'].'">'
				.$data2[0][$i]['anio'].
				'-----'
				.$data2[0][$i]['idciclo'].'</option>';
			}
			?>
		</select>
		<br>
		<br>
		<input class="boton" id="finsc" type="submit" name="" value="INSC. ALUMNO/A" >
	</form>
</body>
</html>