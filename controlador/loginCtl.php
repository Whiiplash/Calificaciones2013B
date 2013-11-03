<?php
session_start();
	class LogCtl{
		function ejecutar(){
			if(!isset($_SESSION['usuario'])){
						$file = file_get_contents('../vista/login.html'); 						
						}
					else{
						session_destroy();
						header('location: ../www/index.php');
						}
						echo $file;
		}

	}


?>
