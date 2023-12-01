<?php

session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
	session_destroy();
	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}

if(intval(($_SESSION['rolide']['idrol']) < 2)||(intval($_SESSION['rolide']['idrol']) > 6)){
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
	<link rel="stylesheet" type="text/css" href="Vista/css/carreras.css">	
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
			<li><a href="index.php?c=Personas&a=nueva" title="">NUEVO</a></li>
		</ul>
	</div>	
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=Personas&a=imprimir" method="POST" accept-charset="utf-8" autocomplete="no">
		<table border="1">
			<caption>Personas</caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>FECHA.NAC.</th>
					<th>ACTUALIZAR</th>
					<th>ELIMINAR</th>
					<th>WHATSAPP</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["personas"] as $dato) {
					echo "<tr>";
					echo "<td>".$dato["idpersona"]."</td>";
					echo "<td>".$dato["apellido"]."</td>";
					echo "<td>".$dato["nombre"]."</td>";
					echo "<td>".$dato["dni"]."</td>";
					echo "<td>".$dato["fechanacido"]."</td>";
					echo "<td><a href='index.php?c=Personas&a=mostrarper&id=".$dato["idpersona"]."'>Actualizar</a></td>";
					echo "<td><a href='index.php?c=Personas&a=eliminar&id=".$dato["idpersona"]."'>Eliminar</a></td>";
					echo "<td><a href='index.php?c=Personas&a=whatsapp&id=".$dato["idpersona"]."'>WhatsApp</a></td>";
					echo "</tr>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>FECHA.NAC.</th>
					<th>ACTUALIZAR</th>
					<th>ELIMINAR</th>
					<th>WHATSAPP</th>
				</tr>
			</tfoot>		
		</table>
	</form>
</body>
</html>