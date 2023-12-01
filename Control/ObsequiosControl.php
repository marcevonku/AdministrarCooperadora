<?php  

class ObsequiosControl{

	public function index(){
	
		require_once"Modelo/recibosModelo.php";

		$obsequios = new RecibosModelo();

		$data["recibos"] = $obsequios->get_recibos_obsequios();

		$data["titulo"] = "OBSEQUIOS/STOCK";

		require_once"Vista/Recibos/obsequios.php";
	}

	public function nuevo(){

		$data["titulo"] = "OBSEQUIOS/STOCK";
		
		require_once"Vista/Recibos/obsequios_n.php";
	}

	public function guarda(){

		require_once"Modelo/recibosModelo.php";

		ini_set("date.timezone", "America/Argentina/Buenos_Aires");
		
		$temp = new DateTime();

		$temporal = date_format($temp, 'Y-m-d H:i:s');
		$fecha = date_format($temp, 'd-m-Y');
		
		$personaid = 1301;  
		$carreraid = 60;
		
		$monto = $_POST["monto"];
		$pago = 6;
		$trans = "";
		$ide = 7;
		
		$detalle= "CONTROL DE STOCK-> ". $_POST['detalle'];
		$usuarioid = $_POST["usuarioid"];

		$recibo = new RecibosModelo();

		$recibo->insert_recibos($fecha, $personaid, $carreraid, $monto, $ide, $pago, $detalle, $temporal, $usuarioid, $trans);

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

}
?>
