<?php  

class LoginModelo{

	private $db;
	private $resultado;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->resultado = array();

	}

	public function validarusuario($mail, $clave){


		$sql = "SELECT * FROM personas WHERE mail = '$mail' and clave = '$clave';";

		$resultado = pg_query($this->db,$sql);
		

		$row = pg_fetch_assoc($resultado);
		
		return $row;

	}
}
?>