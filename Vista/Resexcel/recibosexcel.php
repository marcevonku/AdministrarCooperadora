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
<html lang="es">
<head>
	<?php include("head.php");?>
</head>
<body>
	<?php include("navbar.php");?>
	<div id="cabecera">
		<ul class="navegador">
			<li><a href="index.php?c=Menu"title="">SALIR</a></li>
			<li><a href="index.php?c=Recibosexcel&a=get_recibosexcel_fecha" title="">FECHA</a></li>
			<li><a href="index.php?c=Recibosexcel&a=get_recibosexcel_recibo" title="">RECIBO</a></li>
			<li><a href="index.php?c=Recibosexcel&a=get_recibosexcel_apellido" title="">APELLIDO</a></li>
			<li><a href="index.php?c=Recibosexcel&a=get_recibosexcel_dni" title="">DNI</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>	
	<form class="datos1" action="index.php?c=Recibos&a=imprimir" name="admin" method="POST" accept-charset="utf-8">
		<table border="1">
			<caption><h2><?php echo $data["titulo"]; ?></h2></caption>
			<thead>
				<tr>
					<th>FECHA</th>
					<th>N° REC.</th>
					<th>APELLIDO Y NOMBRE</th>
					<th>CARRERA</th>
					<th>DNI</th>
					<th>COHORTE</th>
					<th>MONTO</th>
					<th>DETALLE</th>					
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["recibos"] as $dato) {
					echo "<tr>";
					echo "<td>".$dato["fecha"]."</td>";
					echo "<td>".$dato["num_recibo"]."</td>";
					echo "<td>".$dato["apellido_nombre"]."</td>";
					echo "<td>".$dato["carrera"]."</td>";
					echo "<td>".$dato["dni"]."</td>";
					echo "<td>".$dato["cohorte"]."</td>";
					echo "<td>".$dato["monto"]."</td>";
					echo "<td>".$dato["observaciones"]."</td>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>FECHA</th>
					<th>N° REC.</th>
					<th>APELLIDO Y NOMBRE</th>
					<th>CARRERA</th>
					<th>DNI</th>
					<th>COHORTE</th>
					<th>MONTO</th>
					<th>DETALLE</th>					
				</tr>
			</tfoot>
		</table>
	</FORM>
</body>
</html>