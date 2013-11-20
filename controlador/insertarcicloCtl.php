<?php
session_start();
	class insertarcicloCtl{
		function ejecutar(){
			include('../modelo/nuevocicloMod.php');
			$validate = new altacicloMod(); 
			$validate->cicloInsert();
			header('location: ../www/index.php');
		}

	}


?>
