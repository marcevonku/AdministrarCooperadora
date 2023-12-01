<?php  

//echo "encontro el archivo del modelo";

class RecibosModelo{

	private $db;
	private $recibos;
	private $total;

	public function __construct(){

		$this->db = Conectar::conexion();
		$this->recibos = array();
	}


//Función que muestra el total de los recibos dentro del sistema

	public function get_recibos(){
		$sql = "SELECT idrecibo, fecha, apellido, nombre, dni, nombrecarrera, resolucion, monto, trans, temporal
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where carreras.ide < 7
		order by idrecibo desc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

	//Función para reunir los recibos que no están relacionados con ninguna carrera, curso o evento. 
	//El idpersona de estos recibos solo los encontraremos en tabla persona

	public function get_recibos_donacion(){
		$sql = "SELECT idrecibo, fecha, apellido, nombre, dni, nombrecarrera, resolucion, monto, trans 
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		WHERE recibos.carreraid = 45
		order by idrecibo desc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}


	public function get_recibos_obsequios(){
		$sql = "SELECT idrecibo, fecha, apellido, nombre, dni, nombrecarrera, resolucion, monto
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		WHERE recibos.ide = 7 and recibos.carreraid = 60
		order by idrecibo desc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

	//Función: Toda inserción de recibos pasa por esta función. Para realizar una inserción se deben especificar los valores de cada campo

	public function insert_recibos($fecha, $personaid, $carreraid, $monto, $ide, $pago, $detalle, $temporal, $usuarioid, $trans){

		$sql = "INSERT INTO recibos(idrecibo, fecha, personaid, carreraid, monto, ide, pago, detalle, temporal, usuarioid, trans)VALUES (default, '$fecha', $personaid, $carreraid, $monto, $ide, $pago, '$detalle', '$temporal', $usuarioid, '$trans');";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error: ".pg_last_error()."," .pg_result_error_field());
	}

	//función para traer total de aportes de una idpersona respecto  de una idcarrera => ide =  carrera, curso o evento
	//la consulta se hace sobre la tabla recibos
	//El parámetro ide hace referencia a que tipo de curso, carrera o evento
	//ide 1 al 6 = carrera, curso o evento
	//ide 7 = donación 

	public function get_aportes($personaid, $ide){

		$sql = "SELECT idrecibo, Apellido, nombre, dni, nombrecarrera, fecha, monto FROM recibos 
		inner join personas 
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		WHERE recibos.personaid = $personaid and recibos.ide = $ide;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){
			


			$this->recibos[] = $row;
		}
	
		return $this->recibos;
	}



	public function get_aportes1($personaid, $ide){

		$sql = "SELECT idrecibo, Apellido, nombre, dni, fecha, monto FROM recibos 
		inner join personas 
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		WHERE recibos.personaid = $personaid and recibos.ide = $ide;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_array($resultado)){

			$this->recibos[] = $row;
		}
	
		return $this->recibos;
	}


	//función que retorna el total de los recibos idpersona => idcarrera = sifra total

	public function get_total_recibos($personaid, $ide){

		$sql = "SELECT sum(monto) FROM recibos WHERE personaid = $personaid and ide = $ide;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_array($resultado);
	
		return $row;
	}

	//Funcón que solo devuelve los datos de un solo recibo se pasa como parámetro el indentificador de recibo

	public function get_recibo($idrecibo){
			$sql = "SELECT idrecibo, fecha, carreraid, personaid, monto, ide, pago, trans, detalle, usuarioid FROM recibos WHERE idrecibo = $idrecibo;";
			$resultado = pg_query($sql) or die("Detalle del Error:".pg_last_error());
			$row = pg_fetch_assoc($resultado);
		 	 return $row;
	}

	//función que retorna todos los recibos emitidos respecto de una fecha pasada como parámetro

	public function get_recibosc($fecha){

		$sql = "SELECT idrecibo, fecha, apellido, nombre, dni, nombrecarrera, resolucion, monto,
		trans, pago, detalle, usuarioid, temporal
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha'
		ORDER BY idrecibo DESC;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

			while ($row = pg_fetch_assoc($resultado)){
				$this->recibos[] = $row;
			}
		return $this->recibos;
	}

	//función que retorna la suma total del monto de los recibos emitidos respecto de una fecha

	public function get_reciboscf($fecha){
		
		$sql = "SELECT sum(monto)
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha';";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);
		return $row;
	}


	//Función que retorna la suma total de los recibos emitidos y pagados en efectivo  respecto de una fecha

	public function get_reciboscontado($fecha){
		$sql = "SELECT sum(monto)
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha' and recibos.pago = 1;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);
		return $row;
	}

	//Función que retorna la suma total de los recibos emitidos y pagados con transferencia respecto de una fecha

	public function get_recibostransferencia($fecha){
		$sql = "SELECT sum(monto)
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha' and recibos.pago = 2;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);
		return $row;
	}

	//Función que retorna la suma total de los recibos emitidos pagados con colaboraciones y trabajos dentro de la institución respecto de una fecha 
	//El valor retornado no será sumados al total de recaudaciones porque no ingresa dinero dentro del sistema 


	public function get_reciboscompensacion($fecha){
		$sql = "SELECT sum(monto)
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha' and recibos.pago = 3;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);
		return $row;
	}

	//Función que retorna la suma total de los recibos emitidos a fovor de alumnos becados respecto de una fecha 
	//El valor retornado no será sumados al total de recaudaciones porque no ingresa dinero dentro del sistema
	 

	public function get_recibosbecados($fecha){
		$sql = "SELECT sum(monto)
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha' and recibos.pago = 4;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);
		return $row;
	}

	public function get_recibosbonificados($fecha){
		$sql = "SELECT sum(monto)
		FROM recibos
		inner join personas
		on recibos.personaid = personas.idpersona
		inner join carreras
		on recibos.carreraid = carreras.idcarrera
		where recibos.fecha = '$fecha' and recibos.pago = 5;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		$row = pg_fetch_assoc($resultado);
		return $row;
	}

		public function actualizar_recibo($idrecibo, $personaid, $carreraid, $monto, $ide, $pago, $detalle, $usuarioid, $trans){

		$sql = "UPDATE recibos SET personaid = $personaid, carreraid = $carreraid, monto = $monto, ide = $ide, pago = $pago, detalle = '$detalle', usuarioid = $usuarioid, trans = '$trans' WHERE idrecibo = $idrecibo;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error: ".pg_last_error()."," .pg_result_error_field());
	}

	public function get_recibosexcel(){
		$sql = "SELECT *
		FROM resexcel;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

	public function get_recibosexcel_fecha(){
		$sql = "SELECT *
		FROM resexcel
		order by fecha asc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

	public function get_recibosexcel_recibo(){
		$sql = "SELECT *
		FROM resexcel
		order by num_recibo asc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

	public function get_recibosexcel_apellido(){
		$sql = "SELECT *
		FROM resexcel
		order by apellido_nombre;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

	public function get_recibosexcel_dni(){
		$sql = "SELECT *
		FROM resexcel
		order by dni asc;";

		$resultado = pg_query($this->db,$sql) or die("Detalle del Error:".pg_last_error());

		while ($row = pg_fetch_assoc($resultado)){
			$this->recibos[] = $row;
		}
	return $this->recibos;
	}

}
?>
