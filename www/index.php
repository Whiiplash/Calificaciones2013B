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
	case 'ciclo':
		include('../controlador/cicloCtl.php');
		$controlador = new cicloCtl();
		break;
	case 'curso':
		include('../controlador/cursoCtl.php');
		$controlador = new cursoCtl();
		break;
	case 'msg':
		include('../controlador/msgCtl.php');
		$controlador = new msgCtl();
		break;
	case 'usuario':
		include('../controlador/usuarioCtl.php');
		$controlador = new usuarioCtl();
		break;
	default:
		include('../controlador/DefaultCtl.php');
		$controlador = new DefaultCtl();
 }
}
var_dump($controlador);
 $controlador->ejecutar();




?>