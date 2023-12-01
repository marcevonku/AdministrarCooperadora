<?php  


class UsuariosModelo{

	private $db;
	private $usuarios;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->usuarios = array();
	}

	public function get_usuarios(){


		$sql = "SELECT idpersona, apellido, nombre, dni, fechanacido, mail, telefono, domicilio, localidad, clave, idrol, estado FROM personas  where idrol > 1 ORDER BY apellido ASC;";
		
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){

			if ($row["idrol"] == 2) {
				$row["idrol"] = "BEDEL";

			}elseif ($row["idrol"] == 3) {
				$row["idrol"] = "AUXILIAR";

			}elseif ($row["idrol"] == 4) {
				$row["idrol"] = "REFERENTE COOP.";

			}elseif ($row["idrol"] == 5) {
				$row["idrol"] = "SECRETARIA";

			}elseif ($row["idrol"] == 6) {
				$row["idrol"] = "DIRECTIVO";

			}elseif ($row["idrol"] == 7) {
				$row["idrol"] = "MIEMBRO COOP.";
			}

			if ($row["estado"] == "t"){
				$row["estado"] = "ACTIVO";

			}elseif ($row["estado"] == "f"){
				$row["estado"] = "INACTIVO";
			}

			$this->usuarios[] = $row;

			
		}

		return $this->usuarios;

	}
	
	public function get_rol_select(){
				
		$sql = "SELECT idrol, tiporol, detalle FROM rol WHERE idrol > 1 AND idrol < 8 ORDER BY idrol;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

			while ($row = pg_fetch_assoc($resultado)){
				$this->usuarios[] = $row;
			}

		return $this->usuarios;
	}

	public function insertaruser($apellido, $nombre, $dni, $mail, $clave, $idrol, $estado){
		$sql = "INSERT INTO personas (idpersona, apellido,   nombre,    dni,    mail,    clave,    idrol,     estado) 
		                       VALUES (default,  '$apellido', '$nombre', '$dni','$mail', '$clave', '$idrol', '$estado');";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function get_usuario($idpersona){
			$sql = "SELECT apellido, nombre, dni, mail, clave, idrol, estado FROM personas WHERE idpersona = $idpersona LIMIT 1;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			$row = pg_fetch_assoc($resultado);
			return $row;
	}

	public function get_rol($idrol){
	
		$sql = "SELECT tiporol FROM rol where idrol = $idrol;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);

		return $row;

	}

	public function actualizar_usuario($idpersona, $apellido, $nombre, $mail, $clave, $idrol, $estado){
			$sql = "UPDATE personas SET apellido ='$apellido', nombre ='$nombre', mail = '$mail', clave='$clave', idrol = $idrol, estado='$estado' WHERE idpersona = $idpersona;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}
/*
	public function eliminaruser($iduser){
			$sql = "DELETE FROM usuario WHERE iduser = $iduser;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}
*/
}
?>