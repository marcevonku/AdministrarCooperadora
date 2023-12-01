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
			<li><a href="index.php?c=Postitulos&a=nueva" title="">NUEVO</a></li>
		</ul>
	</div>	
	<br>
	<br>
	<br>
	<form class="datos1" action="index.php?c=Postitulos&a=imprimir" name="admin" method="POST" accept-charset="utf-8">
		<table border="1">
			<caption ><h2><?php echo $data["titulo"];?></h2></caption>
			<thead>
				<tr>
					<th>ID</th>
					<th>NOM.POSTITULO</th>
					<th>RESOLUCION</th>
					<th>FECHA.ALTA</th>
					<th>FECHA.BAJA</th>
					<th>MODIFICAR</th>
					<th>ELIMINAR</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["carreras"] as $dato) {
					echo "<tr>";
					echo "<td>".$dato["idcarrera"]."</td>";
					echo "<td>".$dato["nombrecarrera"]."</td>";
					echo "<td>".$dato["resolucion"]."</td>";
					echo "<td>".$dato["fechaalta"]."</td>";
					echo "<td>".$dato["fechabaja"]."</td>";
					echo "<td><a href='index.php?c=Postitulos&a=mostrar&id=".$dato["idcarrera"]."'>Modificar</a></td>";
					echo "<td><a href='index.php?c=Postitulos&a=eliminar&id=".$dato["idcarrera"]."'>Eliminar</a></td>";
					echo "</tr>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>NOM.POSTITULOS</th>
					<th>RESOLUCION</th>
					<th>FECHA.ALTA</th>
					<th>FECHA.BAJA</th>
					<th>MODIFICAR</th>
					<th>ELIMINAR</th>
				</tr>
			</tfoot>
		</table>
	</form>
</body>
</html>