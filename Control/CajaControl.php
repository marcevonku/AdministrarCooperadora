<?php  

class CajaControl{

	public function index(){
		
		$fecha = $_POST["fecha"];

		$data["titulo"] = "Control de Caja";

		
	if(empty($fecha)){


		$hoy = getdate();

		$anio = $hoy["year"];
		$mes = $hoy["mon"];
		$dia = $hoy["mday"];
		$fecha = $anio ."-". $mes ."-". $dia;

	}

		$data["fecha"] = $fecha;


		require_once"Modelo/recibosModelo.php";
		require_once"Modelo/cajaModelo.php";

		$recibos = new RecibosModelo();
		$caja = new CajaModelo();


		$data["recibos"] = $recibos->get_recibosc($fecha); //retorna array de recibos

		$data["recaud"] = $recibos->get_reciboscf($fecha); //retorna la sifra total de la recaudación

		$data["contado"] = $recibos->get_reciboscontado($fecha); //retorna la sifra total de los recibos pagados de contado

		$data["transferencia"] = $recibos->get_recibostransferencia($fecha); //retorna el total de los recibos pagados con transferencia 

		$data["compensacion"] = $recibos->get_reciboscompensacion($fecha); // Retorna el total de los recibos pagados con trabajo

		$data["becados"] = $recibos->get_recibosbecados($fecha); // retorna el total de los recibos librados como becas que no se sumaran al monto total ya que no ingresa efectivo.

		$data["bonificados"] = $recibos->get_recibosbonificados($fecha); // retorna el total de los recibos librados como bonificados por pago o cancelación anticipada que no se sumaran al monto total ya que no ingresa efectivo.

		$data["egreso1"] = $caja->get_egresos($fecha); // función que devuelve el total de egresos desde el asiento de caja. ( ATENSIÓN: Los registros de COMPENSACIÓN, BECADOS, BONIFICADOS  a nivel de libro diario son acentados tanto en entrada como en salida de dinero en la tabla caja. Es por esta razón que si el valor del resultado es negativo se debe enviar a la vista el valor 0 (cero))

		$data["egreso"]["sum"] = $data["egreso1"]["sum"] - $data["compensacion"]["sum"] - $data["becados"]["sum"] - $data["bonificados"]["sum"];


		$data["recaudacion"]["sum"] = $data["contado"]["sum"] + $data["transferencia"]["sum"];

		/* - $data["compensacion"]["sum"] - $data["becados"]["sum"] - $data["egreso"]["sum"];*/

		$data["rendicion"]["sum"] = $data["contado"]["sum"] - $data["egreso"]["sum"];

		require_once"Vista/Caja/caja.php";

	}

	public function cajaexcel(){

		require_once"Modelo/recibosModelo.php";

		$fecha = $_POST["fecha"];

		//$data["titulo"] = "Control de caja: ".date('d-m-Y / h:m:s')."";
		

		$originalDate = $fecha;
        $newDate = date("d/m/Y", strtotime($originalDate));
		
		$data["titulo"] = "Control de caja: ".$newDate."";

		$recibos = new RecibosModelo();

		$data["recibos"] = $recibos->get_recibosc($fecha);


		header("Content-Type:text/html;charset=utf-8");
		header("Content-type: application/vnd.ms-excel; charset= utf8");
		//header("Content-Disposition: attachment; filename=Control_caja_".date('Y:m:d:m:s').".xls");
		header("Content-Disposition: attachment; filename=Control_caja_".$newDate.".xls");

		echo "<html>";
		echo"<table border=1>";
			echo "<caption>".$data["titulo"]."</caption>";
			echo"<thead>";
				echo "<tr> ";
				echo "	<th>ID</th> ";
				echo "	<th>FECHA</th> ";
				echo "	<th>APELLIDO</th> ";
				echo "	<th>NOMBRE</th> ";
				echo "	<th>DNI</th> ";
				echo "	<th>CARRERA</th> ";
				echo "	<th>RESOLUCION</th> ";
				echo "	<th>MONTO</th> ";
				echo "	<th>PAGO</th> ";
				echo "	<th>TRANS</th> ";
				echo "	<th>DETALLE</th> ";
				echo "	<th>USUARIO</th> ";
				echo "	<th>TEMPORAL</th> ";
				echo "	<th>EFECTIVO</th> ";
				echo "	<th>TRANSFERENCIA</th> ";
				echo "	<th>COMPENSACIÓN</th> ";
				echo "	<th>BECADOS</th> ";
				echo "	<th>GASTOS</th> ";
				echo "</tr> ";
				echo "<tbody> ";
					foreach($data["recibos"] as $dato ) { 
						echo "<tr>";
							echo "<td>". $dato["idrecibo"]. "</td>";
							echo "<td>". $dato["fecha"]. "</td>";
							echo "<td>". $dato["apellido"]. "</td>";
							echo "<td>". $dato["nombre"]. "</td>";
							echo "<td>". $dato["dni"]. "</td>";
							echo "<td>". $dato["nombrecarrera"]. "</td>";
							echo "<td>". $dato["resolucion"]. "</td>";
							echo "<td>". $dato["monto"]. "</td>";
							echo "<td>". $dato["pago"]. "</td>";
							echo "<td>". $dato["trans"]. "</td>";
							echo "<td>". $dato["detalle"]. "</td>";
							echo "<td>". $dato["usuarioid"]. "</td>";
							echo "<td>". $dato["temporal"]. "</td>";

/*AQUI DEBO COLOCAR CONTENIDO A LAS SIGUIENTES LINEAS, DE LO CONTRARIO DA ERROR

							echo "<td>". $dato["1"]. "</td>";
							echo "<td>". $dato["2"]. "</td>";
							echo "<td>". $dato["3"]. "</td>";
							echo "<td>". $dato["4"]. "</td>";
*/
						echo "</tr>";
					};
				echo "</tbody> ";
			echo "</thead> ";	
		echo "</table> ";
	}
}
?>
