<?php
class altacursoMod{
	
	/**
	* @return mixed, array $alumno
	* 
	*/	

	function cursoInsert(){
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
		else
			echo "1 registro agregado";
			
		$conexion -> close();
		
	}

	function alumnoDelete(){
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