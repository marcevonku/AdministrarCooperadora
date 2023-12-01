<?php  


/**
 * 
 */
class DiarioControl{
	
	public function index(){

		require_once"Modelo/cajaModelo.php";

		$data["titulo"] = "Libro Diario";
		$diario = new CajaModelo();
		$data["diario"] = $diario->get_diario();

		require_once"Vista/Caja/diario.php";
	}

	public function diarioexcel(){

		require_once"Modelo/cajaModelo.php";

		$diario = new CajaModelo();

		$data["diario"] = $diario->get_diario();

		$data["titulo"] = "Control de Caja: ".date('d-m-Y / h:m:s')."";

		header("Content-Type:text/html;charset=utf-8");
		header("Content-type: application/vnd.ms-excel; charset= utf8");
		header("Content-Disposition: attachment; filename=Control_caja_".date('Y:m:d:m:s').".xls");

		echo "<html>";
		echo"<table border=1>";
			echo "<caption>".$data["titulo"]."</caption>";
			echo"<thead>";
				echo "<tr> ";
				echo "	<th>Id RECIBO</th> ";
				echo "	<th>Id FACTURA</th> ";
				echo "	<th>FECHA</th> ";
				echo "	<th>DETALLE</th> ";
				echo "	<th>INGRESOS</th> ";
				echo "	<th>EGRESOS</th> ";
				echo "</tr> ";
			echo "</thead> ";			
			echo "<tbody> ";
				foreach($data["diario"] as $dato ) { 
					echo "<tr>";
						echo "<td>". $dato["reciboid"]. "</td>";
						echo "<td>". $dato["facturaid"]. "</td>";
						echo "<td>". $dato["fecha"]. "</td>";
						echo "<td>". $dato["detalle"]. "</td>";
						echo "<td>". $dato["ingreso"]. "</td>";
						echo "<td>". $dato["egreso"]. "</td>";
					echo "</tr>";	
				};
			echo "</tbody> ";
		echo "</table> ";
	}

}
?>

