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
	<link rel="stylesheet" type="text/css" href="Vista/css/notificacion.css">	
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
			<li><a href="index.php?c=Caja" title="">NUEVO</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos11" action="index.php?c=Diario&a=diarioexcel" name="admin" method="POST" accept-charset="utf-8">
		<table border="1">
			<caption><h2><?php echo $data["titulo"]; ?></h2></caption>
			<thead>
				<tr>
					<th>ID REC.</th>
					<th>ID FAC.</th>
					<th>FECHA</th>
					<th>DETALLE</th>
					<th>INGRESOS</th>
					<th>EGRESOS</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["diario"] as $dato) {
					echo "<tr>";
					echo "<td style='text-align:right'>".$dato["reciboid"]."</td>";
					echo "<td>".$dato["facturaid"]."</td>";
					echo "<td>".$dato["fecha"]."</td>";
					echo "<td>".$dato["detalle"]."</td>";
					echo "<td style='text-align:right'>".$dato["ingreso"]."</td>";
					echo "<td style='text-align:right'>".$dato["egreso"]."</td>";
					echo "</tr>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID REC.</th>
					<th>ID FAC.</th>
					<th>FECHA</th>
					<th>DETALLE</th>
					<th>INGRESOS</th>
					<th>EGRESOS</th>
				</tr>
			</tfoot>
		</table>
		<br>
		<br>
		<input class='bt2' type="submit" name="admin" id="" value="EXPORTAR A EXCEL"><br>
		<br>	
	</FORM>
</body>
</html>