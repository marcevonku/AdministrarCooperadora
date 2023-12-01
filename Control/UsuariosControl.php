<?php  

class UsuariosControl{

	public function index(){

		require_once"Modelo/usuariosModelo.php";

		$usuarios = new UsuariosModelo();

		$data['titulo'] = 'USUARIOS Y ROLES';

		$data["usuarios"] = $usuarios->get_usuarios();

		require_once"Vista/Usuarios/usuarios.php";	
	}	

	public function nuevo(){

		require_once"Modelo/usuariosModelo.php";

		$usuarios = new UsuariosModelo();

		$data["titulo"] = "Nuevo Usuario";

		$data["usuarios"] = $usuarios->get_rol_select();

		require_once"Vista/Usuarios/usuarios_n.php";
	}

	public function guarda(){

		$apellido = $_POST['apellido'];
		$nombre = $_POST['nombre'];
		$dni = $_POST['dni'];
		$mail = $_POST['mail'];
		$clave = $_POST['clave'];
		$idrol = $_POST['idrol'];
		$estado = $_POST['estado'];

		require_once"Modelo/usuariosModelo.php";
		$usuarios = new UsuariosModelo();

		$usuarios->insertaruser($apellido, $nombre, $dni, $mail, $clave, $idrol, $estado );

		echo"<br><br><br><h2><h2>El Usuario se grabó correctamente.</h2>";
		echo"<br><br><br><h2><a href='index.php?c=Usuarios'>VOLVER AL PANEL</a></h2><br><br><br>";
		
		exit();

		$this->index();
	}

	public function mostrar($idpersona){
 	
 		require_once"Modelo/usuariosModelo.php";

		$usuario = new UsuariosModelo();

		$data["idpersona"] = $idpersona;
		$data["titulo"] = "USUARIOS Y PERMISOS";
		$data["usuario"] = $usuario->get_usuario($idpersona);

		$idrol = $data["usuario"]["idrol"];

		$rol = new UsuariosModelo();

		$data["tiporol"] = $rol->get_rol($idrol);

		$estado = $data["usuario"]["estado"];

		if ($estado == "t") {

			$data["usuario"]["estado"] = "ACTIVO";
			$data["usuario"]["indice"] = 1;
		}

		else{
			$data["usuario"]["estado"] = "INACTIVO";
			$data["usuario"]["indice"] = 0;
		}

		$rolselect = new UsuariosModelo();

		$data["rolselect"] = $rolselect->get_rol_select();

		include_once"Vista/Usuarios/usuarios_m.php";		
	}

	public function modificar(){

	    $idpersona = $_POST['idpersona'];
		$apellido = $_POST['apellido'];
		$nombre = $_POST['nombre'];
		$mail = $_POST['mail'];
		$clave = $_POST['clave'];
		$idrol = $_POST['idrol'];
		$estado = $_POST['estado'];

		require_once'Modelo/usuariosModelo.php';
		
		$usuarios = new UsuariosModelo();
		
		$usuarios->actualizar_usuario($idpersona, $apellido , $nombre, $mail, $clave, $idrol, $estado);

		$this->index();

	}	

}
?>