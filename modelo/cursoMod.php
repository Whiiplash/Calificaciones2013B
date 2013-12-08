<?php
class cursoMod{
	
	/**
	* @return mixed, array $alumno
	* 
	*/	

	function insertar(){
		$nrc = $_REQUEST['nrc'];
		$seccion = $_REQUEST['seccion'];
		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		//Creo mi querry
		$consulta = "INSERT INTO nrc(nrc,seccionCurso) VALUES
			('$nrc',
				'$seccion')";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			die('No se pudo establacer la insercion '.$conexion->error);
		}
		else{
			//echo "1 registro agregado"
			$conexion -> close();
			header('location: ../www/index.php?accion=msg&msgcode=1');
		}
		$conexion -> close();
	}


	function obtenerAcademia(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM academia";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$ciclo[] = $fila;
		//regreso mi arreglo de alumno
		return $ciclo;
	}

	function obtenerCiclos(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM cicloescolar";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$ciclo[] = $fila;
		//regreso mi arreglo de alumno
		return $ciclo;
	}

	function obtenerCurso(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM curso";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$ciclo[] = $fila;
		//regreso mi arreglo de alumno
		return $ciclo;
	}

	function mostrar(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM nrc 
						INNER JOIN curso ON nrc.idCurso = curso.idCurso
						INNER JOIN academia ON academia.idAcademia = curso.idAcademia";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$ciclo[] = $fila;
		//regreso mi arreglo de alumno
		return $ciclo;
	}

	function listarPorCiclo(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		$idciclo = $_REQUEST['idciclo'];
		//Creo mi querry
		$consulta = "SELECT * FROM nrc 
						INNER JOIN curso ON nrc.idCurso = curso.idCurso
						INNER JOIN academia ON academia.idAcademia = curso.idAcademia
						AND idCiclo = '$idciclo'";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$ciclo[] = $fila;
		//regreso mi arreglo de alumno
		return $ciclo;
	}

	function borrar(){
		$nrc = $_REQUEST['nrc'];
		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		//Creo mi querry
		$consulta = "DELETE FROM nrc WHERE nrc = '$nrc'";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			die('No se pudo establacer el borrado '.$conexion->error);
		}
		else
			echo "registro(s) borrado(s)";
		$conexion -> close();
	}

	function listardiasclase(){
		include('db_data.inc');
		$nrc = $_REQUEST['nrc'];
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM diasclase 
						WHERE nrc ='$nrc'";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$dias[] = $fila;
		//regreso mi arreglo de alumno
		return $dias;
	}

	function listarhorario(){
		include('db_data.inc');
		$nrc = $_REQUEST['nrc'];
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * 
						FROM horarios
						INNER JOIN diasemana ON diaSemana = idDia
						AND nrc ='$nrc'";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$dias[] = $fila;
		//regreso mi arreglo de alumno
		return $dias;
	}

	function listapormateria(){
		include('db_data.inc');
		$nrc = $_REQUEST['nrc'];
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM materiasalumno
						INNER JOIN usuario ON materiasalumno.codigo = usuario.codigo
						WHERE nrc ='$nrc'";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$dias[] = $fila;
		//regreso mi arreglo de alumno
		return $dias;
	}

	function listarmateriasalumno(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		//$consulta = "SELECT * FROM materiasalumno WHERE  codigo = ";
		$consulta = "SELECT  codigo , materiasalumno.nrc, idCiclo, nrc.idCurso, seccionCurso, nombreCurso, idAcademia
						FROM materiasalumno 
						INNER JOIN nrc ON materiasalumno.nrc = nrc.nrc
						AND  codigo ='$iduser'
						INNER JOIN curso ON nrc.idCurso = curso.idCurso";
		$result = $conexion -> query($consulta);	
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$dias[] = $fila;
		//regreso mi arreglo de alumno
		return $dias;
	}

	function verlistaalumnos(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		$idCiclo = $_REQUEST['idciclo'];
		$nrc = $_REQUEST['nrc'];
		$consulta = "SELECT fechas.id, DAYOFWEEK(Dia) , Dia, DAYOFMONTH(Dia), MONTH(Dia)
				FROM fechas
				INNER JOIN horarios ON diaSemana +1 = DAYOFWEEK( Dia ) 
				WHERE Habil =  '1'
				AND Dia >= ( 
				SELECT fechaInicio
				FROM cicloescolar
				WHERE idCiclo =  '$idCiclo' ) 
				AND Dia <= ( 
				SELECT (
				fechafin
				)
				FROM cicloescolar
				WHERE idCiclo =  '$idCiclo' ) 
				AND nrc ='$nrc'";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			return FALSE;
		}
		if(!$result->num_rows > 0)
			return FALSE;
		//regreso mi objeto de alumno
		return $result;
		//Procesamos el resultado para convertirlo en un array
		while ( $fila = $result -> fetch_assoc() )
			$ciclo[] = $fila;
		//regreso mi arreglo de alumno
		return $ciclo;
	}

	function insertarCalificacion($nrc,$codigo,$idDia){
		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		//Creo mi querry
		// var_dump($nrc);
		// var_dump($codigo);
		// var_dump($idDia);
		$consulta = "INSERT INTO asistencia(nrc,asistio,idDia,codigo) VALUES
										('$nrc',1,'$idDia','$codigo')";
		//Ejecuto la consulta
		$result = $conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			die('No se pudo establacer la insercion '.$conexion->error);
		}
		else{
			//echo "1 registro agregado"
			$conexion -> close();
			//header('location: ../www/index.php?accion=msg&msgcode=2');
		}
		$conexion -> close();
	}

}
?>