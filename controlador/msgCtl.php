<?php
session_start();
class msgCtl {

    function ejecutar() {
        $msg = $_REQUEST['msgcode'];
        $file = file_get_contents('../vista/template.html');

        switch ($msg) {
        case '1':
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:green;">Curso agregado exitosamente</strong>', $file);
            break;
        case '2':
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:green;">El ciclo ha sido agregado con exito</strong>', $file);
            break;
        case '3':
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:red;">El Usuario o Password son incorrectos</strong>', $file);
            break;
        default:
            header('location: ../www/index.php');
            break;
        }
include('../controlador/menuCtl.php');
                        $vista2 = new menuCtl(); 
                        $file = str_replace('{menu}', $vista2 -> menu() , $file);
                        $file = str_replace('{footer}', $vista2 -> menu() , $file);
        echo $file;
    }
}
?>
