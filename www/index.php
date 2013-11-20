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
	case 'nuevocurso':
		include('../controlador/nuevocursoCtl.php');
		$controlador = new nuevocursoCtl();
		break;
	case 'listacursos':
		include('../controlador/listacursosCtl.php');
		$controlador = new listacursosCtl();
		break;
	case 'insertarciclo':
		include('../controlador/insertarcicloCtl.php');
		$controlador = new insertarcicloCtl();
		break;
	default:
		include('../controlador/DefaultCtl.php');
		$controlador = new DefaultCtl();
 }
}
 $controlador->ejecutar();




?>