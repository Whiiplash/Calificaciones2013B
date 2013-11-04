<?php
session_start();

$usuario = $_POST['user'];
//$password = md5($_POST['password']);
$password = $_POST['password'];

//include('db_data.inc');
 $host = 'localhost';
 $user = 'cc409_califfpj';	 	
 $pass = 'R7HdsX2GkE';
 $db = 'sistema_calificaciones';

$conexion = new mysqli($host,$user,$pass,$db);		
		if($conexion -> connect_errno)
			die('No hay conexion');

$consulta = "SELECT * FROM login WHERE codigo = '$usuario' AND pass = '$password'";

$result = $conexion -> query($consulta);

$row = $result -> fetch_assoc();

if($row['codigo']==$usuario){
	$_SESSION['uid'] = $row['codigo'];
	//$_SESSION['tipo'] = $row['tipousuario'];
	$_SESSION['usuario'] = $row['codigo'];
	header('location: ../www/index.php');
	}
else{
	header('location: ../www/index.php?accion=msg&msgcode=3');
}
?>