<?php

class RecibosControl{

	public function index(){

		require_once'Modelo/recibosModelo.php';

		$recibos = new RecibosModelo();
		$data["recibos"] = $recibos->get_recibos();
		$data["titulo"] = 'Recibos Emitidos';
		
		require_once'Vista/Recibos/recibos.php';
	}

	public function nuevo(){

		require_once"Modelo/carrerasModelo.php";
		require_once"Modelo/personasModelo.php";

		$ide = $_POST["ide"];
		$dni = $_POST["dni"];

		$data["ide"] = $ide;

		$persona = new PersonasModelo();

		$data["personas"] = $persona->get_persona_dni($dni);


		$carreras = new CarrerasModelo();


		if ($ide == 1) {
			
			$data["carreras"] = $carreras->get_carrera_ide($ide);

		}

		if ($ide == 2) {
			
			$data["carreras"] = $carreras->get_carrera_ide($ide);

		}

		if ($ide == 3) {
			
			$data["carreras"] = $carreras->get_carrera_ide($ide);

		}

		if ($ide == 4) {
			
			$data["carreras"] = $carreras->get_carrera_ide($ide);

		}

		if ($ide == 5) {
			
			$data["carreras"] = $carreras->get_carrera_ide($ide);

		}

		if ($ide == 6) {
			
			$data["carreras"] = $carreras->get_carrera_ide($ide);

		}


		$data["titulo"] = "Emitir Nuevo Recibo";

		require_once"Vista/Recibos/recibos_n.php";

	}


	public function guarda(){


		require_once"Modelo/recibosModelo.php";
		require_once"Modelo/personasModelo.php";

/*Tomamos la fecha del sistema y la usamos para dejar una marca temporal y guardar la fecha*/

		ini_set("date.timezone", "America/Argentina/Buenos_Aires");
		$temp = new DateTime();
		$temporal = date_format($temp, 'Y-m-d H:i:s');
		$fecha = date_format($temp, 'd-m-Y');

/*Tomamos los datos basicos para un recibo*/

		$apellido = $_POST["apellido"];
		$nombre = $_POST["nombre"];
		$dni = $_POST["dni"];

/*creamos un objeto persona y comprobamos si dni existe*/

		$persona = new PersonasModelo();
		$data["personas"] = $persona->get_persona_dni($dni);
		$idpersona = $data["personas"]["idpersona"];

/*si el dni no esta lo guardaremos ahora*/

		if ($idpersona == NULL){

			$fechanacido="";
			$telefono="";
			$mail="";
			$domicilio="";
			$localidad="";
		    $persona->insertar_persona($apellido, $nombre, $dni, $fechanacido, $telefono, $mail, $domicilio, $localidad);
		    $data["persona"] = $persona->get_persona_dni($dni);
		    $personaid = $data["persona"]["idpersona"];
		}else{
			$personaid = $idpersona;
		} 		

		$carreraid = $_POST["carreraid"];
		
		$monto = $_POST["monto"];
		$pago = $_POST["pago"];
		$trans = $_POST["trans"];
		$ide = $_POST["ide"];
		$usuarioid = $_POST["usuarioid"];

		if ($pago == 1) {
			$detalle = "(EFECTIVO)-> ".$_POST["detalle"]."";
		}

		if ($pago == 2) {
			$detalle = "(TRANSFERENCIA)-> ".$_POST["detalle"]."";
		}
		
		if ($pago == 3) {
			$detalle = "(COMPENSACIÓN)-> ".$_POST["detalle"]."";
		}

		if ($pago == 4) {
			$detalle = "(BECADO)-> ".$_POST["detalle"]."";
		}

		if ($pago == 5) {
			$detalle = "(BONIFICADO)-> ".$_POST["detalle"]."";
		}

		if ($pago == 6) {
			$detalle = "(OBSEQUIO DE PRODUCTOS)-> ".$_POST["detalle"]."";
		}

		if (empty($personaid)){
			echo"<br><br><br><h2><a>no se ha cargado un DNI DE PERSONA</a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($carreraid)){
			echo"<br><br><br><h2><a>no se ha seleccionado CARRERA / CURSO / EVENTO </a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($monto)){
			echo"<br><br><br><h2><a>no se ha detallado un MONTO</a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($pago)){
			echo"<br><br><br><h2><a>no se ha seleccionado modo de PAGO</a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($trans)){

			$trans = '';
		}

		$recibos = new RecibosModelo();

		$recibos->insert_recibos($fecha, $personaid, $carreraid, $monto, $ide, $pago, $detalle, $temporal, $usuarioid, $trans);

		$this->index(); 

/* Esta intención de parar la ejecución del programa con exit es para que no se vuelva a cargar los datos del formulario con la tecla de refrescar superior del menú del navegador */

/*		echo"<br><br><br><br><CENTER><h2>EL RECIBO SE EMITIÓ CON ÉXITO.</h2></CENTER><br><br><br>";
		
		exit("<CENTER><h1><a href='index.php?c=Recibos'>PRESIONE PARA VOLVER AL PANEL RECIBOS</a></h1></CENTER>");
*/


	}


