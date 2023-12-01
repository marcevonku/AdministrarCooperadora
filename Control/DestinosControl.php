<?php  


class DestinosControl{

	public function index(){

		require_once"Modelo/destinosModelo.php";

		$destinos = new DestinosModelo();
		$data["titulo"] = "DESTINOS";
		$data["destinos"] = $destinos->get_destinos();

		require_once"Vista/Facturas/destinos.php";

	}

	public function nueva(){
		
		$data["titulo"] = "NUEVO REGISTRO DESTINO";

		require_once"Vista/Facturas/destinos_n.php";
	}

	public function guarda(){


		ini_set("date.timezone", "America/Argentina/Buenos_Aires");
		$temp = new DateTime();
		$temporal = date_format($temp, 'Y-m-d H:i:s'); 
		$id= strtotime($temporal);
		$h = idate('H', $id);
		$i = idate('i', $id);
		$d = idate('d', $id);
		$m = idate('m', $id);
		$Y = idate('y', $id);
		$facturaid = $h.$i.$d.$m.$Y;
		$fecha = date_format($temp, 'd-m-Y');

		$detalle = $_POST['detalle'];
		$egreso = $_POST['monto'];
		$ide = 9;

		require_once"Modelo/facturasModelo.php";

		$carreras = new FacturasModelo();
		$carreras->insert_factura($fecha , $facturaid, $detalle, $egreso, $ide);
		
		$this->index();	
	}

	public function mostrar($idcaja){
 	
 		require_once"Modelo/destinosModelo.php";

		$destinos = new DestinosModelo();
		$data["idcaja"] = $idcaja;
		$data["titulo"] = "MODIFICAR REGISTRO DESTINO";
		$data["destinos"] = $destinos->get_destino($idcaja);

		include_once"Vista/Facturas/destinos_m.php";		
	}

	public function modificar(){

		$idcaja = $_POST['idcaja'];
		$fecha = $_POST['fecha'];
		$facturaid = $_POST['facturaid'];
		$detalle = $_POST['detalle'];
		$egreso = $_POST['egreso'];
		$ide = 9; 

		require_once"Modelo/destinosModelo.php";

		$destinos = new DestinosModelo();
		$destinos->update_caja( $idcaja, $fecha , $facturaid, $detalle, $egreso, $ide);
		
		$this->index();
	}	

	public function eliminar($idcaja){

		require_once"Modelo/destinosModelo.php";

		$carreras = new DestinosModelo();
		$carreras->delete_destinos($idcaja);

		$this->index();
	}	
}
?>