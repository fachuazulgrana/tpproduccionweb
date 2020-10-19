<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once "includes/head.php" ?>
    <title>Iniciar Sesion</title>
</head>

<body>
    <?php
    $page = 'registro';
    require_once "includes/encabezado.php";
    include_once 'app/Registrar.php';
    ?>

    <section class="formulario-contacto py-5">
        <div class="container pt-5 pb-3 shadow-sm">

            <div class="text-center pb-3">
                <h1>Registrarse</h1>
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
                                        <label>Nombre *</label>
                                        <input type="text" name="nombre_registro" required class="form-control">
                                    </div>
                                    <div class="col-sm-12 col-md-6 py-2">
                                        <label>Apellido *</label>
                                        <input type="text" name="apellido_registro" required class="form-control">
                                    </div>
                                    <div class="col-sm-12 col-md-6 py-2">
                                        <label for="email">Email *</label>
                                        <input type="email" id="email_registro" name="email_registro" required class="form-control" placeholder="usuario@email.com">
                                    </div>
                                    <div class="col-sm-12 col-md-6 py-2">
                                        <label>Nombre de Usuario *</label>
                                        <input type="text" name="usuario" required class="form-control" placeholder="nombre_usuario">
                                    </div>
                                    <div class="col-sm-12 col-md-6 py-2">
                                        <label>Contraseña *</label>
                                        <input type="password" name="password1" required class="form-control" placeholder="********">
                                    </div>
                                    <div class="col-sm-12 col-md-6 py-2">
                                        <label>Repita la contraseña *</label>
                                        <input type="password" name="password2" required class="form-control" placeholder="********">
                                    </div>
                                    <div class="col-sm-12 col-md-2 py-2">
                                        <input class="text-white btn btn-md btn-block text-center newsletter-btn" type="submit" value="Crear Cuenta" name="CrearCuenta">
                                        <?php
                                        $Registrar->setRegistrar();
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
