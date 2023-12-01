<?php  

session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}
if(intval(($_SESSION['rolide']['idrol']) < 4)||(intval($_SESSION['rolide']['idrol']) > 6)){
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
			<li><a href="index.php?c=CiclosCarr" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=CiclosCarr&a=actualizarciclo" method="post" accept-charset="utf-8">
		<h2><?php echo $data['titulo'] ?></h2>
		<br>

		<input type="hidden" id="idciclo" name="idciclo" value="<?php echo $data["idciclo"] ?>" placeholder="">

		Detalle:
		<input type="text" class="texto" name="detalle" value="<?php echo $data['ciclo']['detalle'] ?>" placeholder="" require>				
		Año:
		<input type="number" min="2009" max="2025" class="texto" name="anio" value="<?php echo $data['ciclo']['anio']?>" placeholder="" require="" >
		Valor Inscripción:
		<input type="number" class="texto" name="inscripcion" value="<?php echo $data['ciclo']['inscripcion']?>" placeholder=""><br>				
		Valor Cuota:
		<input type="number" class="texto" name="cuota" value="<?php echo $data['ciclo']['cuota']?>" placeholder="" require="">
		<br><br>
		<input class="boton" type="submit" name="" value="GUARDAR">
	</form>
</body>
</html>