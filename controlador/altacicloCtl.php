<?php
session_start();
class altacicloCtl{

	public $modelo;
	
	function __construct(){
	  //incluir el modelo
	  include('../modelo/altacicloMod.php');	
	  
	  //creo el objeto
	  $this->modelo = new altacicloMod();

	}

	function ejecutar(){
			$file = file_get_contents('../vista/base.html');
			if(!isset($_SESSION['uid'])){
						$file = str_ireplace('{cuerpo}' ,'Usted no ha iniciado sesion', $file);						
						}
					else{
					$file = str_ireplace('Iniciar Sesion' ,'Cerrar Sesion', $file);
					if($_SESSION['tipo']=='admin'||$_SESSION['tipo']=='profesor'){
										if(!isset($_REQUEST['hacer'])){
											$file2 = file_get_contents('../vista/altaCiclo.html');
											//include('../vista/cicloTabla.php');
											$file = str_ireplace('{cuerpo}' ,$file2, $file);
											}
										else switch($_REQUEST['hacer']){
											case 'agregarCiclo':
												$this->modelo->cicloInsert();
												header('location: ../www/index.php?accion=msg&msgcode=2');
											}
						} else{
							$file = str_ireplace('{cuerpo}' ,'Usted no tiene privilegios suficientes para realizar esta acción', $file);
						}
						}
						include('../controlador/menuCtl.php');
						$vista2 = new menuCtl(); 
						$file = str_replace('{menus}', $vista2 -> menu() , $file);
						echo $file;
		}
}

?>
