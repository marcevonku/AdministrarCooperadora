<?php 

session_start();

$varsesion = @$_SESSION['rolide'];


if ($varsesion == null || $varsesion = '') {

	echo '<<br><br><br><br><br><h2>para tener acceso debe iniciar sesión</2>';
	session_destroy();
	exit('<h4><a href="index.php">REGRESAR AL FORMULARIO DE INGRESOS</a></h4>'); 
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
</head>
<body>
	<div class="zocalo">
		<div class="logo">
			<img src="Vista/Imagen/LogoBlancoG.jpg" alt="">  	
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
			<li><a href="index.php">CERRAR</a></li>
			<li><a href="">CARGAS</a>
				<ul>
					<li><a href="index.php?c=Carreras" title="">CARRERAS</a></li>
					<li><a href="index.php?c=Cursos" title="">CURSOS</a></li>
					<li><a href="index.php?c=Postitulos" title="">POSTITULOS</a></li>
					<li><a href="">EVENTOS</a>
						<ul>
							<li><a href="index.php?c=Congresos" title="">CONGRESOS</a></li>
							<li><a href="index.php?c=Jornadas" title="">JORNADAS</a></li>
							<li><a href="index.php?c=Ateneos" title="">ATENEOS</a></li>
						</ul>
					</li>
					<li><a href="">CICLOS</a>
						<ul>
							<li><a href="index.php?c=CiclosCarr" title="">CARRERA</a></li>
							<li><a href="index.php?c=CiclosCur" title="">CURSO</a></li>
							<li><a href="index.php?c=CiclosPost" title="">POSTÍTULO</a></li>
							<li><a href="index.php?c=CiclosCong" title="">CONGRESOS</a></li>
							<li><a href="index.php?c=CiclosJorn" title="">JORNADAS</a></li>
							<li><a href="index.php?c=CiclosAte" title="">ATENEOS</a></li>
						</ul>	
					</li>					
					<li><a href="index.php?c=Personas">PERSONAS</a></li>
				</ul>
			</li>

			<li><a href="">INSCRIPTOS</a>
				<ul>
					<li><a href="index.php?c=InscriptosCarr" title="">CARRERAS</a></li>
					<li><a href="index.php?c=InscriptosCur" title="">CURSOS</a></li>
					<li><a href="index.php?c=InscriptosPost" title="">POSTITULOS</a></li>
					<li><a href="index.php?c=InscriptosCong" title="">CONGRESOS</a></li>
					<li><a href="index.php?c=InscriptosJorn" title="">JORNADAS</a></li>
					<li><a href="index.php?c=InscriptosAte" title="">ATENEOS</a></li>
				</ul>
			</li>
			<li><a href="">COMPROBANTE</a>
				<ul>
					<li><a href="">INGRESOS</a>
						<ul>
							<li><a href="index.php?c=Recibos&a=nuevo" title="">RECIBOS</a></li>
							<li><a href="index.php?c=Donacion&a=nuevo" title="">DON.TERC.</a></li>
							<li><a href="index.php?c=Obsequios&a=nuevo" title="">OBSESQUIOS</a></li>
							<li><a href="index.php?c=Recibosexcel" title="">RECIBOS EXCEL</a></li>
						</ul>
					</li>
					<li><a href="">EGRESOS</a>
						<ul>
							<li><a href="index.php?c=Facturas" title="">FACTURAS</a></li>
							<li><a href="index.php?c=Destinos" title="">DESTINOS</a></li>	
							<li><a href="index.php?c=Ajustes" title="">AJUSTES</a></li>
						</ul>
					</li>
				</ul>
			</li>	
			<li><a href="">DOCUMENTO</a>
				<ul>
					<li><a href="index.php?c=Notificacion" title="">NOTIFICACIONES</a></li>
					<li><a href="index.php?c=Compromiso" title="">COMPROMISOS</a></li>
				</ul>
			</li>
			<li><a href="">REPORTE</a>
				<ul>
					<li><a href="index.php?c=Caja">CAJA</a></li>
					<li><a href="index.php?c=Diario">DIARIO</a></li>
					<li><a href="index.php?c=Deudores" title="">DEUDORES</a></li>
					<li><a href="index.php?c=Miembros" title="">MIEMBROS</a></li>
					<li><a href="index.php?c=Alumnos" title="">ALUMNOS</a></li>
				</ul>
			</li>
			<li><a href="">ADMINISTRAR</a>
				<ul>
					<li><a href="index.php?c=Usuarios" title="">USUARIOS</a></li>
				</ul>
			</li>
		</ul>
	</div>

</body>
</html>