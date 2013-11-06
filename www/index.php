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
	case 'validarusuario':
		include('../controlador/usuarioCtl.php');
		$controlador = new usuarioCtl();
		break;
	case 'altaciclo':
		include('../controlador/altacicloCtl.php');
		$controlador = new altacicloCtl();
		break;
	case 'nuevociclo':
		include('../controlador/nuevocicloCtl.php');
		$controlador = new nuevocicloCtl();
		break;
	default:
		include('../controlador/DefaultCtl.php');
		$controlador = new DefaultCtl();
 }
}
 $controlador->ejecutar();




?>