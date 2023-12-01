<?php  

class AlumnosControl{

		public function index(){

		$data["titulo1"] = "Registro de Inscripciones";

		$data["titulo2"] = "Registro de recibos";

		require_once'Vista/Documentos/alumnos.php';
	}

	public function calcular(){

		$dni = $_POST["dni"];
		$ide = $_POST["ide"];

		require_once'Modelo/personasModelo.php';
		require_once'Modelo/inscriptosModelo.php';
		require_once'Modelo/recibosModelo.php';

		$persona = new PersonasModelo();

		$data["persona"] = $persona->get_persona_dni($dni);

		$personaid = $data["persona"]["idpersona"];


		$inscriptos = new InscriptosModelo();

		$data["inscriptos"] = $inscriptos->get_insc_notificacion($personaid,$ide);

		$data["obligaciones"] = $inscriptos->get_obligaciones($personaid, $ide);
	
		$recibos = new RecibosModelo();

		$data["recibos"] = $recibos->get_aportes($personaid, $ide);

		$data["titulo1"] = "REGISTRO DE INSCRIPCIONES";

		$data["titulo2"] = "REGISTRO DE RECIBOS";

		$data["totalrecibos"] = $recibos->get_total_recibos($personaid, $ide);

		$obli = $data["obligaciones"]["sum"];
		$apor = $data["totalrecibos"]["sum"];

		$data["titulo3"] = "TOTAL MONTOS A NOTIFICAR";
		
		$num = $obli - $apor;

		$data["total"] = number_format($num,2);
		
		require_once'Vista/Documentos/alumnos.php';

	}
}
?>