<?php

class NotificacionControl{

	private $recibero;
	

	public function index(){

		$data["titulo1"] = "Registro de Inscripciones";

		$data["titulo2"] = "Registro de recibos";

		require_once'Vista/Documentos/notificacion.php';
	}

	public function calcular(){

		$this->recibero = array();

		$dni = $_POST["dni"];
		$ide = $_POST["ide"];

		require_once'Modelo/personasModelo.php';
		require_once'Modelo/inscriptosModelo.php';
		require_once'Modelo/recibosModelo.php';

		$persona = new PersonasModelo();

		$data["persona"] = $persona->get_persona_dni($dni);

		$personaid = $data["persona"]["idpersona"];


		$inscriptos = new InscriptosModelo();

		$data['inscriptos'] = $inscriptos->get_insc_notificacion($personaid,$ide);

		$data["obligaciones"] = $inscriptos->get_obligaciones($personaid, $ide);
	
		$recibos = new RecibosModelo();

		$data["recibos"] = $recibos->get_aportes($personaid, $ide);

		$data["titulo1"] = "REGISTRO DE INSCRIPCIONES";

		$data["titulo2"] = "REGISTRO DE RECIBOS";

		$data["titulo3"] = "REGISTRO DE CUOTAS";

		$data["titulo4"] = "TOTAL MONTOS A NOTIFICAR";

		$data["totalrecibos"] = $recibos->get_total_recibos($personaid, $ide);

		$obli = $data["obligaciones"]["sum"];
		$apor = $data["totalrecibos"]["sum"];

		

		$aportes = $apor;

		for($i=0 ; $i<count($data['inscriptos']); $i++) {


			$data['tabla'][$i] = [$data['inscriptos'][$i]['nombrecarrera'],$data['inscriptos'][$i]['anio'],$data['inscriptos'][$i]['inscripcion'],$data['inscriptos'][$i]['cuota']];

				$inscripcion = $data['inscriptos'][$i]['inscripcion'];
	
				if ($inscripcion == 0) {
					
					$data['tabla'][$i] = [$data['inscriptos'][$i]['nombrecarrera'],$data['inscriptos'][$i]['anio'],$data['inscriptos'][$i]['inscripcion'],$data['inscriptos'][$i]['cuota'], "EXENTO","EXENTO","EXENTO","EXENTO","EXENTO","EXENTO","EXENTO","EXENTO","EXENTO","EXENTO","EXENTO"];
				}else{
	
				if ($aportes > $inscripcion) {

					$resto = $aportes - $inscripcion;

					$data['tabla'][$i][4] = "PAGADA";

					$aportes = $resto;


/* FOR la tabla para llenar con monto o la palabra debe */


					for($j=5 ; $j < 15; $j++){

						$cuota = $data['inscriptos'][$i]['cuota'];

						if ($aportes >= $cuota) {
							
								$resto = $aportes - $cuota;

								$data['tabla'][$i][$j] = "PAGADA";

								$aportes = $resto;
						}else{

								$data['tabla'][$i][$j] = "DEBE";
						}
					}

/*fin del FOR-----------------*/

				}else{

					$data['tabla'][$i][4] = "DEBE";
				}
				}	
			}	
			
		
		
		$num = $obli - $apor;

		$data["total"] = number_format($num,2);
		
		require_once'Vista/Documentos/notificacion.php';

	}


	public function imprimir(){

		$idpersona = $_POST["idpersona"];
		$apellido = $_POST["apellido"];
		$nombre = $_POST["nombre"];
		$dni = $_POST["dni"];
		$mail = $_POST["mail"];
		$fecha = $_POST["fecha"];
		$obligaciones = $_POST["obligaciones"];
		$aportes = $_POST["aportes"];
		$notificacion = $_POST["notificacion"];

		$data["imprimir"]["fecha"] = $fecha;
		$data["imprimir"]["apellido"] = $apellido;
		$data["imprimir"]["nombre"] = $nombre;
		$data["imprimir"]["dni"] = $dni;
		$data["imprimir"]["mail"] = $mail;
		$data["imprimir"]["obligaciones"] = $obligaciones;
		$data["imprimir"]["aportes"] = $aportes;
		$data["imprimir"]["notificacion"] = $notificacion;

		require_once'Reportes/notificacionReporte.php';
	}
	
}
?>