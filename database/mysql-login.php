<?php
    $hostname = 'localhost';
    $database = 'produccion_web';
    $username = 'root';
    $password = '';
    $puerto = 3306;


// TODO: Mas adelante cuando tengamos el aws, hay que cambiar la ruta base localhost por la url que usemos.
define("SERVIDOR", "http://localhost/tpproduccionweb");

// FRONT
define("RUTA_HOME", SERVIDOR . "/index.php");
define("RUTA_CATALOGO", SERVIDOR . "/catalogo.php");
define("RUTA_PAQUETES", SERVIDOR . "/paquetes.php");
define("RUTA_CONTACTO", SERVIDOR . "/contacto.php");
define("RUTA_REGISTRO", SERVIDOR . "/registro.php");
define("RUTA_LOGIN", SERVIDOR . "/iniciar_sesion.php");
define("RUTA_LOGOUT", SERVIDOR . "/prelogout.php");

define("RUTA_CSS", SERVIDOR . "/css/");
define("RUTA_JS", SERVIDOR . "/js/");

// ABM
define("RUTA_BACKEND", SERVIDOR . "/abm");
define("RUTA_BACKEND_CSS", RUTA_BACKEND . "/css/");

define("RUTA_BACKEND_HOME", RUTA_BACKEND . "/home.php");
define("RUTA_BACKEND_PERFILES", RUTA_BACKEND . "/perfiles.php");
define("RUTA_BACKEND_USUARIOS", RUTA_BACKEND . "/usuarios.php");
define("RUTA_BACKEND_PRODUCTOS", RUTA_BACKEND . "/productos.php?page=1&orden=&limit=");
define("RUTA_BACKEND_PAISES", RUTA_BACKEND . "/paises.php?page=1&orden=&limit=");
define("RUTA_BACKEND_CONTINENTES", RUTA_BACKEND . "/continentes.php");
define("RUTA_BACKEND_COM", RUTA_BACKEND . "/comentarios.php?page=1&orden=&limit=");
define("RUTA_BACKEND_COM_DIN", RUTA_BACKEND . "/comentarios_dinamicos.php");
define("RUTA_BACKEND_CLIENTES", RUTA_BACKEND . "/clientes.php");
define("RUTA_BACKEND_CAM_DIN", RUTA_BACKEND . "/campos_dinamicos.php");
define("RUTA_BACKEND_LOGOUT", RUTA_BACKEND . "/?logout");

?>