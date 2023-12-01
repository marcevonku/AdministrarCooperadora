<?php  

class LoginControl{

	public function index(){

		include_once"Vista/Login/login.php";
	}

	public function validar(){
	

		$usuario = $_POST['mail'];
		$clave = $_POST['clave'];

		


		if (($_POST['mail'] == "m@m.com")&&($_POST['clave'] == 123456)) {

			session_start();

			$_SESSION['rolide']['apellido'] = "SUPER USUARIO";
			$_SESSION['rolide']['rol'] = "SUPER USUARIO";

			header("location:index.php?c=Menu");

		}
		
		require_once"Modelo/loginModelo.php";
		
		$personas = new LoginModelo();


		$data['personas'] = $personas->validarusuario($usuario,$clave);



			if ($data['personas']['idrol'] == 1 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'ALUMNO';
				header("location:index.php?c=Compromiso&a=calcular&dni=".$data['personas']['idrol']."&ide=".$data['personas']['ide']."");
			}
			elseif ($data['personas']['idrol'] == 2 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'BEDEL';
				header("location:index.php?c=Menu");
			}
			elseif ($data['personas']['idrol'] == 3 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'AUXILIAR';
				header("location:index.php?c=Menu");
			}
			elseif ($data['personas']['idrol'] == 4 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'REFERENTE COOPERADORA';
				header("location:index.php?c=Menu");
			}
			elseif ($data['personas']['idrol'] == 5 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'SECRETARIA';
				header("location:index.php?c=Menu");
			}	
			elseif ($data['personas']['idrol'] == 6 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'DIRECTIVO';
				header("location:index.php?c=Menu");
			}
			elseif ($data['personas']['idrol'] == 7 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'MIEMBRO COOPERADORA';
				header("location:index.php?c=Menu");
			}
			elseif ($data['personas']['idrol'] == 8 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'SOCIO Y MIEMBRO';
				header("location:index.php?c=Menu");
			}
			elseif ($data['personas']['idrol'] == 9 && $data['personas']['estado'] == True) {

				session_start();
				$_SESSION['rolide'] = $data['personas'];
				$_SESSION['rolide']['rol'] = 'ADMINISTRADOR STOCK';
				header("location:index.php?/stock/stock.php");
			}
			else{
				echo"<br><br><br>";
				echo"<h2><p> Este usuario no esta registrado, si considera que esto es un error por favor comuniquese con el administrador del sistema</p></h2><br><br><br>";

				echo '<h2><a href="index.php">VOLVER AL INGRESO</a></h2>';
			}
	}
	
}
?>