<?php
session_start();
	class DefaultCtl{
		function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'!Revoluciona, expresate y construye!<br><section><img src="../vista/img/EUniversitarios.jpg"></section><br>', $file);						
						}
					else{
						$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
						$file = str_ireplace('{cuerpo}' ,'Hola '.$_SESSION['usuario'].' ¿Que deseas hacer?', $file);	
						}
						include('../controlador/menuCtl.php');
   						$vista2 = new menuCtl(); 
    					$file = str_replace('{menu}', $vista2 -> menu() , $file);
    					$file = str_replace('{footer}', $vista2 -> menu() , $file);
						echo $file;
		}

	}


?>
