<?php
/**
 *@package calificaciones
 * index principal
 */
 
 if(!isset($_REQUEST['accion'])){
	include('../controlador/defaultCtl.php');
	$controlador = new DefaultCtl();
	}else{
	$accion=$_REQUEST['accion'];
 switch($_REQUEST['accion']){
	case 'log':
		include('../controlador/loginCtl.php');
		$controlador = new LogCtl();
		break;
	default:
		include('../controlador/DefaultCtl.php');
		$controlador = new DefaultCtl();
 }
}
 $controlador->ejecutar();




?>