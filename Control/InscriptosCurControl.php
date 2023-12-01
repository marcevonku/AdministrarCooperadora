<?php  


class InscriptosCurControl{

	public function index(){

		require_once"Modelo/inscriptosModelo.php";

		$inscriptos = new InscriptosModelo();
		$data["inscriptos"] = $inscriptos->get_insc_cur();
		$data["titulo"] = "Inscriptos cursos";

		require_once"Vista/Inscriptos/inscriptoscur.php";
	}

	public function nuevo(){

		require_once"Modelo/personasModelo.php";
		require_once"Modelo/carrerasModelo.php";
		require_once"Modelo/ciclosModelo.php";
		
		$dni = $_POST["dni"];

		$persona = new PersonasModelo();
		$data["personas"] = $persona->get_persona_dni($dni);



		$carreras = new CarrerasModelo();
		$data1[0] = $carreras->get_cursos();

		$ciclos = new CiclosModelo();
		$data2[0] = $ciclos->get_ciclos_cur();


		$data["titulo"] = "Cargar Nuevo Inscripto";

		require_once"Vista/Inscriptos/inscriptoscur_n.php";

	}

	public function guarda(){

		require_once"Modelo/inscriptosModelo.php";

		$fecha = $_POST["fecha"];
		$personaid = $_POST["personaid"];
		$carreraid = $_POST["carreraid"];
		$cicloid = $_POST["cicloid"];
		$ide = 2;

		$inscripto = new InscriptosModelo();
		$inscripto->insertar($fecha, $personaid, $carreraid, $cicloid, $ide);

		$this->index();
	}

	public function mostrar($idinsc){

		require_once"Modelo/inscriptosModelo.php";
		require_once"Modelo/personasModelo.php";
		require_once"Modelo/carrerasModelo.php";
		require_once"Modelo/ciclosModelo.php";

		$data["insc"] = $idinsc;

		$inscriptos = new InscriptosModelo();
		$data["inscripto"] = $inscriptos->get_inscripto_carr($idinsc);

		$idpersona = $data["inscripto"]["personaid"];

		$persona = new PersonasModelo();
		$data["personas"] = $persona->get_persona($idpersona);

		$idcarrera = $data["inscripto"]["carreraid"];	
		$carreras = new CarrerasModelo();
		$data["carrera"] = $carreras->getcarrera($idcarrera);
		
		$idciclo = $data["inscripto"]["cicloid"];	
		$ciclo = new CiclosModelo();
		$data["ciclo"] = $ciclo->getciclo($idciclo);

		$carreras = new CarrerasModelo();
		$data1[0] = $carreras->get_cursos();

		$ciclos = new CiclosModelo();
		$data2[0] = $ciclos->get_ciclos_cur();

		$data["titulo"] = "Modificar Inscripto";

		require_once"Vista/Inscriptos/inscriptoscur_m.php";
	}

	public function modificar(){

		require_once"Modelo/inscriptosModelo.php";

		$idinsc = $_POST["idinsc"];

		$fecha = $_POST["fecha"];
		$personaid = $_POST["personaid"];
		$carreraid = $_POST["carreraid"];
		$cicloid = $_POST["cicloid"];
		$ide = 2;

		$inscripto = new InscriptosModelo();
		$inscripto->actualizar($idinsc, $fecha, $personaid, $carreraid, $cicloid, $ide);

		$this->index();
	}


	public function eliminar($idinsc){

		require_once"Modelo/inscriptosModelo.php";

		$inscripto = new InscriptosModelo();
		$inscripto->delete($idinsc);

		$this->index();


	}

}
?>