<?php
session_start();
	class LogCtl{
		function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			include('../controlador/menuCtl.php');
			$vista2 = new menuCtl(); 
			$file = str_replace('{menu}', $vista2 -> menu() , $file);
			$file = str_replace('{footer}', $vista2 -> menu() , $file);
			if(!isset($_SESSION['usuario'])){
						$file = str_replace('{cuerpo}', file_get_contents('../vista/login.html'), $file);						
						}
					else{
						session_destroy();
						header('location: ../www/index.php');
						}
						echo $file;
		}

	}


?>
