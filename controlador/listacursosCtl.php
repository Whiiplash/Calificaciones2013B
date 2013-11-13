<?php
session_start();
class listacursosCtl{

	public $modelo;
	
	function __construct(){

	}

	function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'Usted no ha iniciado sesion', $file);						
						}
					else{
					$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
					if($_SESSION['rol']=='20'){
							//$file = file_get_contents('../vista/altaciclo.html');
							$file = str_ireplace('{cuerpo}' ,file_get_contents('../vista/listacursos.html'), $file);
						} else{
							$file = str_ireplace('{cuerpo}' ,'Usted no tiene privilegios suficientes para realizar esta acción', $file);
						}
						}
						include('../controlador/menuCtl.php');
						$vista2 = new menuCtl(); 
						$file = str_replace('{menu}', $vista2 -> menu() , $file);
						$file = str_replace('{footer}', $vista2 -> menu() , $file);
						echo $file;
		}
}

?>
