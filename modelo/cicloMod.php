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
		$result = $conexion -> query($consulta);
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

}
?>