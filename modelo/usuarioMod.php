<?php

//session_start();

class usuarioMod{

	private $conexion;

	function __construct(){
		include('db_data.inc');
		$this->conexion = new mysqli($host,$user,$pass,$db);		
			if($this->conexion -> connect_errno)
				die('No hay conexion');
	}
	
	function autentificar(){
		if((!isset($_SESSION)))
                {
                        session_start();
                }
		$usuario = $_POST['user'];
		$password = sha1($_POST['password']);
		$consulta = "SELECT * FROM login WHERE codigo = '$usuario' AND pass = '$password'";
		$result = $this->conexion -> query($consulta);
		$row = $result -> fetch_assoc();
		if($row['codigo']==$usuario){
			$_SESSION['uid'] = $row['codigo'];
			$_SESSION['usuario'] = $this->obtenerNombreUsuario($row['codigo']);
			$_SESSION['rol'] = $this->obtenerRolUsuario($row['codigo']);
			header('location: ../www/index.php');
			}
		else{
			header('location: ../www/index.php?accion=msg&msgcode=3');
		}
	}

	function obtenerNombreUsuario($codigo){
		$consulta = "SELECT nombreCompleto FROM usuario WHERE codigo = '$codigo'";
		$result = $this->conexion -> query($consulta);
		$row = $result -> fetch_assoc();
		return $row['nombreCompleto'];
	}

	function obtenerRolUsuario($codigo){
		$consulta = "SELECT idRol FROM usuario WHERE codigo = '$codigo'";
		$result = $this->conexion -> query($consulta);
		$row = $result -> fetch_assoc();
		return $row['idRol'];
	}

	function obtenerCarreras(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM carrera";
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

	function insertarUsuario(){
		$nombre = $_REQUEST['nombre'];
		$apellidop = $_REQUEST['apellidop'];
		$apellidom = $_REQUEST['apellidom'];
		$contrasena = $_POST['contrasena'];
		$carreras = $_REQUEST['carreras'];
		$email = $_REQUEST['email'];
		$celular = $_REQUEST['celular'];
		$github = $_REQUEST['github'];
		$web = $_REQUEST['web'];
		$diasfestivos =array();
		$nombreCompleto = $nombre.' '.$apellidop.' '.$apellidom;

		if(!isset($celular)){
		    $celular = "No necesario";
		}

		if(!isset($github)){
		    $github = "No necesario";
		}

		if(!isset($web)){
		    $web = "No necesario";
		}

		if(!(isset($nombre)))
		    header ("Location: index.php");

		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		//Creo mi querry
		$consulta = "INSERT INTO usuario(nombreCompleto,correo,estatus) VALUES
										('$nombreCompleto','$email','1')";
		//Ejecuto la consulta
		$conexion -> query($consulta);
		if($conexion->errno){
			$conexion -> close();
			die('No se pudo establacer la insercion '.$conexion->error);
		}
		else
			echo "1 registro agregado";
		$conexion -> close();
	}

	function obtenerUsuarios(){
		include('db_data.inc');
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		$iduser = $_SESSION['uid'];
		//Creo mi querry
		$consulta = "SELECT * FROM usuario";
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

	function borrarUsuario(){
		$codigo = $_REQUEST['codigo'];
		//cargo los datos para la conexion
		include('db_data.inc');		
		$conexion = new mysqli($host,$user,$pass,$db);	
		if($conexion -> connect_errno)
			die('No hay conexion');
		//Creo mi querry
		$consulta = "DELETE FROM usuario WHERE codigo = '$codigo'";
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

}
?>