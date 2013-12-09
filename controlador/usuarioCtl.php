<?php
session_start();
class usuarioCtl{
	
	private $modelo;

	function __construct(){
		include('../modelo/usuarioMod.php');
		$this->modelo = new usuarioMod(); 
	}

	function ejecutar(){
			$file = file_get_contents('../vista/template.html');
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
									$this->modelo->insertarUsuario();
									header('location: ../www/index.php?accion=msg&msgcode=4');
									break;
								case 'formanuevoalumno':
									$cuerpo = $this->formanuevoalumno();
									break;
								case 'listarusuarios':
										$cuerpo = $this->listar();
										break;
								case 'borrar':
										$this->modelo->borrarUsuario();
										header('location: ../www/index.php?accion=usuario&opcion=listarusuarios');
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
							$cuerpo = 'Usted no tiene privilegios suficientes para realizar esta acción';
							break;
					}
				}
				include('../controlador/menuCtl.php');
				$vista2 = new menuCtl(); 
				$file = str_ireplace('{cuerpo}' , $cuerpo, $file);
				$file = str_replace('{menu}', $vista2 -> menu() , $file);
				$file = str_replace('{footer}', $vista2 -> menu() , $file);
				echo $file;
		}

		function listar(){
			$result = $this->modelo->obtenerUsuarios();
			$table = '';
			while($row = mysqli_fetch_array($result)){
				$table .= $row['codigo']." ".$row['nombreCompleto']." ".$row['correo'].
				" <a href=index.php?accion=usuario&opcion=borrar&codigo=".$row['codigo'].">borrar</a><br>";
			}
			return $table;
		}

		function formanuevoalumno(){
			$file = file_get_contents('../vista/altaalumno.html');
			$result = $this->modelo->obtenerCarreras();
			$dropdown = '';
			while($carreras = mysqli_fetch_array($result)){
				$dropdown .= '<option value="'.$carreras['idCarrera'].'">'.$carreras['nombreCarrera'].'</option>';
			}
			$file = str_replace('{carreras}', $dropdown, $file);
			return $file;
		}
}

?>