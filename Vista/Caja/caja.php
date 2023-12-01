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
	<form class="datos1" name="frecibo" action="index.php?c=Caja" method="post" accept-charset="utf-8">

		<a><h2 style="text-align: center;">Buscar por Fecha</h2></a>
		FECHA:
		<input class='texto' type="date" id="fecha" name="fecha" value="">
		<br>
		<br>
		<input class='boton' type="submit" name="" id="frecibo" value="BUSCAR">	
	</form >
	<br>
	<form class="datos11" action="index.php?c=Caja&a=cajaexcel" name="admin" method="POST" accept-charset="utf-8">
		<table border="1">

			<input type="hidden" name="fecha" value="<?php echo $data["fecha"];?>">

			<caption><h2><?php echo $data["titulo"]; ?></h2></caption>
			
			<thead>
				<tr>
					<th>ID</th>
					<th>FECHA</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>CARRERA</th>
					<th>RESOLUCION</th>
					<th>MONTO</th>
				</tr>
				<tbody>
					<?php foreach($data["recibos"] as $dato) {
						echo "<tr>";
							echo "<td>".$dato["idrecibo"]."</td>";
							echo "<td>".$dato["fecha"]."</td>";
							echo "<td>".$dato["apellido"]."</td>";
							echo "<td>".$dato["nombre"]."</td>";
							echo "<td>".$dato["dni"]."</td>";
							echo "<td>".$dato["nombrecarrera"]."</td>";
							echo "<td>".$dato["resolucion"]."</td>";
							echo "<td>".$dato["monto"]."</td>";
						echo "</tr>";
					}?>
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>FECHA</th>
						<th>APELLIDO</th>
						<th>NOMBRE</th>
						<th>DNI</th>
						<th>CARRERA</th>
						<th>RESOLUCION</th>
						<th>MONTO</th>
					</tr>
				</tfoot>
			</thead>	
		</table>
		<br>
		<br>
		<input class='bt2' type="submit" name="admin" id="" value="EXPORTAR A EXCEL"><br>
		<br>
	</form>
	<br>
	<form class="datos1" name="frecibo" action="index.php?c=Caja&a=cajaexcel" method="post" accept-charset="utf-8">

		<a><h2 style="text-align: center;">Total Recaudado</h2></a>
		RECAUDADO EFECTIVO:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["contado"]["sum"]; ?>"><br>
		RECAUDADO TRANSFERENCIA:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["transferencia"]["sum"]; ?>"><br>
		TOTAL COMPENSACIÓN:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["compensacion"]["sum"]; ?>"><br>
		TOTAL BECADOS:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["becados"]["sum"]; ?>"><br>
		TOTAL BONIFICADOS:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["bonificados"]["sum"]; ?>"><br>
		TOTAL EGRESOS:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["egreso"]["sum"]; ?>"><br>
		TOTAL RECAUDADO:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["recaudacion"]["sum"]; ?>"><br>
		TOTAL RENDICIÓN:<br>
		<input class='texto' type="text" id="" name="" value="<?php echo $data["rendicion"]["sum"]; ?>"><br>
	</form >
</body>
</html>