<?php  

class CarrerasModelo{

	private $db;
	private $carreras;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->carreras = array();
	}

	public function get_carreras(){
		$sql = "SELECT * FROM carreras WHERE ide = 1 ORDER BY nombrecarrera;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->carreras[] = $row;
		}
	return $this->carreras;
	}

	public function get_cursos(){

		$sql = "SELECT idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja FROM carreras WHERE ide = 2 ORDER BY nombrecarrera;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){
			
			$this->carreras[] = $row;
		}
	
		return $this->carreras;
	}

	public function get_postitulos(){

		$sql = "SELECT idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja FROM carreras WHERE ide = 3 ORDER BY nombrecarrera";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){
			
			$this->carreras[] = $row;
		}
	
		return $this->carreras;
	}
	
	public function get_congresos(){

		$sql = "SELECT idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja FROM carreras WHERE ide = 4 ORDER BY nombrecarrera;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){
			
			$this->carreras[] = $row;
		}
	
		return $this->carreras;
	}

	public function get_jornadas(){

		$sql = "SELECT idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja FROM carreras WHERE ide = 5 ORDER BY nombrecarrera;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){
			
			$this->carreras[] = $row;
		}
	
		return $this->carreras;
	}

	public function get_ateneos(){

		$sql = "SELECT idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja FROM carreras WHERE ide = 6 ORDER BY nombrecarrera;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){
			
			$this->carreras[] = $row;
		}
	
		return $this->carreras;
	}

	public function insertarc($resolucion, $nombrecarrera, $fechaalta, $fechabaja, $ide){

		$sql = "INSERT INTO carreras(idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja, ide) VALUES (default,'$resolucion', '$nombrecarrera', '$fechaalta', '$fechabaja', $ide);";

			$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());		
	}

	

	public function insertarcurso($nombrecarrera, $resolucion, $fechaalta,$fechabaja,$ide){
		
		$sql = "INSERT INTO carreras(idcarrera,nombrecarrera,resolucion,fechaalta,fechabaja,ide) VALUES (default,'$nombrecarrera','$resolucion', '$fechaalta','$fechabaja','$ide');";

		$resultado = pg_query($this->db,$sql);
	}

	public function getcarrera($idcarrera){

			$sql = "SELECT idcarrera, resolucion, nombrecarrera, fechaalta, fechabaja FROM carreras WHERE idcarrera = $idcarrera LIMIT 1;";
			$resultado = pg_query($this->db,$sql);
			$row = pg_fetch_assoc($resultado);

			return $row;
	}

	public function get_carrera_ide($ide){

		$sql = "SELECT idcarrera, resolucion, nombrecarrera FROM carreras WHERE ide = $ide ;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->carreras[] = $row;
		}
	return $this->carreras;
	}

	public function modificarcarrera($idcarrera, $resolucion, $nombrecarrera, $fechaalta, $fechabaja){

			$sql = "UPDATE carreras SET resolucion='$resolucion', nombrecarrera='$nombrecarrera', fechaalta='$fechaalta', fechabaja = '$fechabaja' WHERE idcarrera = $idcarrera;";
			$resultado = pg_query($this->db,$sql);
	}

		public function eliminarcarrera($idcarrera){

			$sql = "DELETE FROM carreras WHERE idcarrera = $idcarrera;";
			$resultado = pg_query($this->db,$sql);
	}

}
?>