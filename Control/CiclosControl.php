<?php 

class CiclosControl{

	public function index(){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclos = new CiclosModelo();
		$data["titulo"] = "Ciclos";
		$data["ciclos"] = $ciclos->getciclos();

		include_once"Vista/Ciclos/ciclos.php";
	}

	public function nueva(){

		$data["titulo"] = "Ciclos";
		require_once"Vista/Ciclos/ciclos_n.php";
	}

	public function guarda(){

		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$monto = $_POST['monto'];
		
		require_once"Modelo/ciclosModelo.php";

		$ciclos = new CiclosModelo();
		$ciclos->insertar($detalle, $anio, $fechaalta, $fechabaja ,$monto);
		$data["titulo"] = "Ciclos";
	
		$this->index();	
	}
	
	public function mostrar($idciclo){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$data["idciclo"] = $idciclo;
		$data["ciclo"] = $ciclo->getciclo($idciclo);
		$data["titulo"] = "Modificar Ciclo";

		include_once"Vista/Ciclos/ciclos_m.php";
	}

	public function actualizarciclo(){
		
		$idciclo = $_POST['idciclo'];
		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$fechaalta = $_POST['fechaalta'];
		$fechabaja = $_POST['fechabaja'];
		$monto = $_POST['monto'];

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$ciclo->modificarciclo($idciclo, $detalle, $anio, $fechaalta, $fechabaja, $monto);
		
		$this->index();	
	}

	public function eliminar($idciclo){
	
		require_once"Modelo/ciclosModelo.php";
		$modelo = new CiclosModelo();
		$modelo->eliminarciclo($idciclo);
		$data["titulo"] = "Ciclos";
		$this->index();	
	}
}
?>