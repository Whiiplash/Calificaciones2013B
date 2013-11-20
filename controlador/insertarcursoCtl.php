<?php
session_start();
	class insertarcursoCtl{
		function ejecutar(){
			include('../modelo/altacursoMod.php');
			$validate = new altacursoMod(); 
			$validate->cursoInsert();
			header('location: ../www/index.php');
		}

	}


?>
