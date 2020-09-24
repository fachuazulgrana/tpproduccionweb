<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "includes/head.php" ?>
    <title>Product Details</title>
</head>

<body>
    <?php
    $page = 'catalogo';
    //$str_data = file_get_contents("json/ciudades.json");
    //$paises = json_decode($str_data, true);

    require_once "includes/encabezado.php";
    //$id = $_GET['id'];

    // Si $_POST submit esta setteado, guarda los datos del comentario en comentarios.json
/*     if (isset($_POST['submit'])) {
        $data = $_POST;
        unset($data['submit']);
        $data['fecha'] = date('d/m/Y H:i:s');
        $fecha = new DateTime();
        $indexComentario = $fecha->format('YmdHisu'); */
        /*
        if (file_exists('json/comentarios.json')) {
            $comentarioJson = file_get_contents('json/comentarios.json');
            $comentarioArray = json_decode($comentarioJson, true);
        } else {
            $comentarioArray = array();
        }
        $comentarioArray[$indexComentario] = $data;
        $fp = fopen('json/comentarios.json', 'w');
        fwrite($fp, json_encode($comentarioArray));
        fclose($fp);
        */
  /*   } */
    ?>


    <div class="container text-center pt-5 pb-4">
        <?php
        //foreach ($Productos->getProductos() as $ciudades)
        //foreach ($paises as $key => $value) {

        foreach ($Productos->getProductos('', '', 1) as $ciudades) {
            //if ($value == $id) break;
            if ($ciudades['id'] == $_GET['id']) break;
        }
        echo '<h1>' . $ciudades['nombre'] . '</h1>';
        ?>
    </div>

    <div class="pb-5 text-center">
        <svg width="20%" height="2">
            <rect width="100%" height="100" style="fill:rgb(255,165,0);stroke-width:0;stroke:rgb(0,0,0)" />
        </svg>
    </div>

    <section>
        <div class="container shadow justify-content-around p-4">
            <div class="row justify-content-center align-items-center">
                <div class="col-5">
                    <div class="imagen1">
                        <a href="pruebas/img<?php echo $ciudades['id']; ?>.jpg" data-fancybox="gallery" data-caption="Caption for single image">
                            <img height="auto" width="100%" src="pruebas/img/<?php echo $ciudades['id']; ?>.jpg" alt="imagen de <?php echo $ciudades['nombre']; ?>">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 incluye py-2">
                    <h4 class="pl-3">
                        <?php echo $ciudades['nombre']; ?> <br>
                    </h4>
                    <h5 class="pl-3">
                        <?php echo $Continente->getNameContinente() . ' - ' . $Pais->getNamePais();?> <br>
                        <?php //echo $ciudades['continentes_id'] . ' - ' . $ciudades['paises_id']; ?> <br>
                        Precio: $<?php echo $ciudades['precio']; ?>
                    </h5>
                    <h5 class="pl-3">
                        Puntaje: <?php echo $Comentarios->getRanqueo(); ?>
                    </h5>
                    <?php echo '<p class="col-9 pt-4">' . $ciudades['descripcion'] . '</p>'; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="descripcion py-5">
        <div class="container py-5 shadow">
            <div class="row justify-content-center align-items-center" id="home">
                <div class="col-10">
                    <h3 class="pb-3">
                        <div class="col-lg-8 incluye py-2">
                            Incluye:
                        </div>
                    </h3>
                </div>
                <div class="col-10">
                    <ul class="descripcion_detalles">
                        <li><?php echo $ciudades['detalle']; ?></li>
                    </ul>
                </div>
                <div class="col-10 pt-3">
                    <h4>Detalles</h4>
                    <table class="table">
                        <tbody>
                            <?php
                            echo '<tr><td>Pais: </td><td>' . $ciudades['nombre'] . '</td></tr>';
                            echo '<tr><td>Viaje: </td><td>' . $Continente->getNameContinente() . ' - ' . $Pais->getNamePais() .  '</td></tr>';
                            echo '<tr><td>Precio: </td><td> ' .'$'. $ciudades['precio'] . '</td></tr>';
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-11 col-md-10 col-lg-10 incluye py-2">
                    <div class="container d-flex justify-content-around">
                        <a href="#" class="btn btn-success">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <div class="text-center pb-3">
                <h2>Danos Tu Opinión Del Producto</h2>
            </div>

            <div class="pb-4 text-center">
                <svg width="20%" height="2">
                    <rect width="100%" height="100" style="fill:#F78014;stroke-width:0;stroke:rgb(0,0,0)" />
                </svg>
            </div>

            <!-- ACÁ ESCRIBEN EL COMENTARIO -->

            <div class="container">
                <form action="#" method="post">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <label>Nombre *</label>
                                    <input type="text" name="nombre" required class="form-control">
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <label for="email">Email *</label>
                                    <input type="email" id="email" name="email" required class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label>Mensaje *</label>
                                    <textarea class="form-control comentario-textarea" name="comentario" required rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-10">
                                    <div class="form1">
                                        <p class="clasificacion" name="rankeo">
                                            <input id="radio1" type="radio" name="estrellas" value="5">
                                            <label for="radio1">★</label>
                                            <input id="radio2" type="radio" name="estrellas" value="4">
                                            <label for="radio2">★</label>
                                            <input id="radio3" type="radio" name="estrellas" value="3">
                                            <label for="radio3">★</label>
                                            <input id="radio4" type="radio" name="estrellas" value="2">
                                            <label for="radio4">★</label>
                                            <input id="radio5" type="radio" name="estrellas" value="1">
                                            <label for="radio5">★</label>
                                        </p>
                                    </div>
                                </div>

                                <input type="hidden" class="input-xlarge" name="productos_id" value="<?php echo $_GET['id'] ?>" />

                                <div class="col-sm-6 col-md-2">
                                    <input class="text-white btn btn-md btn-block text-center newsletter-btn" type="submit" value="Enviar" name="comentar">
                                    <?php
                                        $Comentarios->setComentarios();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">

            <div class="text-center pb-3">
                <h2>Opiniones De Los Usuarios</h2>
            </div>

            <div class="pb-4 text-center">
                <svg width="20%" height="2">
                    <rect width="100%" height="100" style="fill:#F78014;stroke-width:0;stroke:rgb(0,0,0)" />
                </svg>
            </div>
        </div>
    </section>

    <!-- ACÁ DEVULVEN LOS COMENTARIOS -->

    <div class="testimonial_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <?php
                    /*if (file_exists('json/comentarios.json')) {
                        $comentarioJson = file_get_contents('json/comentarios.json');
                        $comentarioArray = json_decode($comentarioJson, true);
                        krsort($comentarioArray);*/
                    $cantidad = 0;
                    foreach ($Comentarios->getComentarios() as $comentario) {
                        if ($comentario['productos_id'] == $_GET['id']) {
                            $cantidad++;
                            if ($cantidad == 11) break;

                            /*foreach ($comentarioArray as $comentario) {
                            if ($comentario['producto_id'] == $_GET['id']) {
                                $cantidad++;
                                if ($cantidad == 11) break;*/
                    ?>
                            <div class="row justify-content-center align-items-center">
                                <div class="border p-4 shadow col-8 single_testmonial">
                                    <p> <?php echo $comentario['comentario']; ?> </p>

                                    <div class="testmonial_author">
                                        <h3>- <?php echo $comentario['email']; ?> </h3>
                                    </div>

                                    <h3 class="text-warning">
                                        <?php
                                        if ($comentario['calificacion'] == '1') {
                                            echo '★';
                                        } elseif ($comentario['calificacion'] == '2') {
                                            echo '★★';
                                        } elseif ($comentario['calificacion'] == '3') {
                                            echo '★★★';
                                        } elseif ($comentario['calificacion'] == '4') {
                                            echo '★★★★';
                                        } elseif ($comentario['calificacion'] == '5') {
                                            echo '★★★★★';
                                        }
                                        //echo $comentario['calificacion']; 
                                        ?>
                                    </h3>

                                    <small>
                                        <i> <?php echo $comentario['fecha']; ?> </i>
                                    </small>
                                </div>
                            </div>

                    <?php
                        }
                    }
                    //}
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once "includes/linkinteresesyherramientas.php";
    require_once "includes/footer.php";
    ?>
</body>

</html>