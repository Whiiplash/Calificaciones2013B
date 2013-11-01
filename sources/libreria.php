<?php

function q($str)
{
	global $db;
	return $db->query($str);
}

/***********************************
Querys Login
***********************************/
function insertarLogin($codigo,$pass){
	$result = q("INSERT INTO login(codigo,pass)
	VALUES('$codigo','$pass')");
	return $result;
}
function borrarLogin($codigo){
	$result = q("DELETE FROM login WHERE codigo=". $codigo);
	return $result;
}
/***********************************
Querys Usuario
***********************************/
function insertarUsuario($codigo,$nombreCompleto,$idCarrera,$correo,$estatus,$idRol,$celular,$github,$paginaWeb){
	$result = q("INSERT INTO usuario(codigo,nombreCompleto,idCarrera,correo,estatus,idRol,celular,github,paginaWeb)
	VALUES('$codigo','$nombreCompleto','$idCarrera','$correo','$estatus','$idRol','$celular','$github','$paginaWeb')");
	return $result;
}
function borrarUsuario($codigo){
	$result = q("DELETE FROM usuario WHERE codigo=". $codigo);
	return $result;
}
/***********************************
Querys ciclo
***********************************/
function insertarCiclo($idCiclo,$fechaInicio,$fechaFin){
	$result = q("INSERT INTO cicloEscolar(idCiclo,fechaInicio,fechaFin)
	VALUES('$idCiclo','$fechaInicio','$fechaFin')");
	return $result;
}
function borrarCiclo($idCiclo){
	$result = q("DELETE FROM cicloEscolar WHERE idCiclo=". $idCiclo);
	return $result;
}
/***********************************
Querys dias festivos
***********************************/
function insertarDiaFestivo($idCiclo,$diaFestivo){
	$result = q("INSERT INTO diasFestivos(idCiclo,diaFestivo)
	VALUES('$idCiclo','$diaFestivo')");
	return $result;
}
function borrarDiaFestivo($idCiclo){
	$result = q("DELETE FROM diasFestivos WHERE idCiclo =". $idCiclo AND "diaFestivo = ". $diaFestivo);
	return $result;
}
?>