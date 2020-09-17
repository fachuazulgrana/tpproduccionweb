<?php
    $hostname = 'localhost';
    $database = 'produccion_web';
    $username = 'root';
    $password = '';
    $puerto = 3306;

    /*
    define('BASEURL','127.0.0.1/grupo1/');
    */

define("SERVIDOR", "http://localhost/produccion_web");

//estos de abajo creo que no van, solo hay que hacer uno general

define("RUTA_HOME", SERVIDOR . "/index.php");
define("RUTA_CATALOGO", SERVIDOR . "/catalogo.php");
define("RUTA_PAQUETES", SERVIDOR . "/paquetes.php");
define("RUTA_CONTACTO", SERVIDOR . "/contacto.php");


define("RUTA_CSS", SERVIDOR . "/CSS/");
define("RUTA_JS", SERVIDOR . "/js/");

?>