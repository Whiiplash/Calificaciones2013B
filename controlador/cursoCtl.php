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
			$cuerpo = '';
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
									case 'insertarAsistencias':
										$this->insertarAsistencias();
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
		$file = file_get_contents('../vista/altacurso.html');
		
		$result = $this->modelo->obtenerAcademia();
		$dropdown = '';
		while($academia = mysqli_fetch_array($result)){
			$dropdown .= '<option value="'.$academia['idAcademia'].'"">'.$academia['nombreAcademia'].'</option>';
		}
		$file = str_replace('{academia}', $dropdown, $file);

		$result = $this->modelo->obtenerCiclos();
		$dropdown = '';
		while($ciclos = mysqli_fetch_array($result)){
			$dropdown .= '<option>'.$ciclos['idCiclo'].'</option>';
		}
		$file = str_replace('{ciclos}', $dropdown, $file);

		$result = $this->modelo->obtenerMaterias();
		$dropdown = '';
		while($materias = mysqli_fetch_array($result)){
			$dropdown .= '<option>'.$materias['idCurso'].' '.$materias['nombreCurso'].'</option>';
		}
		$file = str_replace('{materia}', $dropdown, $file);

		return $file;
	}

	function verlistaalumnos(){
		$result = $this->modelo->verlistaalumnos();
		$table = file_get_contents('../vista/listaAsistenciaheader.html');
		$script = file_get_contents('../www/js/asistensia.js');
		//
		$script2 = '';
		
		while($row = mysqli_fetch_array($result)){
			$table .= "<th>".$row['DAYOFMONTH(Dia)']."/".$row['MONTH(Dia)']."     </th>";
			$ids[] = $row['id'];
		}


		for ($i=0; $i< $result->num_rows; $i++) { 
			$script2 .= str_replace('{diaclass}', $ids[$i], $script);
		}
		$table = str_replace('{script}', $script2, $table);

		$nrc = $_REQUEST['nrc'];
		$table .= '</tr>';
		$table .= '<tr><td>General</td>';
		for ($i=0; $i < $result->num_rows; $i++) { 
			$table .= file_get_contents('../vista/listaAsistenciarow.html');
			$table = str_replace(array('{valor}','{iddia}'), array('general','G'.$ids[$i]), $table);
		}
		$table2 = '<tr><td>{alumno}</td>';
		$scriptFaltas = '';
		$asistenciasGuardadas = $this->modelo->listarAsistencia();
		
		for ($i=0; $i < $result->num_rows; $i++) { 
			$table2 .= file_get_contents('../vista/listaAsistenciarow.html');
			$scriptFaltas .= file_get_contents('../www/js/faltas.js');
			$table2 = str_replace(array('{valor}','{iddia}'), array($nrc.'_{alumnoCodigo}_'.$ids[$i], $ids[$i]), $table2);
			$scriptFaltas = str_replace('{valor}', $nrc.'_{alumnoCodigo}_'.$ids[$i], $scriptFaltas);
		}
		
		$table2 .= '</tr>';
		$result = $this->modelo->listapormateria();
		$table3 = '';
		$script3 = '';
		while($row = mysqli_fetch_array($result)){
			$table3 .= str_ireplace(array('{alumno}','{alumnoCodigo}'),
									array($row['nombreCompleto'],$row['codigo']), $table2);
			$script3 .= str_replace('{alumnoCodigo}', $row['codigo'], $scriptFaltas);
		}
		while ($row = mysqli_fetch_array($asistenciasGuardadas)) {
			//var_dump(expression)
			if($row['asistio']==1)
			$table3 = str_replace(	$row['codigo'].'_'.
									$row['idDia'].'_X"', 
									$row['codigo'].'_'.
									$row['idDia'].'_'.$row['id'].'" checked', $table3);
			else$table3 = str_replace(	$row['codigo'].'_'.
									$row['idDia'].'_X"', 
									$row['codigo'].'_'.
									$row['idDia'].'_'.$row['id'].'"', $table3);
		}
		$table = str_replace('{script2}', $script3, $table);
		$table3 .= '</table></section>';
		$table .=$table3;
		$table.= '<input type="submit" name="Actualizar" value="Actualizar" id="botonActualizar" onclick="return validarfaltas()">';
		$table.= '</form>';
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

	function insertarAsistencias(){
		if($_REQUEST['Actualizar']){
			$asistencias = $_REQUEST['asistencias'];
			$faltas = $_REQUEST['faltas'];
			var_dump($asistencias);
			var_dump($faltas);
			foreach ($asistencias as $token) {
				$datos = explode('_', $token);
				//var_dump($datos);
				if($datos[0]!=0&&
					$datos[1]!=0&&
					$datos[2]!=0&&
					$datos[3]=='X')
				$this->modelo->insertarAsistencias($datos[0],$datos[1],$datos[2],1);
				elseif($datos[0]!=0&&
					$datos[1]!=0&&
					$datos[2]!=0&&
					$datos[3]!='X')
					$this->modelo->actualizarAsistencias($datos[0],$datos[1],$datos[2],1,$datos[3]);
			}
			foreach ($faltas as $token) {
				$datos = explode('_', $token);
				//var_dump($datos);
				if($datos[0]!=0&&
					$datos[1]!=0&&
					$datos[2]!=0&&
					$datos[3]=='X')
				$this->modelo->insertarAsistencias($datos[0],$datos[1],$datos[2],0);
				elseif($datos[0]!=0&&
					$datos[1]!=0&&
					$datos[2]!=0&&
					$datos[3]!='X')
					$this->modelo->actualizarAsistencias($datos[0],$datos[1],$datos[2],0,$datos[3]);
			}
			header('location: ../www/index.php?accion=msg&msgcode=5');
		}else{
			echo 'hola';
		}

	}
}

?>