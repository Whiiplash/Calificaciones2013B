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
										$table = file_get_contents('../vista/listacursosheader.html');
										$table2 = file_get_contents('../vista/listacursosrow.html');
										while($row = mysqli_fetch_array($result)){
											$table2 = file_get_contents('../vista/listacursosrow.html');
											$table2 = str_ireplace('{nrc}' ,$row['nrc'], $table2);
											$table2 = str_ireplace('{nombre}' ,$row['nombreCurso'], $table2);
											$table2 = str_ireplace('{seccion}' ,$row['seccionCurso'], $table2);
											$table2 = str_ireplace('{academia}' ,$row['nombreAcademia'], $table2);
											$table2 = str_ireplace('{idciclo}' ,$row['idCiclo'], $table2);
											$table .= str_ireplace('{idcurso}' ,$row['idCurso'], $table2);
										}$table .= '</tr></table> ';
										$file = str_ireplace('{cuerpo}' , $table, $file);
										break;
									case 'verlistaalumnos':
										$result = $modelo->verlistaalumnos();
										$table = file_get_contents('../vista/listaAsistenciaheader.html');
										//var_dump($result->num_rows);
										while($row = mysqli_fetch_array($result)){
											//var_dump($row);
											$table .= "<th>".$row['DAYOFMONTH(Dia)']."/".$row['MONTH(Dia)']."</th>";
											$ids[] = $row['id'];
										}
										$nrc = $_REQUEST['nrc'];
										//var_dump($nrc);
										$table .= '</tr>';
										$table2 = '<tr><td>{alumno}</td>';
										for ($i=0; $i < $result->num_rows; $i++) { 
											$table2 .= file_get_contents('../vista/listaAsistenciarow.html');
											$table2 = str_replace('{nombre}', 'check'.$nrc.'a'.$ids[$i], $table2);
										}
										$table2 .= '</tr>';
										$result = $modelo->listapormateria();
										//var_dump($result);
										$table3 = '';
										while($row = mysqli_fetch_array($result)){
											//$table3 = $row['nrc']." ".$row['nrc']."<br>";
											//$table3 = $row['idciclo']." ".$row['idCiclo']."<br>";
											$table3 .= str_ireplace('{alumno}' ,$row['nombreCompleto'], $table2);
										}
										$table3 .= '</table></section>';
										$table .=$table3;
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