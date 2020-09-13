<?php
$str_data_continentes = file_get_contents("json/continentes.json");
$str_data_paises = file_get_contents("json/paises.json");
$str_data_ciudades = file_get_contents("json/ciudades.json");

$dataContinentes = json_decode($str_data_continentes, true);
$dataPaises = json_decode($str_data_paises, true);
$dataCiudades = json_decode($str_data_ciudades, true);
?>

<div class="container pt-4 px-5">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="filter-wrap py-4">
                <h3>Filtro</h3>
                <div class="filter-border p-4 border border-secondary">
                    <div class="filter-inner">
                        <div class="filtrolugar">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12 col-md-6 col-lg-4 py-2">

                                    <form action="" method="GET" class="">
                                        <?php 
                                        $opcion = 'Todo';
                                        !empty($_GET['continente']) ? $opcion = $_GET['continente'] : $opcion = "" 
                                        ?>
                                        <select name="continente" class="custom-select custom-select-lg" id="continente" onchange="this.form.submit()">
                                            <option value="" selected="selected">Seleccionar Continente</option>

                                            <!-- 1 -->

                                            <?php
                                            require_once('pruebas/continente.php');
                                            $Continente = new Continente($con);

                                            foreach ($Continente->getContinente() as $continentes) :
                                            /*foreach ($dataContinentes as $continentes) :*/ ?>
                                                <option <?php echo ($opcion == $continentes['nombre']) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $continentes['nombre'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">

                                    <form action="" method="GET" class="">
                                        <?php 
                                        $opcion2 = 'Todo';
                                        !empty($_GET['pais']) ? $opcion2 = $_GET['pais'] : $opcion2 = "" 
                                        ?>
                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">
                                        <select name="pais" class="custom-select custom-select-lg" id="pais" onchange="this.form.submit()">
                                            <option>Seleccionar Pais</option>

                                            <!-- 2 -->

                                            <?php
                                            require_once('pruebas/pais.php');
                                            $Pais = new Pais($con);

                                            foreach ($Pais->getPais() as $paises) :
                                            /*foreach ($dataPaises as $paises) : */?>
                                                <option <?php echo ($opcion2 == $paises['nombre']) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $paises['nombre']; ?>
                                                </option>

                                                <!--
                                                <?php if ($paises['continente'] == $_GET['continente']) : ?>
                                                    <option <?php echo ($opcion2 == $paises['nombre']) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $paises['nombre']; ?>
                                                    </option>
                                                <?php endif ?>
                                                <?php
                                                if ($_GET['continente'] == null || $_GET['continente'] == 'Todo') : ?>
                                                    <option <?php echo ($opcion2 == $paises['nombre']) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $paises['nombre']; ?>
                                                    </option>
                                                <?php endif ?>
                                                -->

                                            <?php endforeach ?>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">

                                    <form action="" method="GET" class="">
                                        <?php 
                                        $opcion3 = 'Todo';
                                        !empty($_GET['ciudad']) ? $opcion3 = $_GET['ciudad'] : $opcion3 = "" 
                                        ?>
                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">
                                        <input type="hidden" name="pais" value="<?php echo isset($_GET['pais']) ? $_GET['pais'] : '' ?>">
                                        <select name="ciudad" class="custom-select custom-select-lg" id="ciudad" onchange="this.form.submit()">
                                            <option>Seleccionar Ciudad</option>

                                            <!-- 3 -->
                                            <?php
                                            foreach ($Productos->getProductos() as $ciudades) :
                                            /*foreach ($dataCiudades as $ciudades) : */?>
                                                <option <?php echo ($opcion3 == $ciudades['nombre']) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $ciudades['nombre']; ?>
                                                </option>

                                            <!--
                                                <?php if ($ciudades['pais'] == $_GET['pais']) : ?>
                                                    <option <?php echo ($opcion3 == $ciudades['nombre']) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $ciudades['nombre']; ?>
                                                    </option>
                                                <?php endif ?>

                                                <?php if ($_GET['pais'] == null || $_GET['pais'] == '') : ?>
                                                    <option <?php echo ($opcion3 == $ciudades['nombre']) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $ciudades['nombre']; ?>
                                                    </option>
                                                <?php endif ?>
                                            -->

                                            <?php endforeach ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
