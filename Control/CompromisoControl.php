<?php  

class CompromisoControl{	

	public function index(){

		require_once'Modelo/compromisoModelo.php';


		$compromisos = new CompromisoModelo();
		$data["compromisos"] = $compromisos->get_compromisos();


		$data["titulo"] = "Compromisos";

		require_once'Vista/Documentos/compromiso.php';

	}

	public function nuevo(){

		$data["titulo"] = "Formulario de Búsqueda";

		$data["titulo1"] = "Registro de Inscripciones";

		$data["titulo2"] = "Registro de recibos";

		$data["titulo3"] = "Datos para Documento";

		require_once"Vista/Documentos/compromiso_n.php";
	}

		public function calcular(){

		$dni = $_POST["dni"];

			if (($dni== "")||($dni==0)||($dni==null)){
				echo '<br><br><br><br><h4>Debe insertar un número de "DOCUMENTO" en cuadro de texto "DNI" sebre el que se realizará la consulta </h4>';
				exit('<h4><a href="index.php?c=Compromiso&a=nuevo">REGRESAR A CONSULTA..-');
			}

		$ide = $_POST["ide"];

			if (($ide=="")||($ide==0)||($ide==null)){
				echo '<br><br><br><br><h4>Debe elegir desde el selector de EVENTO una OPCIÓN sebre la que se realizará la consulta </h4>';
				exit('<h4><a href="index.php?c=Compromiso&a=nuevo">REGRESAR A CONSULTA..-');
			}

		require_once'Modelo/personasModelo.php';
		require_once'Modelo/inscriptosModelo.php';
		require_once'Modelo/recibosModelo.php';

		$data["titulo"] = "Formulario de Búsqueda";

		$data["titulo1"] = "Registro de Inscripciones";

		$data["titulo2"] = "Registro de recibos";

		$data["titulo3"] = "Datos para Documento";

		$persona = new PersonasModelo();

		$data["persona"] = $persona->get_persona_dni($dni);

		$personaid = $data["persona"]["idpersona"];

		if (($personaid== "")||($personaid==0)||($personaid==null)){
				echo '<br><br><br><br><h4>Este DNI no pertenece a nadie activo dentro de cooperadora</h4>';
				exit('<h4><a href="index.php?c=Compromiso&a=nuevo">REGRESAR A CONSULTA..-');
			}

		$inscriptos = new InscriptosModelo();

		$data["inscriptos"] = $inscriptos->get_insc_notificacion($personaid,$ide);

		$data["obligaciones"] = $inscriptos->get_obligaciones($personaid, $ide);
	
		$recibos = new RecibosModelo();

		$data["recibos"] = $recibos->get_aportes($personaid, $ide);

		$data["totalrecibos"] = $recibos->get_total_recibos($personaid, $ide);

		$obli = $data["obligaciones"]["sum"];
		$apor = $data["totalrecibos"]["sum"];

		$num = $obli - $apor;

		$data["total"] =  number_format($num, 2, '.', '');
		
		require_once'Vista/Documentos/compromiso_n.php';

	}


	public function imprimir(){

		ini_set("date.timezone", "America/Argentina/Buenos_Aires");
		$temp = new DateTime();


		$idpersona = $_POST["idpersona"];
		$apellido = $_POST["apellido"];
		$nombre = $_POST["nombre"];
		$dni = $_POST["dni"];
		$mail = $_POST["mail"];
		$fecha = date_format($temp, 'd-m-Y');
 		$obligaciones = $_POST["obligaciones"];
 		if (($obligaciones== "")||($obligaciones==0)||($obligaciones==null)){
				echo '<br><br><br><br><h4>Este USUARIO NO REGISTRA DEUDAS</h4>';
				exit('<h4><a href="index.php?c=Compromiso&a=nuevo">REGRESAR A CONSULTA..-');
			}


 		$aportes = $_POST["aportes"];
 		$notificacion = $_POST["notificacion"];
 		$nombrecarrera = $_POST["nombrecarrera"];
 		$anio = $_POST["anio"];
 		$ide = $_POST["ide"];

 		$data["imprimir"]["fecha"] = $fecha;
 		$data["imprimir"]["apellido"] = $apellido;
 		$data["imprimir"]["nombre"] = $nombre;
 		$data["imprimir"]["dni"] = $dni;
 		$data["imprimir"]["mail"] = $mail;
 		$data["imprimir"]["nombrecarrera"] = $nombrecarrera;
 		$data["imprimir"]["anio"] = $anio;
 		$data["imprimir"]["obligaciones"] = $obligaciones;
 		$data["imprimir"]["aportes"] = $aportes;
 		$data["imprimir"]["notificacion"] = $notificacion;


 		require_once'Modelo/compromisoModelo.php';

		$compromiso = new CompromisoModelo();
		$compromiso->insert_compromiso($idpersona, $fecha, $obligaciones, $aportes, $notificacion, $nombrecarrera, $anio, $ide);


		require_once'Modelo/personasModelo.php';
		require_once'Modelo/inscriptosModelo.php';
		require_once'Modelo/recibosModelo.php';
		

		$personaid = $_POST["idpersona"];


		$inscriptos = new InscriptosModelo();

		$data1[] = $inscriptos->get_insc_notificacion_imp($personaid,$ide);

		$recibos = new RecibosModelo();

		$data2[] = $recibos->get_aportes1($personaid, $ide);

		
		require_once'Reportes/compromisoReporte.php';

	}
	
}

?>
