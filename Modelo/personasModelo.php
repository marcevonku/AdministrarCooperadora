<?php

class PersonasModelo{

	private $db;
	private $personas;

	function __construct(){

		$this->db = Conectar::conexion();
		$this->personas = array();
	}

	public function getpersonas(){

		$sql= "SELECT idpersona, apellido, nombre, dni, fechanacido, telefono, mail, domicilio, localidad  FROM personas where idrol = 1 ORDER BY apellido ASC;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->personas[] = $row;
		}
				return $this->personas;
	}
	
	public function insertar($apellido, $nombre, $dni, $fechanacido, $telefono, $mail, $domicilio, $localidad, $idrol){

		$sql = "INSERT INTO personas(idpersona, apellido, nombre, dni, fechanacido, telefono, mail, domicilio, localidad,idrol)VALUES (default, '$apellido', '$nombre', '$dni','$fechanacido', '$telefono', '$mail','$domicilio', '$localidad', $idrol);";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function get_persona($idpersona){
	
			$sql = "SELECT idpersona, apellido, nombre, dni, fechanacido, telefono, mail, domicilio, localidad, idrol FROM personas WHERE idpersona = $idpersona; ";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			$row = pg_fetch_assoc($resultado);

		 	 return $row;
	}

	public function modificarmp($idpersona, $apellido, $nombre, $dni, $fechanacido, $telefono, $mail, $domicilio, $localidad){

		$sql = "UPDATE personas SET apellido='$apellido', nombre='$nombre', dni=$dni, fechanacido='$fechanacido', telefono=$telefono, mail='$mail', domicilio='$domicilio', localidad='$localidad' WHERE idpersona = $idpersona;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function eliminar($idpersona){

			$sql = "DELETE FROM personas WHERE idpersona = $idpersona;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function get_persona_dni($dni){
			$sql = "SELECT idpersona, apellido, nombre, dni, mail FROM personas WHERE dni = '$dni' ; ";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			$row = pg_fetch_assoc($resultado);
		 	 return $row;
	}

	public function insertar_persona($apellido, $nombre, $dni, $fechanacido, $telefono, $mail, $domicilio, $localidad){

		$sql = "INSERT INTO personas(apellido, nombre, dni ) VALUES ('$apellido', '$nombre', $dni) RETURNING idpersona; ";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

}
?>