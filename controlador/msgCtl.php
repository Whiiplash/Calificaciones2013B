<?php
session_start();
class msgCtl {

    function ejecutar() {
        $msg = $_REQUEST['msgcode'];
        $file = file_get_contents('../vista/template.html');
        var_dump($msg);
        switch ($msg) {
        case '1':
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:green;">Curso agregado exitosamente</strong>', $file);
            break;
        case '2':
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:green;">El ciclo ha sido agregado con exito</strong>', $file);
            break;
        case '3':
            var_dump('$msg');
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:red;">El Usuario o Password son incorrectos</strong>', $file);
            break;
        case '4':
            $file = str_ireplace('{cuerpo}' ,'<strong style="color:green;">El Usuario fue agregado con exito</strong>', $file);
            break;
        default:
            //header('location: ../www/index.php');
        $file = str_ireplace('{cuerpo}' ,'<strong style="color:red;">El Usuario o Password son incorrectos</strong>', $file);
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
