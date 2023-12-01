<?php 

class InscriptosModelo {
 
	private $db; 

	private $insc;
	
	public function __construct(){
		$this->db = Conectar::conexion();
		$this->insc = array();
	}

	public function get_insc_carr(){

		$sql = "SELECT * FROM inscriptos
		inner join personas
		on inscriptos.personaid = personas.idpersona 
		inner join carreras
		on inscriptos.carreraid = carreras.idcarrera
		inner join ciclos
		on inscriptos.cicloid = ciclos.idciclo  
		WHERE inscriptos.ide = 1
		ORDER BY dni, ciclos ASC;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}
		return $this->insc;
	}

	public function get_insc_cur(){
		$sql = "SELECT * FROM inscriptos
		inner join personas
		on inscriptos.personaid = personas.idpersona 
		inner join carreras
		on inscriptos.carreraid = carreras.idcarrera
		inner join ciclos
		on inscriptos.cicloid = ciclos.idciclo  
		WHERE inscriptos.ide = 2 
		ORDER BY apellido ASC;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}
		return $this->insc;
	}

	public function get_insc_post(){
		$sql = "SELECT * FROM inscriptos
		inner join personas
		on inscriptos.personaid = personas.idpersona 
		inner join carreras
		on inscriptos.carreraid = carreras.idcarrera
		inner join ciclos
		on inscriptos.cicloid = ciclos.idciclo  
		WHERE inscriptos.ide = 3 
		ORDER BY apellido ASC;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}
		return $this->insc;
	}

	public function get_insc_cong(){
		$sql = "SELECT * FROM inscriptos
		inner join personas
		on inscriptos.personaid = personas.idpersona 
		inner join carreras
		on inscriptos.carreraid = carreras.idcarrera
		inner join ciclos
		on inscriptos.cicloid = ciclos.idciclo  
		WHERE inscriptos.ide = 4 
		ORDER BY apellido ASC;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}
		return $this->insc;
	}

	public function get_insc_jorn(){
		$sql = "SELECT * FROM inscriptos
		inner join personas
		on inscriptos.personaid = personas.idpersona 
		inner join carreras
		on inscriptos.carreraid = carreras.idcarrera
		inner join ciclos
		on inscriptos.cicloid = ciclos.idciclo  
		WHERE inscriptos.ide = 5 
		ORDER BY apellido ASC;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}
		return $this->insc;
	}

	public function get_insc_ate(){
		$sql = "SELECT * FROM inscriptos
		inner join personas
		on inscriptos.personaid = personas.idpersona 
		inner join carreras
		on inscriptos.carreraid = carreras.idcarrera
		inner join ciclos
		on inscriptos.cicloid = ciclos.idciclo  
		WHERE inscriptos.ide = 6 
		ORDER BY apellido ASC;";
		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}
		return $this->insc;
	}

	public function insertar($fecha, $personaid, $carreraid, $cicloid, $ide){
		$sql = "INSERT INTO inscriptos (idinsc, fecha, personaid, carreraid, cicloid, ide) VALUES (default, '$fecha', $personaid, $carreraid, $cicloid, $ide);";
		$resultado = pg_query($sql) or die('fallo la consulta:'.pg_last_error());
	}
	
	public function get_inscripto_carr($idinsc){
			$sql = "SELECT * FROM inscriptos WHERE idinsc = $idinsc ;";
			$resultado = pg_query($sql) or die("Detalle del Error:".pg_last_error());
			$row = pg_fetch_assoc($resultado);
		 	 return $row;
	}

	public function get_insc_notificacion($personaid, $ide){

		$sql = "SELECT * FROM inscriptos 
			inner join personas
			on inscriptos.personaid = personas.idpersona
			inner join carreras  
			on inscriptos.carreraid = carreras.idcarrera   
			inner join ciclos
			on inscriptos.cicloid = ciclos.idciclo
			WHERE inscriptos.personaid = $personaid and carreras.ide = $ide 
			ORDER BY anio asc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			
		while ( $row = pg_fetch_array($resultado)){
				$this->insc[] = $row;
			}

		return $this->insc;
	}

	public function get_insc_notificacion_imp($personaid, $ide){

		$sql = "SELECT idinsc, apellido, nombre, dni, anio, total  FROM inscriptos 
			inner join personas
			on inscriptos.personaid = personas.idpersona
			inner join carreras  
			on inscriptos.carreraid = carreras.idcarrera   
			inner join ciclos
			on inscriptos.cicloid = ciclos.idciclo
			WHERE inscriptos.personaid = $personaid and carreras.ide = $ide 
			ORDER BY anio asc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			
		while ( $row = pg_fetch_array($resultado)){
			
				$this->insc[] = $row;
			}

		return $this->insc;
	}

	public function actualizar($idinsc, $fecha, $personaid, $carreraid, $cicloid, $ide){
		$sql = "UPDATE inscriptos SET fecha='$fecha', personaid=$personaid, carreraid=$carreraid, cicloid = $cicloid, ide = $ide  WHERE idinsc = $idinsc;";

		$resultado = pg_query($sql) or die('fallo la consulta:'.pg_last_error());
	}

	public function delete($idinsc){
			$sql = "DELETE FROM inscriptos WHERE idinsc = $idinsc ;";
			$resultado = pg_query($sql) or die('fallo la consulta:'.pg_last_error());
	}

	public function get_obligaciones($personaid, $ide){

		$sql = "SELECT sum(total) FROM inscriptos 
			inner join personas
			on inscriptos.personaid = personas.idpersona
			inner join carreras  
			on inscriptos.carreraid = carreras.idcarrera   
			inner join ciclos
			on inscriptos.cicloid = ciclos.idciclo
			WHERE inscriptos.personaid = $personaid and carreras.ide = $ide ;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());
			
		$row = pg_fetch_array($resultado);

		return $row;
	}
	
}	
?>