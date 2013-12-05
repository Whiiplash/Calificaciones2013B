<?php
session_start();
class cicloCtl{
	
	function __construct(){

	}

	function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			include('../modelo/usuarioMod.php');
			$modelo = new usuarioMod(); 
			$opcion = $_REQUEST['opcion'];
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'Usted no ha iniciado sesion', $file);						
						}
					else{
					$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
					switch ($_SESSION['rol']) {
						case '10':
							switch ($opcion) {
								case 'insertar':
									$modelo->insertarUsuario();
									header('location: ../www/index.php?accion=msg&msgcode=4');
									break;
								default:
									header('location: ../www/index.php');
									break;
							}
							break;
						case '20':
							# code...
							break;
						case '30':
							# code...
							break;
						default:
							$file = str_ireplace('{cuerpo}' ,'Usted no tiene privilegios suficientes para realizar esta acción', $file);
							break;
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