<?php  


class AteneosControl{

	public function index(){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["titulo"] = "Ateneos";
		$data["carreras"] = $carreras->get_ateneos();
		
		require_once"Vista/Ateneos/ateneos.php";

	}

	public function nueva(){
		
		$data["titulo"] = "Nuevo Ateneo";

		require_once"Vista/Ateneos/ateneos_n.php";
	}

	public function guarda(){

		$resolucion = $_POST['resolucion'];
		$nombrecarrera= $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '6';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->insertarc($resolucion , $nombrecarrera, $fechaalta, $fechabaja, $ide);
		
		$this->index();	
	}

	public function mostrar($idcarrera){
 	
 		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["idcarrera"] = $idcarrera;
		$data["titulo"] = "Modificar Ateneo";
		$data["carreras"] = $carreras->getcarrera($idcarrera);

		include_once"Vista/Ateneos/ateneos_m.php";		
	}

	public function modificar(){

		require_once"Modelo/carrerasModelo.php";

		$idcarrera = $_POST['idcarrera'];
		$resolucion = $_POST['resolucion'];
		$nombrecarrera = $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = 6;

		$carreras = new CarrerasModelo();
		$carreras->modificarcarrera( $idcarrera, $resolucion , $nombrecarrera, $fechaalta, $fechabaja);	

		$this->index();
		
	}	

	public function eliminar($idcarrera){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->eliminarcarrera($idcarrera);
		$data["titulo"] = "CARRERAS";
		$this->index();
	}

	public function imprimir(){

		include_once'Modelo/carrerasModelo.php';	
		$carreras = new carrerasModelo();
		$data["carreras"] = $carreras->get_ateneos();

		require_once'Reportes/carrerasReporte.php';
	}	
}

?>