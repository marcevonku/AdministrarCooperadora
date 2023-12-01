<?php 

session_start();

$varsesion = @$_SESSION['rolide'];

if ($varsesion == null || $varsesion = '') {
 	echo '<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>';
 	session_destroy();
 	exit('<h2>para tener acceso debe iniciar sesión</2>'); 
}

if(intval(($_SESSION['rolide']['idrol'] > 0)) && intval(($_SESSION['rolide']['idrol']) < 5) || (intval($_SESSION['rolide']['idrol']) > 6)){

	echo '<h4>Este ROL no tiene permisos para realizar cambios en estos registros</h4>';

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
			<li><a href="index.php?c=Menu "title="">MENÚ</a></li>
			<li><a href="index.php?c=Usuarios&a=nuevo" title="">NUEVO</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=Usuarios&a=imprimir" name="admin" method="POST" accept-charset="utf-8">
		<table border="1">
			<caption><h2><?php echo $data["titulo"]; ?></h2></caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>APELLIDOS</th>
					<th>NOMBRES</th>
					<th>EMAIL</th>
					<th>CLAVE</th>
					<th>ROLID</th>
					<th>ESTADO</th>
					<th>EDITAR</th>
				</tr>
				<tbody>
					<?php foreach($data["usuarios"] as $dato) {
						echo "<tr>";
							echo "<td>".$dato["idpersona"]."</td>";
							echo "<td>".$dato["apellido"]."</td>";
							echo "<td>".$dato["nombre"]."</td>";
							echo "<td>".$dato["mail"]."</td>";
							echo "<td>".$dato["clave"]."</td>";
							echo "<td>".$dato["idrol"]."</td>";
							echo "<td>".$dato["estado"]."</td>";
							echo "<td><a href='index.php?c=Usuarios&a=mostrar&id=".$dato["idpersona"]."'>Modificar</a></td>";
						echo "</tr>";				
					}?>
				</tbody>
				<tr>
					<th>ID</th>
					<th>APELLIDOS</th>
					<th>NOMBRES</th>
					<th>EMAIL</th>
					<th>CLAVE</th>
					<th>ROLID</th>
					<th>ESTADO</th>
					<th>EDITAR</th>
				</tr>
			</thead>	
		</table>
	</form>
</body>
</html>