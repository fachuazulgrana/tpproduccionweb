<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "includes/head.php"; ?>
    <title>No te vayas!</title>
</head>

<body>


    <?php
    require_once "functions/cortar.php";

    $page = 'prelogout';
    require_once "includes/encabezado.php";
    ?>
    <section class="formulario-contacto py-5">
        <div class="container pt-5 pb-3 shadow-sm">

            <div class="text-center pb-3">
                <h1>¿Seguro que quieres irte? Estos productos podrían interesarte.</h1>
            </div>
            <div class="col-sm-12">
                <a href="?logoutc"><button type="button" class="btn btn-danger btn-xs">Si, quiero irme.</button></a>
            </div>

        </div>
    </section>

    <?php
    ?>
    <div class="container">
        <div class="row justify-content-center pb-4">

            <div class="col-12">
                <div class="row">
                    <?php
                    $temp[] = array();
                    foreach ($Productos->getCookies() as $ciudades) {
                        foreach ($_COOKIE['recomendados'] as $name => $value) {
                            if ($value == $ciudades['id'] && (!in_array($value, $temp))) {
                                include('includes/card_paises.php');
                                $temp[] .= $value;
                            }
                            /*         $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        echo "$name : $value <br />\n";} */
                        }
                    }
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