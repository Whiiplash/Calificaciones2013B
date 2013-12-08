<?php
session_start();
class cursoCtl{

	public $modelo;
	
	function __construct(){
		include('../modelo/cursoMod.php');
		$this->modelo = new cursoMod(); 
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
									case 'listar':
										$cuerpo = $this->listar();
										break;
									case 'listarporciclo':
										$cuerpo = $this->listarPorCiclo();
										break;
									default:
										header('location: ../www/index.php');
										break;
								}
								break;
							case '20':
								switch ($opcion) {
									case 'formulario':
										$cuerpo = $this->formulario();
										break;
									case 'listar':
										$cuerpo = $this->listar();
										break;
									case 'verlistaalumnos':
										$cuerpo = $this->verlistaalumnos();
										break;
									case 'pdfexport':
										$this->pdfexport();
										break;
									case 'insertar':
										$this->modelo->insertar();
										break;
									case 'borrar':
										$this->modelo->borrar();
										header('location: ../www/index.php?accion=curso&opcion=listar');
										break;
									case 'listardiasclase':
										$cuerpo = $this->listardiasclase();
										break;
									case 'listarhorario':
										$cuerpo = $this->listarhorario();
										break;
									case 'listapormateria':
										$cuerpo = $this->listapormateria();
										break;
									default:
										header('location: ../www/index.php');
										break;
									}
								break;
							case '30':
								switch ($opcion) {
									case 'listarmateriasalumno':
										$cuerpo = $this->listarmateriasalumno();
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
						$file = str_ireplace('{cuerpo}' , $cuerpo, $file);
						$file = str_replace('{menu}', $vista2 -> menu() , $file);
						$file = str_replace('{footer}', $vista2 -> menu() , $file);
						echo $file;
		}

	function listarmateriasalumno(){
		$result = $this->modelo->listarmateriasalumno();
		$table = '';
		while($row = mysqli_fetch_array($result)){
			$table .= $row['idCurso']." ".$row['nombreCurso']."<br>";
		}
		return $table;
	}

	function listar(){
		$result = $this->modelo->mostrar();
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
		return $table;
	}

	function listarPorCiclo(){
		$result = $this->modelo->listarPorCiclo();
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
		return $table;
	}

	function formulario(){
		$result = $this->modelo->obtenerAcademia();
		$file = file_get_contents('../vista/altacurso.html');
		$dropdown = '';
		while($academia = mysqli_fetch_array($result)){
			$dropdown .= '<option>'.$academia['nombreAcademia'].'</option>';
		}
		$file = str_replace('{academia}', $dropdown, $file);
		$result = $this->modelo->obtenerCiclos();
		$dropdown = '';
		while($ciclos = mysqli_fetch_array($result)){
			$dropdown .= '<option>'.$ciclos['idCiclo'].'</option>';
		}
		$file = str_replace('{ciclos}', $dropdown, $file);
		return $file;
	}

	function verlistaalumnos(){
		$result = $this->modelo->verlistaalumnos();
		$table = file_get_contents('../vista/listaAsistenciaheader.html');
		while($row = mysqli_fetch_array($result)){
			$table .= "<th>".$row['DAYOFMONTH(Dia)']."/".$row['MONTH(Dia)']."     </th>";
			$ids[] = $row['id'];
		}
		$nrc = $_REQUEST['nrc'];
		$table .= '</tr>';
		$table2 = '<tr><td>{alumno}</td>';
		for ($i=0; $i < $result->num_rows; $i++) { 
			$table2 .= file_get_contents('../vista/listaAsistenciarow.html');
			$table2 = str_replace('{valor}', $nrc.'_{alumnoCodigo}_'.$ids[$i], $table2);
		}
		$table2 .= '</tr>';
		$result = $this->modelo->listapormateria();
		$table3 = '';
		while($row = mysqli_fetch_array($result)){
			$table3 .= str_ireplace(array('{alumno}','{alumnoCodigo}'),
									array($row['nombreCompleto'],$row['codigo']), $table2);
			//$table3 .= str_ireplace('{alumnoCodigo}' ,$row['codigo'], $table3);
		}
		$table3 .= '</table></section>';
		$table .=$table3;
		return $table;
	}

	function listardiasclase(){
		$result = $this->modelo->listardiasclase();
		$table = '';
		while($row = mysqli_fetch_array($result)){
			$table .= $row['fechaClase']."<br>";
		}
		return $table;
	}

	function listarhorario(){
		$result = $this->modelo->listarhorario();
		$table = '';
		while($row = mysqli_fetch_array($result)){
			$table .= $row['nombreDia']." ".$row['horaInicio']." ".$row['horaFin']."<br>";
		}
		return $table;
	}

	function listarpormateria(){
		$result = $this->modelo->listapormateria();
		$table = '';
		while($row = mysqli_fetch_array($result)){
			$table .= $row['codigo']." ".$row['nombreCompleto']."<br>";
		}
		return $table;
	}
	function pdfexport(){
		require('../sources/fpdf17/fpdf.php');
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->writehtml($this->verlistaalumnos());
		$pdf->Output();

	}
}

?>