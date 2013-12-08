<?php
session_start();
class cicloCtl{
	
	private $modelo;

	function __construct(){
		include('../modelo/cicloMod.php');
		$this->modelo = new cicloMod(); 
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
								case 'formulario':
									$cuerpo = file_get_contents('../vista/altaciclo.html');
									break;
								case 'insertar':
									$this->modelo->insertar();
									header('location: ../www/index.php?accion=msg&msgcode=2');
									break;
								case 'listar':
									$cuerpo = $this->listar();
									break;
								case 'listarfestivos':
									$cuerpo = $this->listarfestivos();
									break;
								case 'borrar':
										$this->modelo->borrarCiclo();
										header('location: ../www/index.php?accion=ciclo&opcion=listar');
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
			$result = $this->modelo->mostrarciclos();
			$table = file_get_contents('../vista/listacicloshead.html');
			while($row = mysqli_fetch_array($result)){
				$table2 = file_get_contents('../vista/listaciclosrow.html');
				$table2 = str_ireplace('{ciclo}' ,$row['idCiclo'], $table2);
				$table2 = str_ireplace('{fechainicio}' ,$row['fechaInicio'], $table2);
				$table2 = str_ireplace('{fechafin}' ,$row['fechaFin'], $table2);
				$table .= str_ireplace('{festivos}' ,$row['idCiclo'], $table2);
			}$table .= '</table> ';
			return $table;
		}

		function listarfestivos(){
			$result = $this->modelo->mostrardiashabiles();
			$table = '';
			while($row = mysqli_fetch_array($result)){
				$table .= $row['DAYOFMONTH(Dia)']."/".$row['MONTH(Dia)']."<br>";
			}
			return $table;
		}
}

?>