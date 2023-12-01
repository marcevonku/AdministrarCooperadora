<?php 

/**
 * 
 */
class MateriasModelo
{
	private $db;
	private $materias;

	public function __construct()
	{
		$this->db = Conectar::Conexion();
		$this->materias = array();
	}

	public function get_materias($idcarrera){
		$sql = "select * from materias where carreraid = $idcarrera;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)) {
		 	$this->materias[] = $row;
		 } 

		 return $this->materias;
	}

	public function set_materia($carreraid, $idmateria, $idcursado, $nombreMateria){

		$sql = "INSERT INTO materias (carreraid, idmateria, idcursado, nombreMateria) VALUES ($carreraid, $idmateria, $idcursado, '$nombreMateria');";

		$guardar = pg_query($this->db,$sql) or die("Detalle del error". pg_last_error());

	}

	public function get_materia($idmateria){
		
		$sql = "SELECT * FROM materias WHERE idmateria = $idmateria;";

		$row = pg_query($this->db,$sql)or die("detalle del error:". pg_last_error());

		$this->materia[] = $row;

		return $this->materia;
	}
}
 ?>