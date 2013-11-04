<?php
class menuCtl {

    function menu() {
        //if(!isset($_SESSION['tipo'])) $menu = 'Sistema Integral de Calificaciones en nuestro Centro Universitario se utiliza como una herramienta que permite a los profesores complementar sus actividades académicas presenciales.';
        if(!isset($_SESSION['tipo'])) $menu = file_get_contents('../vista/menu.html');
        else
        {switch ($_SESSION['tipo']) {
                    case 'admin':
                        $menu = file_get_contents('../vista/menuadmin.html');
                        break;
                    case 'profesor':
                        $menu = file_get_contents('../vista/menuprof.html');                
                        break;
                    case 'alumno':
                        $menu = file_get_contents('../vista/menualum.html');
                        break;
                    default:
                        $menu = file_get_contents('../vista/menudefault.html');
                        break;
                }}
    return $menu;
    }
}
?>
