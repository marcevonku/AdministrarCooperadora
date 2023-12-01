<?php  


class AjustesControl{

	public function index(){

		require_once"Modelo/ajustesModelo.php";

		$ajustes = new AjustesModelo();
		$data["titulo"] = "AJUSTES INGRESOS Y EGRESOS";
		$data["ajustes"] = $ajustes->get_ajustes();

		require_once"Vista/Facturas/ajustes.php";

	}

	public function nueva(){
		
		$data["titulo"] = "NUEVO AJUSTE";

		require_once"Vista/Facturas/ajustes_n.php";
	}

	public function guarda(){

		$fecha = $_POST['fecha'];
		$facturaid= $_POST['facturaid'];
		$detalle = $_POST['detalle'];
		$egreso = $_POST['monto'];
		$ide = 10;

		require_once"Modelo/ajustesModelo.php";

		$ajustes = new AjustesModelo();
		$ajustes->insert_ajustes($fecha , $facturaid, $detalle, $egreso, $ide);
		
		$this->index();	
	}

	public function mostrar($idcaja){
 	
 		require_once"Modelo/ajustesModelo.php";

		$ajustes = new AjustesModelo();
		$data["idcaja"] = $idcaja;
		$data["titulo"] = "MODIFICAR REGISTRO";
		$data["ajustes"] = $ajustes->get_ajuste($idcaja);

		include_once"Vista/Facturas/ajustes_m.php";		
	}

	public function modificar(){

		$idcaja = $_POST['idcaja'];
		$fecha = $_POST['fecha'];
		$facturaid = $_POST['facturaid'];
		$detalle = $_POST['detalle'];
		$egreso = $_POST['egreso'];
		$ide = 10; 

		require_once"Modelo/ajustesModelo.php";

		$ajustes = new AjustesModelo();
		$ajustes->update_caja( $idcaja, $fecha , $facturaid, $detalle, $egreso, $ide);
		
		$this->index();
	}	

	public function eliminar($idcaja){

		require_once"Modelo/ajustesModelo.php";

		$ajustes = new AjustesModelo();
		$ajustes->delete_ajustes($idcaja);

		$this->index();
	}
	
}

?>