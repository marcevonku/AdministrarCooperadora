<?php

class RecibosexcelControl{

	public function index(){

		require_once'Modelo/recibosModelo.php';

		$recibos = new RecibosModelo();
		$data["recibos"] = $recibos->get_recibosexcel();
		$data["titulo"] = 'RECIBOS EXCEL';

		require_once'Vista/Resexcel/recibosexcel.php';
	}

	public function get_recibosexcel_fecha(){

		require_once'Modelo/recibosModelo.php';

		$recibos = new RecibosModelo();
		$data["recibos"] = $recibos->get_recibosexcel_fecha();
		$data["titulo"] = 'RECIBOS EXCEL ORD.FECHA';

		require_once'Vista/Resexcel/recibosexcel.php';
	}


	public function get_recibosexcel_recibo(){

		require_once'Modelo/recibosModelo.php';

		$recibos = new RecibosModelo();
		$data["recibos"] = $recibos->get_recibosexcel_recibo();
		$data["titulo"] = 'RECIBOS EXCEL ORD. NUM. RECIBO';

		require_once'Vista/Resexcel/recibosexcel.php';
	}

	public function get_recibosexcel_apellido(){

		require_once'Modelo/recibosModelo.php';

		$recibos = new RecibosModelo();
		$data["recibos"] = $recibos->get_recibosexcel_apellido();
		$data["titulo"] = 'RECIBOS EXCEL ORD. APELLIDO';

		require_once'Vista/Resexcel/recibosexcel.php';
	}

	public function get_recibosexcel_dni(){

		require_once'Modelo/recibosModelo.php';

		$recibos = new RecibosModelo();
		$data["recibos"] = $recibos->get_recibosexcel_dni();
		$data["titulo"] = 'RECIBOS EXCEL ORD.DNI';

		require_once'Vista/Resexcel/recibosexcel.php';
	}


}
?>