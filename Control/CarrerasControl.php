<?php  

class CarrerasControl{

	public function index(){

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["titulo"] = "CARRERAS";
		$data["carreras"] = $carreras->get_carreras();

		require_once"Vista/Carreras/carreras.php";

	}

	public function nueva(){
		
		$data["titulo"] = "NUEVA CARRERA";

		require_once"Vista/Carreras/carreras_n.php";
	}

	public function guarda(){

		$resolucion = $_POST['resolucion'];
		$nombrecarrera= $_POST['nombrecarrera'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$ide = '1';

		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$carreras->insertarc($resolucion , $nombrecarrera, $fechaalta, $fechabaja, $ide);
		$data["titulo"] = "CARRERAS";
		
		$this->index();	
	}

	public function mostrar($idcarrera){
 	
 		require_once"Modelo/carrerasModelo.php";

		$carreras = new CarrerasModelo();
		$data["idcarrera"] = $idcarrera;
		$data["titulo"] = "MODIFICAR CARRERA";
		$data["carreras"] = $carreras->getcarrera($idcarrera);

		include_once"Vista/Carreras/carreras_m.php";		
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
		$data["titulo"] = "CARRERAS";
		$this->index();
	}

		public function materias($idcarrera){

		require_once "Modelo/CarrerasModelo.php";

		$carrera = new CarrerasModelo();

		$data["titulo"] = $carrera->getcarrera($idcarrera);

		require_once "Modelo/materiasModelo.php";

		$materias = new MateriasModelo();

		$data["materias"] = $materias->get_materias($idcarrera);

		require_once"Vista/Carreras/materias.php";
	}


		public function actualizarMaterias(){

		require_once "Modelo/materiasModelo.php";

		$carreraid = $_POST["idcarrera"];
		$idmateria = $_POST["idmateria"];
		$idcursado = $_POST["idcursado"];
		$nombreMateria = $_POST["nombreMateria"];

		$actualizar = new MateriasModelo();

		$actualizar->set_materia($carreraid, $idmateria, $idcursado, $nombreMateria);

		require_once "Modelo/CarrerasModelo.php";

		$carrera = new CarrerasModelo();

		$data["titulo"] = $carrera->getcarrera($carreraid);

		require_once "Modelo/materiasModelo.php";

		$materias = new MateriasModelo();

		$data["materias"] = $materias->get_materias($carreraid);

		require_once"Vista/Carreras/materias.php";
	}

	public function mostrarmateria ( $idmateria){
		
		var_dump($idmateria);

		require_once"Modelo/materiasModelo.php";

		$materia = new MateriasModelo();



		$data["materia"] = $materia->get_materia($idmateria);

		require_once "Vista/Carreras/materias.php";

	}

}

?>