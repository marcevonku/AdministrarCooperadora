<?php 

class CiclosPostControl{

	public function index(){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclos = new CiclosModelo();
		$data["titulo"] = "Ciclos Postítulos";
		$data["ciclos"] = $ciclos->get_ciclos_post();

		include_once"Vista/Ciclos/ciclospost.php";
	}

	public function nueva(){

		$data["titulo"] = "Nuevo Ciclo de Postítulos";
		require_once"Vista/Ciclos/ciclospost_n.php";
	}

	public function guarda(){

		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$inscripcion = $_POST['inscripcion'];
		$cuota = $_POST['cuota'];
		$total = $cuota * 10 + $inscripcion;
		$ide = 3;
		
		require_once"Modelo/ciclosModelo.php";

		$ciclos = new CiclosModelo();
		$ciclos->insertar($detalle, $anio, $inscripcion, $cuota ,$total, $ide);
		$data["titulo"] = "Ciclos de Postítulos";

		echo"<br><br><br><h2><h2>El Ciclo se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='http://localhost/colocar url del proyecto/index.php?c=CiclosPost'>VOLVER AL PANEL</a></h2><br><br><br>";
	
		/*$this->index();*/	
	}
	
	public function mostrar($idciclo){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$data["idciclo"] = $idciclo;
		$data["ciclo"] = $ciclo->getciclo($idciclo);
		$data["titulo"] = "Modificar Ciclo";

		include_once"Vista/Ciclos/ciclospost_m.php";
	}

	public function actualizarciclo(){
		
		$idciclo = $_POST['idciclo'];
		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$inscripcion = $_POST['inscripcion'];
		$cuota = $_POST['cuota'];
		$total = $cuota * 10 + $inscripcion;
		$ide = 3;

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$ciclo->modificarciclo($idciclo, $detalle, $anio, $inscripcion, $cuota, $total, $ide);

		echo"<br><br><br><h2><h2>El Ciclo se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='http://localhost/colocar url del proyecto/index.php?c=CiclosPost'>VOLVER AL PANEL</a></h2><br><br><br>";
		
		/*$this->index();*/	
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