<?php  


class DestinosModelo{

	private $db;
	private $destinos;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->destinos = array();
	}

	public function get_destinos(){

		$sql = "SELECT idcaja, facturaid, fecha, detalle,ingreso, egreso, ide FROM caja WHERE ide = 9 ORDER BY fecha ASC;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

			while ($row = pg_fetch_assoc($resultado)){

				$this->destinos[] = $row;
			}
		return $this->destinos;
	}

	public function insert_factura ($fecha , $facturaid, $detalle, $egreso, $ide){

		$sql = "INSERT INTO caja(idcaja, fecha, facturaid, detalle, ingreso, egreso, ide) VALUES (default,'$fecha', '$facturaid', '$detalle', 0, '$egreso', $ide);";

			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());		
	}

	public function get_destino($idcaja){

			$sql = "SELECT facturaid, fecha, detalle,ingreso, egreso, ide FROM caja WHERE idcaja = $idcaja LIMIT 1;";
			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());	;
			$row = pg_fetch_assoc($resultado);

			return $row;
	}

	public function update_caja($idcaja, $fecha, $facturaid, $detalle, $egreso, $ide){

			$sql = "UPDATE caja SET fecha='$fecha', facturaid='$facturaid', detalle = '$detalle',  ingreso = 0, egreso = $egreso WHERE idcaja = $idcaja; ";

			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function delete_destinos($idcaja){

			$sql = "DELETE FROM caja WHERE idcaja = $idcaja;";
			$resultado = pg_query($this->db,$sql) or die ("Detalle del Error:".pg_last_error());
	}


}
?>