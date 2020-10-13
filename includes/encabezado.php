<nav class="navbar navbar-fixed-top shadow-sm navbar-expand-md navbar-dark bg-orangened">
    <a class="navbar-brand" href="images/iconolog.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-pills align-items-center">
            <li class="nav-brand px-4 py-2">
                <a href="<?php echo RUTA_HOME ?>" class="logomenu"> <img src="images/logo_cabecera.png" width="70" height="60" alt="Logo">
                </a>
            </li>
            <li <?php echo ($page == 'index') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
                <a class="nav-link borde" href=<?php echo RUTA_HOME ?>>Inicio</a>
            </li>
            <li <?php echo ($page == 'catalogo') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
                <a class="nav-link borde" href=<?php echo RUTA_CATALOGO . '?continente=&pais=&ciudad=' ?>>Catálogo</a>
            </li>
            <li <?php echo ($page == 'paquetes') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
                <a class="nav-link borde" href=<?php echo RUTA_PAQUETES ?>>Paquetes</a>
            </li>
            <li <?php echo ($page == 'contacto') ? "class='nav-item active px-3 py-2'" : ""; ?> class="nav-item px-3 py-2">
                <a class="nav-link borde" href=<?php echo RUTA_CONTACTO ?>>Contacto</a>
            </li>
        </ul>
        <ul class="navbar-nav align-items-center ml-auto social_links">
            <li class="nav-item px-3 py-2"><a class="nav-link" href="#"> <i class="icon-fa fa fa-instagram"></i></a></li>
            <li class="nav-item px-3 py-2"><a class="nav-link" href="#"> <i class="icon-fa fa fa-facebook"></i></a></li>
            <li class="nav-item px-3 py-2"><a class="nav-link" href="#"> <i class="icon-fa fa fa-google"></i></a></li>
            <li class="nav-item px-3 py-2"><a class="nav-link" href="#"> <i class="icon-fa fa fa-linkedin"></i></a></li>
        </ul>
    </div>


</nav>