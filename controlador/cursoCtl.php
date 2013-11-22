<?php
session_start();
class cursoCtl{

	public $modelo;
	
	function __construct(){
		
	}

	function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			include('../modelo/cursoMod.php');
			$modelo = new cursoMod(); 
			$opcion = $_REQUEST['opcion'];
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'Usted no ha iniciado sesion', $file);						
						}
					else{
					$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
					if($_SESSION['rol']=='20'){
							// Funciones para cursos
						switch ($opcion) {
							case 'formulario':
								$file = str_ireplace('{cuerpo}' ,file_get_contents('../vista/altacurso.html'), $file);
								break;
							case 'listar':
								$result = $modelo->mostrar();
								$file = str_ireplace('{cuerpo}' , $modelo->tabla($result), $file);
								break;
							case 'insertar':
								$modelo->insertar();
								break;
							case 'borrar':
								$modelo->borrar();
								header('location: ../www/index.php?accion=curso&opcion=listar');
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