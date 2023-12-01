<?php 

class CiclosAteControl{

	public function index(){

		require_once"Modelo/ciclosModelo.php";
	
		$ciclos = new CiclosModelo();
			
		$data["titulo"] = "Ciclos Ateneos";
		$data["ciclos"] = $ciclos->get_ciclos_ate();
				
		include_once"Vista/Ciclos/ciclosate.php";
	}

	public function nueva(){

		$data["titulo"] = "Nuevo Ciclo Ateneos";
		require_once"Vista/Ciclos/ciclosate_n.php";
	}

	public function guarda(){

		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$inscripcion = $_POST['inscripcion'];
		$cuota = $_POST['cuota'];
		$total = $cuota * 10 + $inscripcion;
		$ide = 6;
		
		require_once"Modelo/ciclosModelo.php";

		$ciclos = new CiclosModelo();
		$ciclos->insertar($detalle, $anio, $inscripcion, $cuota ,$total, $ide);
		$data["titulo"] = "Ciclos de Ateneos";
	
		/*$this->index();*/	

		echo"<br><br><br><h2><h2>El Ciclo se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='http://localhost/colocar url del proyecto/index.php?c=CiclosAte'>VOLVER AL PANEL</a></h2><br><br><br>";
		exit();

	}
	
	public function mostrar($idciclo){

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$data["idciclo"] = $idciclo;
		$data["ciclo"] = $ciclo->getciclo($idciclo);
		$data["titulo"] = "Modificar Ciclo de Ateneos";

		include_once"Vista/Ciclos/ciclosate_m.php";
	}

	public function actualizarciclo(){
		
		$idciclo = $_POST['idciclo'];
		$detalle = $_POST['detalle'];
		$anio = $_POST['anio'];
		$inscripcion = $_POST['inscripcion'];
		$cuota = $_POST['cuota'];
		$total = $cuota * 10 + $inscripcion;
		$ide = 6;

		require_once"Modelo/ciclosModelo.php";
		
		$ciclo = new CiclosModelo();
		$ciclo->modificarciclo($idciclo, $detalle, $anio, $inscripcion, $cuota, $total, $ide);
		
		/*$this->index();*/	

		echo"<br><br><br><h2><h2>El Ciclo se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='http://localhost/url del proyecto/index.php?c=CiclosAte'>VOLVER AL PANEL</a></h2><br><br><br>";
		exit();
	}

	public function eliminar($idciclo){
	
		require_once"Modelo/ciclosModelo.php";
		$modelo = new CiclosModelo();
		$modelo->eliminarciclo($idciclo);
		$data["titulo"] = "Ciclos de Ateneos";
		$this->index();	
	}
}
?>