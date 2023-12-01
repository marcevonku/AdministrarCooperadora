<?php  


class CongresosControl{

	public function index(){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["titulo"] = "Congresos";
		$data["carreras"] = $carreras->get_congresos();

		require_once"Vista/Congresos/congresos.php";

	}

	public function nueva(){
		
		$data["titulo"] = "Nuevo Congreso";

		require_once"Vista/Congresos/congresos_n.php";
	}

	public function guarda(){

		$resolucion = $_POST['resolucion'];
		$nombrecarrera= $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '4';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->insertarc($resolucion , $nombrecarrera, $fechaalta, $fechabaja, $ide);
		$data["titulo"] = "Congresos";
		
		$this->index();	
	}

	public function mostrar($idcarrera){
 	
 		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["idcarrera"] = $idcarrera;
		$data["titulo"] = "Modificar Congresos";
		$data["carreras"] = $carreras->getcarrera($idcarrera);

		include_once"Vista/Congresos/congresos_m.php";		
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
		
		$this->index();
	}	

	public function eliminar($idcarrera){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->eliminarcarrera($idcarrera);
		$data["titulo"] = "Congresos";
		$this->index();
	}

	public function imprimir(){

		include_once'Modelo/carrerasModelo.php';	
		$carreras = new carrerasModelo();
		$data["carreras"] = $carreras->get_congresos();

		require_once'Reportes/carrerasReporte.php';
	}
	
}

?>