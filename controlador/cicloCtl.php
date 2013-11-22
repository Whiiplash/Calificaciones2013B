<?php
session_start();
class cicloCtl{

	public $modelo;
	
	function __construct(){

	}

	function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			$opcion = $_REQUEST['opcion'];
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'Usted no ha iniciado sesion', $file);						
						}
					else{
					$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
					if($_SESSION['rol']=='10'){
							/// Funciones del admin para ciclo
						switch ($opcion) {
							case 'formulario':
								$file = str_ireplace('{cuerpo}' ,file_get_contents('../vista/altaciclo.html'), $file);
								break;
							case 'insertar':
								include('../modelo/cicloMod.php');
								$validate = new cicloMod(); 
								$validate->insertar();
								header('location: ../www/index.php?accion=msg&msgcode=2');
								break;
							default:
								header('location: ../www/index.php');
								break;
						}
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