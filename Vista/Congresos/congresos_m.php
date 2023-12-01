<?php  

session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}
if(intval(($_SESSION['rolide']['idrol']) < 3)||(intval($_SESSION['rolide']['idrol']) > 3)){
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
	</div>
	<div id="cabecera">
		<ul class="navegador">
			<li><a href="index.php?c=Menu" title="">SALIR</a></li>
			<li><a href="index.php?c=Congresos" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=Congresos&a=modificar" method="POST" accept-charset="utf-8" autocomplete="off">

		<h2><?php echo $data["titulo"];?></h2>
		<br>
		<input type="hidden" id="idcarrera" name="idcarrera" value="<?php echo $data["idcarrera"] ?>">
		Nombre Congreso:
		<input class="texto" type="text" id="nombrecarrera" name="nombrecarrera" value="<?php echo $data["carreras"]["nombrecarrera"]?>" placeholder="" required=""><br>
		Resolución N°:
		<input class="texto" type="text" id="resolucion" name="resolucion" value="<?php echo $data["carreras"]["resolucion"]?>" placeholder="Res.N°:00000-DDDDD-9999" pattern="^[0-9]{5}-[a-zA-Z]{5}-[0-9]{4}$" required=""><br>
		Año de Alta: 
		<input class="texto" type="date" id="fechaalta" name="fechaalta" value="<?php echo $data["carreras"]["fechaalta"]?>" placeholder="" required="" min="2009-01-01" max="2025-01-01"><br>
		Año de Baja: 
		<input class="texto" type="date" id="fechabaja" name="fechabaja" value="<?php echo $data["carreras"]["fechabaja"]?>" placeholder="" required="" min="2009-01-01" max="2025-01-01">
		<br><br>
		<button class="boton"id="guardar" name="guardar" type="submit">GUARDAR</button>
	</form>
</body>
</html>