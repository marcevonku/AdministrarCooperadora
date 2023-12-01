<?php  

class PostitulosControl{

		public function index(){

		require_once"Modelo/carrerasModelo.php";
		$carreras = new CarrerasModelo();
		$data["titulo"] = "Postitulos";
		$data["carreras"] = $carreras->get_postitulos();

		require_once"Vista/Postitulos/postitulos.php";

	}

	public function nueva(){
		
		$data["titulo"] = "Nuevo Postitulo";

		require_once"Vista/Postitulos/postitulos_n.php";
	}

	public function guarda(){

		$resolucion = $_POST['resolucion'];
		$nombrecarrera= $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '3';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->insertarc($resolucion , $nombrecarrera, $fechaalta, $fechabaja, $ide);
		$data["titulo"] = "Postitulos";
		
		$this->index();	
	}

	public function mostrar($idcarrera){
 	
 		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["idcarrera"] = $idcarrera;
		$data["titulo"] = "Modificar Postitulo";
		$data["carreras"] = $carreras->getcarrera($idcarrera);

		include_once"Vista/Postitulos/postitulos_m.php";		
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
		$data["titulo"] = "Postitulos";
		$this->index();
	}	

	public function eliminar($idcarrera){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->eliminarcarrera($idcarrera);
		$data["titulo"] = "Postitulos";
		$this->index();
	}

	public function imprimir(){

		include_once'Modelo/carrerasModelo.php';	
		$carreras = new carrerasModelo();
		$data["carreras"] = $carreras->get_postitulos();

		require_once'Reportes/carrerasReporte.php';
	}
	
}

?>