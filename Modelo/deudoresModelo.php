<?php  

class DeudoresModelo{

	private $db;
	private $deudores;

	public function __construct(){

		$this->db = conectar::conexion();
		$this->deudores = array();
	}

	public function get_deudores(){

		$sql = "SELECT * FROM stp_consulta();";

		//SELECT * FROM stp_funcionllenartabla();

		$resultado = pg_query($this->db,$sql) or die("Detalle del error". pg_last_error()." ".pg_errormessage()." ".pg_result_error());

		while($row = pg_fetch_assoc($resultado)){

			$this->deudores[] = $row ;

		}

		return $this->deudores;
	}
}

?>