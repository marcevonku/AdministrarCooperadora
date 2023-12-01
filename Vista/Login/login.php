<?php  

session_start();

session_destroy();

?>
<!DOCTYPE html>
<html>
	<head>
		<!--Determina la tabla de caracteres que usaremos, acentos, apostrofes, eñes -->
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">

		<!--Se utiliza para rendimiento del navegador. Define el modo de mostrarse de la página -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">

		<!--colocar este meta en páginas que necesitemos actualizar los datos que se estan cargando
		<meta http-equiv="refresh" content="10; URL=http colocar página actual"> -->

		<!--Activar este cache espesíficamente en formularios para no gardar datos cargados anteriormente-->
		<meta http-equiv="Expires" content="no-cache">

		<!--Activar para aparecer en los buscadores con ciertas palabras claves-->
		<meta name="keywords" content="">

		<!--meta para descripción del sitio en los navegadores-->
		<meta name="description" content="plataforma de autogestión para alumnos matriculados en carreras, posgrados, postítulos en nuestra institución.">

		<title><?php echo $data["titulo"];?></title>

		<link rel="stylesheet" type="text/css" href="Vista/Login/login.css">

	</head>
	<body>
	

	 	<form action="index.php?c=Login&a=validar" method="POST" accept-charset="utf-8">
	 		<div>	
	 			<img src="Vista/Imagen/LogoBlancoG.jpg">
	 		</div>
			<h1>GESTIÓN</h1>
			<input class="control1" type="email" id="mail" name="mail" value="" placeholder="Usuario-email" required="">
			<br>
			<input class="control1" type="password" id="clave" name="clave" value="" placeholder="password1"required="">
			<br>
			<input class="boton" type="submit" value="INGRESAR" href="">
		</form>
		
	</body>
</html>