	public function modificar($idrecibo){
 	
		require_once'Modelo/recibosModelo.php';
		require_once'Modelo/personasModelo.php';
		require_once'Modelo/carrerasModelo.php';

		$recibo = new RecibosModelo();
		$persona = new PersonasModelo();
		$carrera = new CarrerasModelo();

		$data["recibo"] = $recibo->get_recibo($idrecibo);

		switch ($data['recibo']['pago']) {
			case 1:
				# code...
				$data['recibo']['pago'] = 1;
				$data['recibo']['value'] = 'EFECTIVO';
				break;
			case 2:
				# code...
				$data['recibo']['pago'] = 2;
				$data['recibo']['value'] = 'TRANSFERENCIA';
				break;
			case 3:
				# code...
				$data['recibo']['pago'] = 3;
				$data['recibo']['value'] = 'COMPENSACIÓN';
				break;
			case 4:
				# code...
				$data['recibo']['pago'] = 4;
				$data['recibo']['value'] = 'BECADO';
				break;
			case 5:
				# code...
				$data['recibo']['pago'] = 5;
				$data['recibo']['value'] = 'BONIFICADO';
				break;
			case 6:
			    # code...
				$data['recibo']['pago'] = 6;
				$data['recibo']['value'] = 'OBSEQUIO';	
				break;
			case 7:
				# code...
				$data['recibo']['pago'] = 7;
				$data['recibo']['value'] = 'ANULADO';
				break;
			default:
				# code...
				$data['recibo']['pago'] ="";
				$data['recibo']['value'] = '';
				break;
		}

				switch ($data['recibo']['ide']) {
			case 1:
				# code...
				$data['recibo']['ide'] = 1;
				$data['recibo']['grupo'] = 'CARRERA';
				break;
			case 2:
				# code...
				$data['recibo']['ide'] = 2;
				$data['recibo']['grupo'] = 'CURSO';
				break;
			case 3:
				# code...
				$data['recibo']['ide'] = 3;
				$data['recibo']['grupo'] = 'POSTÍTULO';
				break;
			case 4:
				# code...
				$data['recibo']['ide'] = 4;
				$data['recibo']['grupo'] = 'CONGRESO';
				break;
			case 5:
				# code...
				$data['recibo']['ide'] = 5;
				$data['recibo']['grupo'] = 'JORNADA';
				break;
			case 6:
			    # code...
				$data['recibo']['ide'] = 6;
				$data['recibo']['grupo'] = 'ATENÉO';	
				break;
			case 7:
				# code...
				$data['recibo']['ide'] = 7;
				$data['recibo']['grupo'] = 'DONACIÓN';
				break;
			case 8:
				# code...
				$data['recibo']['ide'] = 8;
				$data['recibo']['grupo'] = 'ANULADO';
				break;
			case 9:
				# code...
				$data['recibo']['ide'] = 9;
				$data['recibo']['grupo'] = 'OBSEQUIO';
				break;
			default:
				# code...
				$data['recibo']['pago'] ="";
				$data['recibo']['value'] = '';
				break;
		}

		$personaid = $data['recibo']['personaid'];
		$carreraid = $data['recibo']['carreraid'];
		$usuarioid = $data['recibo']['usuarioid'];

		$idpersona = $personaid;
		$idcarrera = $carreraid;
		$idusuario = $usuarioid;

		$data['persona'] = $persona->get_persona($idpersona);
		$data['carrera'] = $carrera->getcarrera($idcarrera);
		$data['usuario'] = $persona->get_persona($idusuario);
		

		require_once'Vista/Recibos/recibos_m.php';	

	}

