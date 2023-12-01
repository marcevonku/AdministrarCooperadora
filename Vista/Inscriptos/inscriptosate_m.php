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
	<br>
	<br>
	<br>
	<form class="datos1" name="finsc" action="index.php?c=InscriptosAte&a=modificar" method="post" accept-charset="utf-8">	

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
	</form>	
	<form class="datos1" name="finsc" action="index.php?c=InscriptosAte&a=modificar" id="ferecibo" method="post" accept-charset="utf-8">
		<input type="hidden" name="idinsc" id="finsc" value="<?php echo $data["insc"] ?>" placeholder="">

		<input type="hidden" name="personaid" id="finsc" value="<?php echo $data['personas']['idpersona'] ?>" placeholder="">
		<br>
		FECHA:
		<br>
		<input class="texto" type="date" name="fecha" id="finsc" value="<?php echo $data["inscripto"]["fecha"] ?>" placeholder="">
		<br>
		CARRERA:
		<br>
		<select class="texto" id="finsc" name="carreraid">
			<option value="<?php echo $data["carrera"]['idcarrera']?>"><?php echo $data["carrera"]["nombrecarrera"]?>Seleccionar atenéo</option>
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
			<option value="<?php echo $data["ciclo"]['idciclo']?>"><?php echo $data["ciclo"]["anio"]?>Seleccionar ciclo</option>
			<?php  
			for($i=0 ; $i<count($data2[0]); $i++) {
				echo '<option value="'.$data2[0][$i]['idciclo'].'">'
				.$data2[0][$i]['anio'].
				'-----'
				.$data2[0][$i]['idciclo'].
				'</option>';
			}?>
		</select>
		<br>
		<br>
		<input class="boton" id="finsc" type="submit" name="" value="INSCRIPCIÓN" >
	</form>
</body>
</html>