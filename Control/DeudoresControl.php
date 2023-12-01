<?php  

class DeudoresControl{
	
	public function index(){

		require_once"Modelo/deudoresModelo.php";

		$data["titulo"] = "Lista de Deudores";

		$deudores = new DeudoresModelo();

		$data["deudores"] = $deudores->get_deudores();

		require_once"Vista/Documentos/deudores.php";
	}
}

?>