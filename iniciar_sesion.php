<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "includes/head.php" ?>
    <title>Iniciar Sesion</title>
</head>

<body>
    <?php
    $page = 'iniciar_sesion';
    require_once "includes/encabezado.php";
    include_once 'app/Iniciar_Sesion.php';
    ?>

    <section class="formulario-contacto py-5">
        <div class="container pt-5 pb-3 shadow-sm">

            <div class="text-center pb-3">
                <h1>Iniciar Sesion</h1>
            </div>

            <div class="pb-3 text-center">
                <svg width="20%" height="2">
                    <rect width="100%" height="100" style="fill:#F78014;stroke-width:0;stroke:rgb(0,0,0)" />
                </svg>
            </div>

            <div class="container">
                <form action="#" method="post" class="py-4">
                    <fieldset>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    
                                        <div class="col-sm-12 col-md-6 py-2">
                                            <label>Nombre de Usuario *</label>
                                            <input type="text" name="usuario" required class="form-control" placeholder="nombre_usuario">
                                        </div>


                                        <div class="col-sm-12 col-md-6 py-2">
                                            <label>Contraseña *</label>
                                            <input type="password" name="password1" required class="form-control" placeholder="********">
                                        </div>
                                    
                                    <div class="col-sm-12 col-md-2 py-2">
                                        <input class="text-white btn btn-md btn-block text-center newsletter-btn" type="submit" value="Inicar Sesion" name="InciarSesion">
                                        <?php
                                        $InciarSesion->inciarSesion();
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

        </div>
    </section>

    <?php
    require_once "includes/linkinteresesyherramientas.php";
    require_once "includes/footer.php";
    ?>

</body>

</html>