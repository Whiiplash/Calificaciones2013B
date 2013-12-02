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
						switch ($_SESSION['rol']) {
							case '10':
								// lalala
								break;
							case '20':
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
									case 'listardiasclase':
										$result = $modelo->listardiasclase();
										$table = '';
										while($row = mysqli_fetch_array($result)){
											$table .= $row['fechaClase']."<br>";
										}
										$file = str_ireplace('{cuerpo}' , $table, $file);
										break;
									case 'listarhorario':
										$result = $modelo->listarhorario();
										$table = '';
										while($row = mysqli_fetch_array($result)){
											$table .= $row['horaInicio']." ".$row['horaFin']."<br>";
										}
										$file = str_ireplace('{cuerpo}' , $table, $file);
										break;
									default:
										header('location: ../www/index.php');
										break;
									}
								break;
							case '30':
								switch ($opcion) {
									case 'listarmateriasalumno':
										$result = $modelo->listarmateriasalumno();
										$table = '';
										while($row = mysqli_fetch_array($result)){
											$table .= $row['nrc']."<br>";
										}
										$file = str_ireplace('{cuerpo}' , $table, $file);
										break;
									default:
										header('location: ../www/index.php');
										break;
									}
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