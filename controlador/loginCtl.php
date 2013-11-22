<?php
session_start();
	class LogCtl{
		function ejecutar(){
			$opcion = $_REQUEST['opcion'];
			$file = file_get_contents('../vista/template.html');
			include('../controlador/menuCtl.php');
			$vista2 = new menuCtl(); 
			$file = str_replace('{menu}', $vista2 -> menu() , $file);
			$file = str_replace('{footer}', $vista2 -> menu() , $file);
			if(!isset($_SESSION['usuario'])){
				switch ($opcion) {
					case 'acceder':
						$file = str_replace('{cuerpo}', file_get_contents('../vista/login.html'), $file);
						break;
					case 'validar':
						include('../modelo/usuarioMod.php');
						$modelo = new usuarioMod(); 
						$modelo->autentificar();
						break;
					default:
						session_destroy();
						header('location: ../www/index.php');
						break;
				}
				}
			else{
				session_destroy();
				header('location: ../www/index.php');
				}
				echo $file;
		}

	}


?>
