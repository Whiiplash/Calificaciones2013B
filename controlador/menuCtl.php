<?php
class menuCtl {

    function menu() {
        if(!isset($_SESSION['rol'])) $menu = file_get_contents('../vista/menus/default.html');
        else
        {switch ($_SESSION['rol']) {
                    case '10':
                        $menu = file_get_contents('../vista/menus/admin.html');
                        break;
                    case '20':
                        $menu = file_get_contents('../vista/menus/profesor.html');                
                        break;
                    case '30':
                        $menu = file_get_contents('../vista/menus/alumno.html');
                        break;
                    default:
                        $menu = file_get_contents('../vista/menus/default.html');
                        break;
                }}
    return $menu;
    }
}
?>
