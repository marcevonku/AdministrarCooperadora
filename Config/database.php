<?php

/*
En conexión pg_connect lo que hacepta como ingreso es una cadena. por esta razón no crearé variables por separado, solo crearé una variable que tendrá como argumento una cadena de parámetros para pa conexión
*/

class Conectar {

	public static function conexion(){
		
		$cadena = "host=localhost port=5432 dbname=siscoop user=postgres password=1234";
		
		$conexion = pg_connect($cadena);
														
		return $conexion;
	}
}
?>