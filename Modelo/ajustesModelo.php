<?php  


class AjustesModelo{

	private $db;
	private $ajustes;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->ajustes = array();
	}

	public function get_ajustes(){

		$sql = "SELECT idcaja, facturaid, fecha, detalle, ingreso, egreso, ide FROM caja WHERE ide = 10 ORDER BY fecha ASC;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

			while ($row = pg_fetch_assoc($resultado)){

				$this->ajustes[] = $row;
			}
		return $this->ajustes;
	}

	public function insert_ajustes ($fecha , $facturaid, $detalle, $egreso, $ide){

		$sql = "INSERT INTO caja(idcaja, fecha, facturaid, detalle, ingreso, egreso, ide) VALUES (default,'$fecha', '$facturaid', '$detalle',0, '$egreso', $ide);";

			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());		
	}

	public function get_ajuste($idcaja){

			$sql = "SELECT facturaid, fecha, detalle,ingreso, egreso, ide FROM caja WHERE idcaja = $idcaja LIMIT 1;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());	;
			$row = pg_fetch_assoc($resultado);

			return $row;
	}

	public function update_caja($idcaja, $fecha, $facturaid, $detalle, $egreso, $ide){

			$sql = "UPDATE caja SET fecha='$fecha', facturaid='$facturaid', detalle = '$detalle', ingreso = 0  egreso = $egreso WHERE idcaja = $idcaja; ";

			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function delete_ajustes($idcaja){

			$sql = "DELETE FROM caja WHERE idcaja = $idcaja;";
			$resultado = pg_query($this->db,$sql) or die ("Detalle del Error:".pg_last_error());
	}


}
?>