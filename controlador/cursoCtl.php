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
										// $result = $modelo->mostrar();
										// $file = str_ireplace('{cuerpo}' , $modelo->tabla($result), $file);
										// break;
										$result = $modelo->mostrar();
										// $table = '';
										// while($row = mysqli_fetch_array($result)){
										// 	$table .= $row['nrc'].
										// 				"<a href=\"index.php?accion=curso&opcion=listarhorario&nrc=".$row['nrc']."\">Horario</a> ".
										// 				"<a href=\"index.php?accion=curso&opcion=listapormateria&nrc=".$row['nrc']."\">Lista</a> ".
										// 				"<a href=\"index.php?accion=curso&opcion=listardiasclase&nrc=".$row['nrc']."\">DiasClase</a> "
										// 				.$row['idCiclo']." "
										// 				.$row['idCurso']."<br>";
										// 	}


										$table = file_get_contents('../vista/listacursosheader.html');
										$table2 = file_get_contents('../vista/listacursosrow.html');
										while($row = mysqli_fetch_array($result)){
											$table2 = file_get_contents('../vista/listacursosrow.html');
											$table2 = str_ireplace('{nrc}' ,$row['nrc'], $table2);
											$table2 = str_ireplace('{nombre}' ,$row['nombreCurso'], $table2);
											$table2 = str_ireplace('{seccion}' ,$row['seccionCurso'], $table2);
											$table2 = str_ireplace('{academia}' ,$row['nombreAcademia'], $table2);
											$table .= str_ireplace('{idcurso}' ,$row['idCurso'], $table2);
										}$table .= '</tr></table> ';

										//var_dump($table);

										$file = str_ireplace('{cuerpo}' , $table, $file);
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
											$table .= $row['nombreDia']." ".$row['horaInicio']." ".$row['horaFin']."<br>";
										}
										$file = str_ireplace('{cuerpo}' , $table, $file);
										break;
									case 'tabla':
										$result = $modelo->listarhorario();
										$table = '';
										while($row = mysqli_fetch_array($result)){
											$table .= $row['nombreDia']." ";
										}
										$result = $modelo->listapormateria();
										while($row = mysqli_fetch_array($result)){
											$table .= "<br>".$row['codigo']." ".$row['nombreCompleto'];
										}
										$file = str_ireplace('{cuerpo}' , $table, $file);
										break;
									case 'listapormateria':
										$result = $modelo->listapormateria();
										$table = '';
										while($row = mysqli_fetch_array($result)){
											$table .= $row['codigo']." ".$row['nombreCompleto']."<br>";
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
											$table .= $row['idCurso']." ".$row['nombreCurso']."<br>";
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