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
		//$password = md5($_POST['password']);
		$password = $_POST['password'];

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

}
?>