<?php  

class CursosControl{

	public function index(){

		require_once"Modelo/carrerasModelo.php";
		
		$carreras = new CarrerasModelo();
		$data["titulo"] = "CURSOS";
		$data["carreras"] = $carreras->get_cursos();

		require_once"Vista/Cursos/cursos.php";
	}

	public function nueva(){

		$data["titulo"] = "NUEVO CURSO";

		require_once"Vista/Cursos/cursos_n.php";
	}

	public function guarda(){

		$nombrecarrera = $_POST['nombrecarrera'];
		$resolucion = $_POST['resolucion'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '2';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->insertarcurso($nombrecarrera,$resolucion, $fechaalta,$fechabaja,$ide);
		$data["titulo"] = "CURSOS";

		$this->index();	
	}

	public function mostrar($idcarrera){
 	
 		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["idcarrera"] = $idcarrera;
		$data["titulo"] = "CURSOS";
		$data["carreras"] = $carreras->getcarrera($idcarrera);

		include_once"Vista/Cursos/cursos_m.php";		
	}

	public function modificar(){

		$idcarrera = $_POST['idcarrera'];
		$resolucion = $_POST['resolucion'];
		$nombrecarrera = $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '2';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->modificarcarrera( $idcarrera, $resolucion , $nombrecarrera, $fechaalta, $fechabaja,$ide );

		$this->index();

	}	

	public function eliminar($idcarrera){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->eliminarcarrera($idcarrera);
		$data["titulo"] = "CURSOS";
		$this->index();
	}
	
}
?>