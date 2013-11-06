<?php
session_start();
	class usuarioCtl{
		function ejecutar(){
			include('../modelo/usuarioMod.php');
			$validate = new usuarioMod(); 
			$validate->loginUsuario();
		}

	}


?>
