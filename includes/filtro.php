<div class="container pt-4 px-5">
    <div class="row justify-content-center">

        <div class="col-12">
            <div class="filter-wrap py-4">
                <h3>Filtro</h3>
                <div class="filter-border p-4 border border-secondary">
                    <div class="filter-inner">
                        <div class="filtrolugar">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-12 col-md-6 col-lg-3 py-2">

                                    <form action="" method="GET" class="">
                                        <?php
                                        $opcion = 'Todo';
                                        !empty($_GET['continente']) ? $opcion = $_GET['continente'] : $opcion = ""
                                        ?>

                                        <select name="continente" class="custom-select custom-select-lg" id="continente" onchange="this.form.submit()">
                                            <option value="" selected="selected">Seleccionar Continente</option>
                                            <?php
                                            foreach ($Continente->getContinente(1) as $continentes) : ?>
                                                <option value="<?php echo $continentes['id'] ?>" <?php echo ($opcion == $continentes['id']) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $continentes['nombre'] ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                        <input type="hidden" name="pais" value="<?php echo '' ?>">
                                        <input type="hidden" name="ciudad" value="<?php echo '' ?>">
                                        <input type="hidden" name="orden" value="<?php echo isset($_GET['orden']) ? $_GET['orden'] : '' ?>">
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">

                                    <form action="" method="GET" class="">
                                        <?php
                                        $opcion2 = 'Todo';
                                        !empty($_GET['pais']) ? $opcion2 = $_GET['pais'] : $opcion2 = ""
                                        ?>
                                        
                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">

                                        <select name="pais" class="custom-select custom-select-lg" id="pais" onchange="this.form.submit()">
                                            <option value="0">Seleccionar Pais</option>

                                            <?php
                                            foreach ($Pais->getPais($_GET) as $paises) : ?>
                                                <option value="<?php echo $paises['id'] ?>" <?php echo ($opcion2 == $paises['id']) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $paises['nombre']; ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                        <input type="hidden" name="ciudad" value="<?php echo '' ?>">
                                        <input type="hidden" name="orden" value="<?php echo isset($_GET['orden']) ? $_GET['orden'] : '' ?>">
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3">

                                    <form action="" method="GET" class="">
                                        <?php
                                        $opcion3 = 'Todo';
                                        !empty($_GET['ciudad']) ? $opcion3 = $_GET['ciudad'] : $opcion3 = ""
                                        ?>
                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">
                                        <input type="hidden" name="pais" value="<?php echo isset($_GET['pais']) ? $_GET['pais'] : '' ?>">
                                        <select name="ciudad" class="custom-select custom-select-lg" id="ciudad" onchange="this.form.submit()">
                                            <option value="0">Seleccionar Ciudad</option>

                                            <?php
                                            foreach ($Productos->getProductos($_GET) as $ciudades) : ?>
                                                <option value="<?php echo $ciudades['id'] ?>" <?php echo ($opcion3 == $ciudades['id']) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $ciudades['nombre']; ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                        <input type="hidden" name="orden" value="<?php echo isset($_GET['orden']) ? $_GET['orden'] : '' ?>">
                                    </form>
                                </div>

                                <div class="col-12 col-md-6 col-lg-3">

                                    <form action="" method="GET" class="">

                                        <?php
                                        $opcion4 = 'Todo';
                                        !empty($_GET['orden']) ? $opcion4 = $_GET['orden'] : $opcion4 = ""
                                        ?>

                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">
                                        <input type="hidden" name="pais" value="<?php echo isset($_GET['pais']) ? $_GET['pais'] : '' ?>">
                                        <input type="hidden" name="ciudad" value="<?php echo isset($_GET['ciudad']) ? $_GET['ciudad'] : '' ?>">

                                        <select name="orden" class="custom-select custom-select-lg" id="orden" onchange="this.form.submit()">

                                            <option value="" <?php echo ($opcion4 == "") ? 'selected="selected"' : '' ?>> Ordenamiento </option>
                                            <option value="ASC" <?php echo ($opcion4 == "ASC") ? 'selected="selected"' : '' ?>> Ordenar A-Z </option>
                                            <option value="DESC" <?php echo ($opcion4 == "DESC") ? 'selected="selected"' : '' ?>> Ordenar Z-A </option>
                                            <option value="1" <?php echo ($opcion4 == "1") ? 'selected="selected"' : '' ?>> Destacados </option>
                                            <option value="calificacion" <?php echo ($opcion4 == "calificacion") ? 'selected="selected"' : '' ?>> Mayor Rankeo </option>

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