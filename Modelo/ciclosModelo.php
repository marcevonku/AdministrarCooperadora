<?php  

class CiclosModelo{

	private $db;
	private $ciclos;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->ciclos = array();
	}

	public function get_ciclos_carr(){
		
		$sql = "SELECT idciclo, detalle, anio, ide, inscripcion, cuota, total FROM ciclos WHERE ide = 1 ORDER BY anio;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		while ($row = pg_fetch_array($resultado)){
			$this->ciclos[] = $row;
		}
		
		return $this->ciclos;
	}

	public function get_ciclos_cur(){
		
		$sql = "SELECT idciclo, detalle, anio, ide, inscripcion, cuota, total FROM ciclos WHERE ide = 2 ORDER BY anio;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		while ($row = pg_fetch_array($resultado)){
			$this->ciclos[] = $row;
		}
		
		return $this->ciclos;
	}

	public function get_ciclos_post(){
		
		$sql = "SELECT idciclo, detalle, anio, ide, inscripcion, cuota, total FROM ciclos WHERE ide = 3 ORDER BY anio;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		while ($row = pg_fetch_array($resultado)){
			$this->ciclos[] = $row;
		}
		
		return $this->ciclos;
	}

	public function get_ciclos_cong(){
		
		$sql = "SELECT idciclo, detalle, anio, inscripcion, cuota, total, ide FROM ciclos WHERE ide = 4 ORDER BY anio;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		while ($row = pg_fetch_array($resultado)){
			$this->ciclos[] = $row;
		}
		
		return $this->ciclos;
	}

	public function get_ciclos_jorn(){
		
		$sql = "SELECT idciclo, detalle, anio, ide, inscripcion, cuota, total FROM ciclos WHERE ide = 5 ORDER BY anio;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		while ($row = pg_fetch_array($resultado)){
			$this->ciclos[] = $row;
		}
		
		return $this->ciclos;
	}

	public function get_ciclos_ate(){
	

		$sql = "SELECT idciclo, detalle, anio, ide, inscripcion, cuota, total FROM ciclos WHERE ide = 6 ORDER BY anio;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		while ($row = pg_fetch_array($resultado)){
			$this->ciclos[] = $row;
		}
		
		return $this->ciclos;
	}

	public function insertar($detalle, $anio, $inscripcion, $cuota, $total, $ide){

		$sql = "INSERT INTO ciclos (idciclo, detalle, anio, inscripcion, cuota, total, ide) VALUES (default, '$detalle', $anio, '$inscripcion', '$cuota', $total, $ide);";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	}

	public function getciclo($idciclo){

		$sql = "SELECT idciclo, detalle, anio, inscripcion, cuota, total FROM ciclos WHERE idciclo = $idciclo;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
		
		$row = pg_fetch_assoc($resultado); 
		
		return $row;
	}

	public function modificarciclo($idciclo, $detalle, $anio, $inscripcion, $cuota, $total){

			$sql = "UPDATE ciclos SET detalle='$detalle', anio=$anio, inscripcion=$inscripcion, cuota=$cuota, total=$total WHERE idciclo = $idciclo;";
			$resultado = pg_query($this->db,$sql) or die('fallo la consulta:'.pg_last_error());
	}

	public function eliminarciclo($idciclo){
	
			$sql = "DELETE FROM ciclos WHERE idciclo = $idciclo;";
			$resultado = pg_query($this->db,$sql) or die('fallo la consulta:'.pg_last_error());
	}

	public function getciclo1($anio1){

		$sql = "SELECT anio FROM ciclos WHERE anio = '$anio1';";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
	
		$row = pg_fetch_assoc($resultado); 
	
		return $row;	
	}
}
?>