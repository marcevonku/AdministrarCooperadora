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
			<li><a href="index.php?c=Compromiso" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="datos1n" name="frecibo" action="index.php?c=Compromiso&a=calcular" method="post" accept-charset="utf-8">
		<a><h2><?php echo $data["titulo"]; ?></h2></a>
		<br>
		DNI:
		<br>
		<input class='texto' type="text" id="dni" name="dni" value="" placeholder="Ingrese DNI">
		<br>
		EVENTO:
		<br>
		<select class="texto" name="ide">
			<option value="">OPCIÓN</option>
			<option value="1">CARRERA</option>
			<option value="2">CUSRSO</option>
			<option value="3">POSTÍTULO</option>
			<option value="4">CONGRESO</option>
			<option value="5">JORNADA</option>
			<option value="6">ATENEO</option>
		</select>
		<br>
		<br>
		<input class='boton' type="submit" name="" id="frecibo" value="BUSCAR">	
	</form >
	<br>

	<form class="datos11" action="" name="" method="POST" accept-charset="utf-8">
		<table border="1">
			<caption ><h2><?php echo $data["titulo1"];?></h2></caption>
			<caption ><h2>Obligaciones: $<?php echo $data["obligaciones"]["sum"];?></h2></caption>	
			<thead>
				<tr>.
					<th>ID INSC.</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>INSCRIPTO A CARRERAS</th>
					<th>CICLOS</th>
					<th>MONTOS</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["inscriptos"] as $dato) {
					echo "<tr>";
					echo "<td>".$dato["idinsc"]."</td>";
					echo "<td>".$dato["apellido"]."</td>";
					echo "<td>".$dato["nombre"]."</td>";
					echo "<td>".$dato["dni"]."</td>";
					echo "<td>".$dato["nombrecarrera"]."</td>";
					echo "<td>".$dato["anio"]."</td>";
					echo "<td>".$dato["monto"]."</td>";
					echo "</tr>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID INSC.</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>INSCRIPTO A CARRERAS</th>
					<th>CICLOS</th>
					<th>MONTOS</th>
				</tr>
			</tfoot>			
		</table>
		<br>
		<br>
		<table border="1">
			<caption ><h2><?php echo $data["titulo2"];?></h2></caption>
			<caption ><h2>Aportes: $<?php echo $data["totalrecibos"]["sum"];?></h2></caption>	
			<thead>
				<tr>
					<th>N° REC.</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>INSCRIPTO A CARRERAS</th>
					<th>FECHA</th>
					<th>MONTOS</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["recibos"] as $dato) {
					echo "<tr>";
					echo "<td>".$dato["idrecibo"]."</td>";
					echo "<td>".$dato["apellido"]."</td>";
					echo "<td>".$dato["nombre"]."</td>";
					echo "<td>".$dato["dni"]."</td>";
					echo "<td>".$dato["nombrecarrera"]."</td>";
					echo "<td>".$dato["fecha"]."</td>";
					echo "<td>".$dato["monto"]."</td>";
					echo "</tr>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>N° REC.</th>
					<th>APELLIDO</th>
					<th>NOMBRE</th>
					<th>DNI</th>
					<th>INSCRIPTO A CARRERAS</th>
					<th>FECHA</th>
					<th>MONTOS</th>
				</tr>
			</tfoot>
		</table>
		<br>
	</form>
	<br>
	<form class="datos1n" action="index.php?c=Compromiso&a=imprimir" name="admin" method="POST" accept-charset="utf-8">

		<a><h2><?php echo $data["titulo3"]; ?></h2></a>

		<br>

		<input type="hidden" name="idpersona" value="<?php echo $data["persona"]["idpersona"];?>">
		<input type="hidden" name="apellido" value="<?php echo $data["persona"]["apellido"];?>">
		<input type="hidden" name="nombre" value="<?php echo $data["persona"]["nombre"];?>">
		<input type="hidden" name="dni" value="<?php echo $data["persona"]["dni"];?>">
		<input type="hidden" name="mail" value="<?php echo $data["persona"]["mail"];?>">
		<input type="hidden" name="nombrecarrera" value="<?php echo $data["inscriptos"][0]["nombrecarrera"];?>">
		<input type="hidden" name="anio" value="<?php echo $data["inscriptos"][0]["anio"];?>">
		<input type="hidden" name="ide" value="<?php echo $data["inscriptos"][0]["ide"];?>">
		<input type="hidden" name="idrecibo" value="<?php echo $data["recibos"]["idrecibo"];?>">

		
		FECHA de EMISIÓN <br>
		El presente docuemento tiene una vigencia de 30 días, en caso de no haber regularizado la situación se deberá redactar un nuevo compromiso.<br>
	
		TOTAL DE OBLIGACIONES ADQUIRIDAS <br>
		<input class="texto" type="text" name="obligaciones" value="<?php echo $data["obligaciones"]["sum"];?>" placeholder=""><br>
		
		TOTAL DE APORTES POR RECIBOS <br>
		<input class="texto" type="text" name="aportes" value="<?php echo $data["totalrecibos"]["sum"];?>" placeholder=""><br>
		
		TOTAL DE NOTIFICACIÓN <br>
		<input class="texto" type="text" name="notificacion" value="<?php echo $data["total"];?>" placeholder="">
		<br>
		<br>
		<input class="boton" type="submit" name="" id="" value="NOTIFICAR">
		<br>
	</form>
	<br>
	<br>
</body>
</html>
