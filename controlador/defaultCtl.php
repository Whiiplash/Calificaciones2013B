<?php
session_start();
	class DefaultCtl{
		function ejecutar(){
			if(!isset($_SESSION['usuario'])){
						$file = file_get_contents('../vista/template.html');
						$file = str_ireplace('{cuerpo}' ,'Mensaje de Bienvenida para invitados', $file);						
						}
					else{
						$file = file_get_contents('../vista/template.html');
						$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
						$file = str_ireplace('{cuerpo}' ,'Hola '.$_SESSION['usuario'], $file);	
						}
						include('../controlador/menuCtl.php');
   						$vista2 = new menuCtl(); 
    					$file = str_replace('{menu}', $vista2 -> menu() , $file);
						echo $file;
		}

	}


?>
