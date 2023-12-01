<?php  

class MiembrosControl{

	public function index(){

		require_once "Modelo/cajaModelo.php";

		$miembros = new CajaModelo();

		$data["miembros"] = $miembros->get_diario();

		require_once "Vista/Documentos/miembros.php";

	}
}

?>