<?php

class PersonasControl{

	public function index(){
	
		require_once"Modelo/personasModelo.php";

		$personas = new PersonasModelo();
		$data["titulo"] = "Personas";
		$data["personas"] = $personas->getpersonas();

		require_once"Vista/Personas/personas.php";
	}

	public function nueva(){

		$data["titulo"] = "Nueva Persona";

		require_once"Vista/Personas/personas_n.php";
	}

	public function guarda(){

		require_once"Modelo/personasModelo.php";

		$apellido = $_POST['apellido'];
		$nombre = $_POST['nombre'];
		$dni = $_POST['dni'];
		$fechanacido = $_POST['fechanacido'];
		$telefono = $_POST['telefono'];
		$mail = $_POST['mail'];
		$domicilio = $_POST['domicilio'];
		$localidad = $_POST['localidad'];
		$idrol = 1;

		
		$personas = new PersonasModelo();
		$personas->insertar($apellido,$nombre,$dni,$fechanacido,$telefono,$mail,$domicilio,$localidad, $idrol);
		$data["titulo"] = "Personas";

		$this->index();	
	}

	public function mostrarper($idpersona){

		require_once"Modelo/personasModelo.php";
		
		$personas = new PersonasModelo();
		$data["idpersona"] = $idpersona;
		$data["personas"] = $personas->get_persona($idpersona);
		$data["titulo"] = "Personas";

		include_once"Vista/Personas/personas_m.php";
	}

	public function actualizar(){
	
		$idpersona = $_POST['idpersona'];
		$apellido = $_POST['apellido'];
		$nombre = $_POST['nombre'];
		$dni = $_POST['dni'];
		$fechanacido = $_POST['fechanacido'];
		$telefono = $_POST['telefono'];
		$mail = $_POST['mail'];
		$domicilio = $_POST['domicilio'];
		$localidad = $_POST['localidad'];

		require_once"Modelo/personasModelo.php";

		$personas = new PersonasModelo();
		$personas->modificarmp($idpersona, $apellido,$nombre,$dni,$fechanacido,$telefono,$mail,$domicilio,$localidad);
		$data["titulo"] = "Personas";

		$this->index();	
	}

	public function whatsapp($idpersona){
		
		require_once"Modelo/personasModelo.php";
		
		$personas = new PersonasModelo();
		$data["personas"] = $personas->get_persona($idpersona);
		$data["titulo"] = "Personas";
		header('Location: https://api.whatsapp.com/send?phone="'.$data["personas"]["telefono"].'"');
		die();
	}

	public function eliminar($idpersona){		

		require_once"Modelo/personasModelo.php";
		
		$personas = new PersonasModelo();
		$personas->eliminar($idpersona);
		$data["titulo"] = "Personas";

		$this->index();	
	}
}

?>