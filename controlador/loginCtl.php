<?php
session_start();
	class LogCtl{
		function ejecutar(){
			$file = file_get_contents('../vista/template.html');
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
