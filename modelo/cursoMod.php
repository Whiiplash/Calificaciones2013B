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
		//var_dump($conexion);
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


	function mostrar(){
			
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM nrc ";
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

	function tabla($result){
		$table = '';
		$table .= "<table border='1'>
		<thead>
		<tr>
		<th>Ciclo Escolar</th>
		<th>Fecha Inicio</th>
		<th>Fecha Final</th>
		<th>Eliminar</th>
		</tr>
		</thead>";
		while($row = mysqli_fetch_array($result))
  		{
  			$table .= "<tbody>";
  			$table .= "<tr>";
  			$table .= "<td><a href=" . "../www/index.php?accion=curso&cescolar=". $row['nrc'] . ">" . $row['nrc'] . "</a></td>";
  			$table .= "<td>" . $row['idCiclo'] . "</td>";
  			$table .= "<td>" . $row['idCurso'] . "</td>";
  			$table .= "<td><a href=../www/index.php?accion=ciclodel&id=".$row['seccionCurso'] ."> X</td>";
  			$table .= "</tr>";
  			$table .= "</tbody>";
  		}
		$table .= "</table>";
		$table .= "<br><a href=../www/index.php?accion=cicloalta>Insertar Ciclo";
		return $table;

	}

}
?>