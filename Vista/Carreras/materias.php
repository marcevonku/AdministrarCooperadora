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
			<li><a href="index.php?c=Menu"title="">SALIR</a></li>
			<li><a href="index.php?c=Notificacion" title="">LISTAR</a></li>
		</ul>
	</div>
	<br>
	<br>
	<br>
	<form class="d1" name="fmaterias" action="index.php?c=Carreras&a=actualizarMaterias" method="post" accept-charset="utf-8">
		<a ><h2><?php echo $data["titulo"]["nombrecarrera"];?>  Res.: <?php echo $data["titulo"]["resolucion"];?>
</h2></a>
			<br>

		<input type="hidden" name="idcarrera" value="<?php echo $data["titulo"]["idcarrera"];?>">	

		ID PLAN: &nbsp;
			<input class="t1" type="text" name="idmateria" value="" placeholder=""> &nbsp; &nbsp;&nbsp;
		AÑO DE CURSADO: &nbsp;
			<select class="t2" name="idcursado">
				<option value="">CURSADO</option>
				<option value="1">1° AÑO</option>
				<option value="2">2° AÑO</option>
				<option value="3">3° AÑO</option>
				<option value="4">4° AÑO</option>
			</select> &nbsp; &nbsp; &nbsp;			
		NOMBRE DE MATERIA: &nbsp;
			<input class="t3" type="text" name="nombreMateria" value="" placeholder=""> &nbsp; &nbsp; &nbsp;
			<input class='bt1' type="submit" name="" id="fmaterias" value="GUARDAR">
			<br>
			<br>
			<br>	
	</form>
	<br>
	<br>
	<form class="datos1" action="" name="admin" method="POST" accept-charset="utf-8">
		<table border="1">
			<caption ><h2>PARRILLA DE MATERIAS: <?php echo $data["titulo"]["nombrecarrera"];?>  Res.: <?php echo $data["titulo"]["resolucion"];?> </h2></caption>	
			<thead>
				<tr>
					<th>ID</th>
					<th>AÑO</th>
					<th>NOMBRE MATERIA</th>
					<th>MODIFICAR</th>
					<th>BORRAR</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($data["materias"] as $dato) {
					echo "<tr>";
						echo "<td>".$dato["carreraid"]."</td>";
						echo "<td>".$dato["idmateria"]."</td>";
						echo "<td>".$dato["idcursado"]."</td>";
						echo "<td>".$dato["nombremateria"]."</td>";
						echo "<td><a href='index.php?c=Carreras&a=mostrarmateria&id=".$dato["carreraid"]."&idm=".$dato["idmateria"]."'>MODIFICAR</a></td>";
						echo "<td><a href='index.php?c=Carreras&a=eliminarmateria&id=".$data["idmateria"]."'>ELIMINAR</a></td>";
					echo "</tr>";
				}?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>AÑO</th>
					<th>NOMBRE MATERIA</th>
					<th>MODIFICAR</th>
					<th>BORRAR</th>
				</tr>
			</tfoot>
		</table>
		<br>
	</body>
	<br>	
</html>