	public function actualizar(){

		require_once"Modelo/recibosModelo.php";
		require_once"Modelo/personasModelo.php";

		$idrecibo = $_POST["idrecibo"];
		$personaid = $_POST["personaid"];
		$carreraid = $_POST["carreraid"];
		$monto = $_POST["monto"];
		$ide = $_POST["ide"];
		$pago = $_POST["pago"];
		$trans = $_POST["trans"];
		$usuarioid = $_POST["usuarioid"];
		$detalle = $_POST["detalle"];

		if ($pago == 1) {
			$detalle = "(EFECTIVO)-> ".$_POST["detalle"]."";
		}

		if ($pago == 2) {
			$detalle = "(TRANSFERENCIA)-> ".$_POST["detalle"]."";
		}
		
		if ($pago == 3) {
			$detalle = "(COMPENSACIÓN)-> ".$_POST["detalle"]."";
		}

		if ($pago == 4) {
			$detalle = "(BECADO)-> ".$_POST["detalle"]."";
		}

		if ($pago == 5) {
			$detalle = "(BONIFICADO)-> ".$_POST["detalle"]."";
		}

		if ($pago == 6) {
			$detalle = "(OBSEQUIO DE PRODUCTOS)-> ".$_POST["detalle"]."";
		}

		if (empty($carreraid)){
			echo"<br><br><br><h2><a>no se ha seleccionado CARRERA / CURSO / EVENTO </a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($monto)){
			echo"<br><br><br><h2><a>no se ha detallado un MONTO</a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($pago)){
			echo"<br><br><br><h2><a>no se ha seleccionado modo de PAGO</a></h2><br><br><br>";
		 	echo"<br><br><br><h2><a href='index.php?c=Recibos&a=nuevo'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit;
		}

		if (empty($trans)){

			$trans = '';
		}

		$recibos = new RecibosModelo();

		$recibos->actualizar_recibo($idrecibo, $personaid, $carreraid, $monto, $ide, $pago, $detalle, $usuarioid, $trans);

		$this->index(); 

	}


	public function imprimir($idrecibo){
 	
		require_once'Modelo/recibosModelo.php';
		require_once'Modelo/personasModelo.php';
		require_once'Modelo/carrerasModelo.php';

		$recibo = new RecibosModelo();
		$persona = new PersonasModelo();
		$carrera = new CarrerasModelo();

/* Separamos punto de venta del número de recibo. 4 dígitos punto de venta y 8 para numerar recibo*/

		$a = 10000000;

		$sucursal = (intval($idrecibo)/$a);

		$data["sucursal"] = str_pad(intval($sucursal),4, "0", STR_PAD_LEFT);

		$factura = intval($idrecibo) - (intval($sucursal) * $a);

		$data["factura"] = str_pad($factura, 8, "0", STR_PAD_LEFT);

		$data["recibo"] = $recibo->get_recibo($idrecibo);

/* Enviamos los 4 últimos dígitos del recibo para que conforme el nombre del pdf*/

		$factura = intval($idrecibo) - (intval($sucursal) * $a);

		$data["digitosnombre"] = str_pad($factura, 4, "0", STR_PAD_LEFT);		

/* Obtención de datos para conformar pdf de recibo*/

		$personaid = $data['recibo']['personaid'];
		$carreraid = $data['recibo']['carreraid'];
		$usuarioid = $data['recibo']['usuarioid'];

		$idpersona = $personaid;
		$idcarrera = $carreraid;
		$idusuario = $usuarioid;
		$data['persona'] = $persona->get_persona($idpersona);
		$data['carrera'] = $carrera->getcarrera($idcarrera);
		$data['usuario'] = $persona->get_persona($idusuario);

		require_once"Reportes/recibosReporte.php";	

	}

	public function selector(){

		require_once "Modelo/carrerasModelo.php";

		$ide = $_POST['ide'];

var_dump($ide);

		$selector = new CarrerasModelo();

		$data['carreras'] = $selectror->get_carrera_ide($ide);

		var_dump($data['carreras']);

		include_once "../Vista/Recibos/recibos_m.php";
	}


}
?>