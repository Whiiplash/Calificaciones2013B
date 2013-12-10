<?php
session_start();
class msgCtl {

    function ejecutar() {
        $msg = $_REQUEST['msgcode'];
        $file = file_get_contents('../vista/template.html');
        switch ($msg) {
        case '1':
            $cuerpo = '<strong style="color:green;">Curso agregado exitosamente</strong>';
            break;
        case '2':
            $cuerpo = '<strong style="color:green;">El ciclo ha sido agregado con exito</strong>';
            break;
        case '3':
            $cuerpo = '<strong style="color:red;">El Usuario o Password son incorrectos</strong>';
            break;
        case '4':
            $cuerpo = '<strong style="color:green;">El Usuario fue agregado con exito</strong>';
            break;
        case '5':
            $cuerpo = '<strong style="color:green;">Asistencias Actualizadas con exito</strong>';
            break;
        case '6':
            $cuerpo = '<strong style="color:green;">Calificaciones Actualizadas con exito</strong>';
            break;
        default:
            $cuerpo = '<strong style="color:red;">El Usuario o Password son incorrectos</strong>';
            break;
        }
        include('../controlador/menuCtl.php');
        $file = str_ireplace('{cuerpo}' ,$cuerpo, $file);
        $vista2 = new menuCtl(); 
        $file = str_replace('{menu}', $vista2 -> menu() , $file);
        $file = str_replace('{footer}', $vista2 -> menu() , $file);
        echo $file;
    }
}
?>
