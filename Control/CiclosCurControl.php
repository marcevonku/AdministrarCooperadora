<?php 

class CiclosCurControl{

	public function index(){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclos = new CiclosModelo();
		$data["titulo"] = "Ciclos Cursos";
		$data["ciclos"] = $ciclos->get_ciclos_cur();

		include_once"Vista/Ciclos/cicloscur.php";
	}

	public function nueva(){

		$data["titulo"] = "Nuevo Ciclo Cursos";
		require_once"Vista/Ciclos/cicloscur_n.php";
	}

	public function guarda(){

		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$inscripcion = $_POST['inscripcion'];
		$cuota = $_POST['cuota'];
		$total = $cuota * 10 + $inscripcion;
		$ide = 2;
		
		require_once"Modelo/ciclosModelo.php";

		$ciclos = new CiclosModelo();
		$ciclos->insertar($detalle, $anio, $inscripcion, $cuota ,$total, $ide);
		$data["titulo"] = "Ciclos de Cursos";

		echo"<br><br><br><h2><h2>El Ciclo se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='index.php?c=CiclosCur'>VOLVER AL PANEL</a></h2><br><br><br>";
			exit();

	}
	
	public function mostrar($idciclo){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$data["idciclo"] = $idciclo;
		$data["ciclo"] = $ciclo->getciclo($idciclo);
		$data["titulo"] = "Modificar Ciclo";

		include_once"Vista/Ciclos/cicloscur_m.php";
	}

	public function actualizarciclo(){
		
		$idciclo = $_POST['idciclo'];
		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$inscripcion = $_POST['inscripcion'];
		$cuota = $_POST['cuota'];
		$total = $cuota * 10 + $inscripcion;
		$ide = 2;

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$ciclo->modificarciclo($idciclo, $detalle, $anio, $inscripcion, $cuota, $total, $ide);
		
		/*$this->index();*/

		echo"<br><br><br><h2><h2>El Ciclo se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='http://localhost/colocar url del proyecto/index.php?c=CiclosCur'>VOLVER AL PANEL</a></h2><br><br><br>";
	}

	public function eliminar($idciclo){
	
		require_once"Modelo/ciclosModelo.php";
		$modelo = new CiclosModelo();
		$modelo->eliminarciclo($idciclo);
		$data["titulo"] = "Ciclos de Cursos";
		$this->index();	
	}
}
?>