<?php  

class JornadasControl{

	public function index(){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["titulo"] = "Jornadas";
		$data["carreras"] = $carreras->get_jornadas();

		require_once"Vista/Jornadas/jornadas.php";

	}

	public function nueva(){
		
		$data["titulo"] = "Nueva Jornada";

		require_once"Vista/Jornadas/jornadas_n.php";
	}

	public function guarda(){

		$resolucion = $_POST['resolucion'];
		$nombrecarrera= $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '5';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->insertarc($resolucion , $nombrecarrera, $fechaalta, $fechabaja, $ide);
		$data["titulo"] = "Jornadas";
		$this->index();	
	}

	public function mostrar($idcarrera){
 	
 		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["idcarrera"] = $idcarrera;
		$data["titulo"] = "Modificar Jornada";
		$data["carreras"] = $carreras->getcarrera($idcarrera);

		include_once"Vista/Jornadas/jornadas_m.php";		
	}

	public function modificar(){

		$idcarrera = $_POST['idcarrera'];
		$resolucion = $_POST['resolucion'];
		$nombrecarrera = $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->modificarcarrera( $idcarrera, $resolucion , $nombrecarrera, $fechaalta, $fechabaja);
		$data["titulo"] = "Jornadas";
		$this->index();
	}	

	public function eliminar($idcarrera){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->eliminarcarrera($idcarrera);
		$data["titulo"] = "Jornadas";
		$this->index();
	}

	public function imprimir(){

		include_once'Modelo/carrerasModelo.php';	
		$carreras = new carrerasModelo();
		$data["carreras"] = $carreras->get_jornadas();

		require_once'Reportes/carrerasReporte.php';
	}
	
}

?>