<?php
    $hostname = 'localhost';
    $database = 'produccion_web';
    $username = 'root';
    $password = 'root';
    $puerto = 3306;


// TODO: Mas adelante cuando tengamos el aws, hay que cambiar la ruta base localhost por la url que usemos.
define("SERVIDOR", "http://localhost/tpproduccionweb");

//estos de abajo creo que no van, solo hay que hacer uno general

define("RUTA_HOME", SERVIDOR . "/index.php");
define("RUTA_CATALOGO", SERVIDOR . "/catalogo.php");
define("RUTA_PAQUETES", SERVIDOR . "/paquetes.php");
define("RUTA_CONTACTO", SERVIDOR . "/contacto.php");


define("RUTA_CSS", SERVIDOR . "/css/");
define("RUTA_JS", SERVIDOR . "/js/");

?>