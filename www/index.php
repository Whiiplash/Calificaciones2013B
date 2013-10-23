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
	case 'cicloalta':
		include('../controlador/altacicloCtl.php');
		$controlador = new altacicloCtl();
        	break;
	default:
		include('../controlador/DefaultCtl.php');
		$controlador = new DefaultCtl();
 }
}
 $controlador->ejecutar();




?>