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
                                            <option value="0" selected="selected">Seleccionar Continente</option>
                                            <?php
                                            foreach ($Continente->getContinente() as $continentes) : ?>
                                                <option value="<?php echo $continentes['id'] ?>" <?php echo ($opcion == $continentes['id']) ? 'selected="selected"' : '' ?>>
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
                                            <option value="0">Seleccionar Pais</option>
                                            <?php

                                            //CATCH DEL CONTINENTE ELEGIDO
                                            foreach ($Continente->getContinente() as $c) {
                                                if ($_GET['continente'] == $c['id']) {
                                                    $cont_id = $c['id'];

                                                $filtro_p = [
                                                    "continente" => $cont_id,
                                                ];
                                                }
                                            } ?>
                                            
                                                <?php
                                                foreach ($Pais->getPais($filtro_p) as $paises) : ?>
                                                    <option value="<?php echo $paises['id'] ?>" <?php echo ($opcion2 == $paises['id']) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $paises['nombre']; ?>
                                                    </option>
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
                                            <option value="0">Seleccionar Ciudad</option>

                                            <?php

                                            //CATCH DEL PAIS ID ELEGIDO
                                            foreach ($Pais->getPais() as $paises) {
                                                if ($_GET['pais'] == $paises['id']) {
                                                    $pais_id = $paises['id'];
                                                }
                                            }

                                            $filtro = [
                                                "continente" => $cont_id,
                                                "pais" => $pais_id,
                                                "ciudad" => ''
                                            ];
                                                foreach ($Productos->getProductos($filtro, '') as $ciudades) : ?>
                                                    <option value="<?php echo $ciudades['id'] ?>" <?php echo ($opcion3 == $ciudades['id']) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $ciudades['nombre']; ?>
                                                    </option>
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