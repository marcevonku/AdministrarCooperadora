<?php  

class FacturasControl{

	public function index(){

		require_once"Modelo/facturasModelo.php";


		$facturas = new FacturasModelo();

		$data["titulo"] = "FACTURAS";

		$data["facturas"] = $facturas->get_facturas();


		require_once"Vista/Facturas/facturas.php";

	}

	public function nueva(){
		
		$data["titulo"] = "NUEVA FACTURA";

		require_once"Vista/Facturas/facturas_n.php";
	}

	public function guarda(){

		$fecha = $_POST['fecha'];
		$facturaid= $_POST['facturaid'];
		$detalle = $_POST['detalle'];
		$egreso = $_POST['monto'];
		$ide = '8';

		require_once"Modelo/facturasModelo.php";

		$carreras = new FacturasModelo();
		$carreras->insert_factura($fecha , $facturaid, $detalle, $egreso, $ide);
		
		$this->index();	
	}

	public function mostrar($idcaja){
 	
 		require_once"Modelo/facturasModelo.php";

		$facturas = new FacturasModelo();
		$data["idcaja"] = $idcaja;
		$data["titulo"] = "MODIFICAR FACTURA";
		$data["facturas"] = $facturas->get_factura($idcaja);

		include_once"Vista/Facturas/facturas_m.php";		
	}

	public function modificar(){

		$idcaja = $_POST['idcaja'];
		$fecha = $_POST['fecha'];
		$facturaid = $_POST['facturaid'];
		$detalle = $_POST['detalle'];
		$egreso = $_POST['egreso'];
		$ide = 8; 

		require_once"Modelo/facturasModelo.php";

		$facturas = new FacturasModelo();
		$facturas->update_caja( $idcaja, $fecha , $facturaid, $detalle, $egreso, $ide);
		
		$this->index();
	}	

	public function eliminar($idcaja){

		require_once"Modelo/facturasModelo.php";

		$facturas = new FacturasModelo();
		$facturas->delete_factura($idcaja);
		
		$this->index();
	}

	public function imprimir(){

		include_once'Modelo/carrerasModelo.php';	
		$carreras = new carrerasModelo();
		$data["carreras"] = $carreras->get_carreras();

		require_once'Reportes/carrerasReporte.php';
	}	
}

?>