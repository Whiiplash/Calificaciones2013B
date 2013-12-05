<?php
session_start();
class cicloCtl{
	
	function __construct(){

	}

	function ejecutar(){
			$file = file_get_contents('../vista/template.html');
			include('../modelo/cicloMod.php');
			$modelo = new cicloMod(); 
			$opcion = $_REQUEST['opcion'];
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'Usted no ha iniciado sesion', $file);						
						}
					else{
					$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
					switch ($_SESSION['rol']) {
						case '10':
							switch ($opcion) {
								case 'formulario':
									$file = str_ireplace('{cuerpo}' ,file_get_contents('../vista/altaciclo.html'), $file);
									break;
								case 'insertar':
									$modelo->insertar();
									header('location: ../www/index.php?accion=msg&msgcode=2');
									break;
								case 'listar':
									$result = $modelo->mostrarciclos();
									$table = file_get_contents('../vista/listacicloshead.html');
									while($row = mysqli_fetch_array($result)){
										$table2 = file_get_contents('../vista/listaciclosrow.html');
										$table2 = str_ireplace('{ciclo}' ,$row['idCiclo'], $table2);
										$table2 = str_ireplace('{fechainicio}' ,$row['fechaInicio'], $table2);
										$table2 = str_ireplace('{fechafin}' ,$row['fechaFin'], $table2);
										$table .= str_ireplace('{festivos}' ,$row['idCiclo'], $table2);
									}$table .= '</table> ';
									$file = str_ireplace('{cuerpo}' , $table, $file);
									break;
								case 'listarfestivos':
									$result = $modelo->mostrardiashabiles();
									$table = '';
									//var_dump($result);
									while($row = mysqli_fetch_array($result)){
										//var_dump($row);
										$table .= $row['DAYOFMONTH(Dia)']."/".$row['MONTH(Dia)']."<br>";
									}
									$file = str_ireplace('{cuerpo}' , $table, $file);
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