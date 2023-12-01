<?php  

/* Aqui mendiante la concatenación se arman las tutas para tener accesos a los archivos 
Estos archivos son los que contienen dentro e controlador 
Dentro de cada archivo se encuentran las acciones que se pueden realizar sobre cada objeto
*/


function cargarControlador($controlador){

	$nombreControlador = ($controlador)."Control";
	$archivoControlador = 'Control/'.($controlador).'Control.php';

	if(!isset($archivoControlador)){
		$archivoControlador = 'Control/'.CONTROLADOR_PRINCIPAL.'.php';
	}
	require_once"$archivoControlador";
	$control = new $nombreControlador();
	return $control;
}

function cargarAccion($controller, $accion, $id = null){

	if(isset($accion) && method_exists($controller, $accion)){
		
		if($id == null){
	
			$controller->$accion();
	
		}else{
	
			$controller->$accion($id);
		}

	}else{
	
		$controller->ACCION_PRINCIPAL();
	
	}

}

?>