<?php  

class CompromisoModelo{

	private $db;
	private $compromiso;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->compromiso = array();
	}

	public function get_compromisos(){


		$sql = "SELECT * FROM compromisos
		INNER JOIN personas
		on compromisos.idpersona = personas.idpersona;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while($row = pg_fetch_assoc($resultado)){
			$this->compromiso[] = $row;
		}

	return $this->compromiso;

	}

	public function insert_compromiso($idpersona, $fecha, $obligaciones, $aportes, $notificacion, $nombrecarrera, $anio, $ide){

	$sql = "INSERT INTO compromisos (idcompromiso, idpersona, fecha, obligaciones, aportes, notificacion, nombrecarrera, anio, ide) VALUES (default, $idpersona, '$fecha', $obligaciones, $aportes, $notificacion, '$nombrecarrera', $anio, $ide);";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

}
?>
