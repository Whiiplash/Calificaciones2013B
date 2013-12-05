<?php
class cicloMod{
	
	/**
	* @return mixed, array $alumno
	* 
	*/	

	function insertar(){
		$idciclo = $_REQUEST['nombre'];
		$indate = $_REQUEST['fechainicio'];
		$endate = $_REQUEST['fechafin'];
		$diasfestivos =array();
		$numeroDiasFestivos = $_REQUEST['numeroDiasFestivos'];

		
		
		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');

		//Creo mi querry
		$consulta = "INSERT INTO cicloescolar(idCiclo,fechaInicio,fechaFin) VALUES
			('$idciclo',
				'$indate',
				'$endate')";

		//Ejecuto la consulta
		$conexion -> query($consulta);
		for ($i=0; $i < $numeroDiasFestivos; $i++) { 
			$diafestivo = $_REQUEST['diaf'.($i+1)];
			$consulta = "UPDATE fechas
							SET Habil = '0'
							WHERE Dia = '$diafestivo'";
		//Ejecuto la consulta
		$conexion -> query($consulta);

		}
		

		

		//var_dump($conexion);
		if($conexion->errno){
			$conexion -> close();
			die('No se pudo establacer la insercion '.$conexion->error);
		}
		else
			echo "1 registro agregado";
			
		$conexion -> close();
		
	}

	function borrar(){
		$id = $_REQUEST['id'];

		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');

		//Creo mi querry
		$consulta = "DELETE FROM cicloEscolar WHERE idCicloEscolar = '$id'";

		//Ejecuto la consulta
		$result = $conexion -> query($consulta);
		//var_dump($conexion);
		if($conexion->errno){
			$conexion -> close();
			die('No se pudo establacer el borrado '.$conexion->error);
		}
		else
			echo "registro(s) borrado(s)";
			
		$conexion -> close();
		
	}

	function mostrarciclos(){
			
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM cicloescolar ";
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



	function mostrardiashabiles(){
			
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		$idCiclo = $_REQUEST['idciclo'];
		$nrc = $_REQUEST['nrc'];
		//Creo mi querry
		// $consulta = "SELECT * FROM cicloescolar WHERE idCiclo = '$idCiclo' ";
		// //Ejecuto la consulta
		// $result1 = $conexion -> query($consulta);	

		// while ( $fila = $result1 -> fetch_assoc() )
		// $datosDelCiclo = $fila;


		// $inicio = $datosDelCiclo['fechaInicio'];
		// $fin = $datosDelCiclo['fechaFin'];


		//Creo mi querry
	/*	$consulta = "SELECT DAYOFWEEK(Dia),Dia FROM fechas 
						WHERE Habil = '1' AND 
						Dia >= (SELECT fechaInicio FROM cicloescolar WHERE idCiclo = '$idCiclo') AND 
						Dia <= (SELECT (fechafin) FROM cicloescolar WHERE idCiclo = '$idCiclo') AND  
						DAYOFWEEK(Dia) IN ((SELECT diaSemana FROM horarios WHERE nrc='101')+1) */

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

	// function mostrardiashabiles(){
			
	// 	include('db_data.inc');
	// 	$conexion = new mysqli($host,$user,$pass,$db);	
	// 	if($conexion -> connect_errno)
	// 		die('No hay conexion');
	// 	$iduser = $_SESSION['uid'];
	// 	$idCiclo = $_REQUEST['idciclo'];
		
	// 	$consulta = "SELECT * FROM cicloescolar WHERE idCiclo = '$idCiclo' ";
	// 	//Ejecuto la consulta
	// 	$result = $conexion -> query($consulta);
	// 	$datosDelCiclo = mysqli_fetch_array($result);

	// 	$inicio = $datosDelCiclo['fechaInicio'];
	// 	$fin = $datosDelCiclo['fechaFin'];

	// 	//Creo mi querry
	// 	// $consulta = "SELECT Dia FROM fechas 
	// 	// 				WHERE idCiclo = '$idCiclo' AND Habil = '1' AND 
	// 	// 				Dia >= '$inicio' AND Dia <= '$fin'  ";
	// 	// //Ejecuto la consulta
	// 	// $result = $conexion -> query($consulta);	


	// 	if($conexion->errno){
	// 		$conexion -> close();
			
	// 		return FALSE;
	// 	}
		
	// 	if(!$result->num_rows > 0)
	// 		return FALSE;

	// 	//regreso mi objeto de alumno
	// 	return $result;

	// 	//Procesamos el resultado para convertirlo en un array
	// 	while ( $fila = $result -> fetch_assoc() )
	// 		$ciclo[] = $fila;

	// 	//regreso mi arreglo de alumno
		
	// 	return $ciclo;
	// }

	function listarfestivos(){
			
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		$idCiclo = $_REQUEST['idciclo'];
		//Creo mi querry
		$consulta = "SELECT * FROM diasfestivos WHERE idCiclo = '$idCiclo' ";
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

}
?>