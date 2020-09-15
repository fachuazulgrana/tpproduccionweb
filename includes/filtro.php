<?php
/* $str_data_continentes = file_get_contents("json/continentes.json");
$str_data_paises = file_get_contents("json/paises.json");
$str_data_ciudades = file_get_contents("json/ciudades.json");

$dataContinentes = json_decode($str_data_continentes, true);
$dataPaises = json_decode($str_data_paises, true);
$dataCiudades = json_decode($str_data_ciudades, true); */

include_once 'app/Conexion.inc.php';
include_once 'app/config.inc.php';
include_once 'app/Continente.inc.php';
include_once 'app/Pais.inc.php';
include_once 'app/Producto.inc.php';
include_once 'app/Filtro.inc.php';
$continent = Filtro::obtener_continentes(Conexion::obtener_conexion());
$country = Filtro::obtener_paises(Conexion::obtener_conexion());
$product = Filtro::obtener_productos(Conexion::obtener_conexion());
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
                                        <?php $opcion = 'Todo';
                                    
                                        ?>
                                        <?php !empty($_GET['continente']) ? $opcion = $_GET['continente'] : $opcion = "" ?>
                                        <select name="continente" class="custom-select custom-select-lg" id="continente" onchange="this.form.submit()">
                                            <option value="" selected="selected">Seleccionar Continente</option>
                                            <?php foreach ($continent as $conti) : ?>
                                                <option <?php echo ($opcion == $conti->obtener_nombre()) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $conti->obtener_nombre();  ?>
                                                </option>
                                            <?php endforeach ?>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">

                                    <form action="" method="GET" class="">
                                        <?php $opcion2 = 'Todo'; ?>
                                        <?php !empty($_GET['pais']) ? $opcion2 = $_GET['pais'] : $opcion2 = "" ?>
                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">
                                        <select name="pais" class="custom-select custom-select-lg" id="pais" onchange="this.form.submit()">
                                            <option>Seleccionar Pais</option>
                                                <?php
                                                foreach($continent as $conti2){
                                                    if($_GET['continente'] == $conti2->obtener_nombre()){
                                                        $cont_id = $conti2->obtener_id();
                                                    }
                                                } ?>
                                                <?php if (!empty($_GET['continente'])) : ?>
                                                    <?php
                                                    $pais_filtrado = Filtro::obtener_paises_con_continente(Conexion::obtener_conexion(), $cont_id)
                                                    ?>
                                                    <?php foreach ($pais_filtrado as $pa_fil) : ?>
                                                    <option <?php echo ($opcion2 == $pa_fil->obtener_nombre()) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $pa_fil->obtener_nombre(); ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                                <?php
                                                if ($_GET['continente'] == null || $_GET['continente'] == 'Todo') : ?>
                                                <?php foreach ($country as $countr) : ?>
                                                    <option <?php echo ($opcion2 == $countr->obtener_nombre()) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $countr->obtener_nombre(); ?>
                                                    </option>
                                                    <?php endforeach ?>
                                                <?php endif ?>

                                            
                                        </select>
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4">

                                    <form action="" method="GET" class="">
                                        <?php $opcion3 = 'Todo'; ?>
                                        <?php !empty($_GET['ciudad']) ? $opcion3 = $_GET['ciudad'] : $opcion3 = "" ?>
                                        <input type="hidden" name="continente" value="<?php echo isset($_GET['continente']) ? $_GET['continente'] : '' ?>">
                                        <input type="hidden" name="pais" value="<?php echo isset($_GET['pais']) ? $_GET['pais'] : '' ?>">
                                        <select name="ciudad" class="custom-select custom-select-lg" id="ciudad" onchange="this.form.submit()">
                                            <option>Seleccionar Ciudad</option>
                                            <?php
                                            foreach($country as $coun2){
                                                    if($_GET['pais'] == $coun2->obtener_nombre()){
                                                        $countr_id = $coun2->obtener_id();
                                                    }
                                                } ?>
                                            <?php if (!empty($_GET['pais'])) : 
                                                $prod_pais = Filtro::obtener_productos_con_pais(Conexion::obtener_conexion(), $countr_id);
                                                ?>
                                            <?php foreach ($prod_pais as $pr) { ?>
                                                
                                                    <option <?php echo ($opcion3 == $pr->obtener_ciudad()) ? 'selected="selected"' : '' ?>>
                                                        <?php echo $pr->obtener_ciudad(); ?>
                                                    </option>
                                            <?php } 
                                            
                                            endif ?>
                                                <?php if ($_GET['pais'] == null || $_GET['pais'] == '') : 
                                                    foreach($product as $prod) { ?>
                                                    <option <?php echo ($opcion3 == $prod->obtener_ciudad()) ? 'selected="selected"' : '' ?>>
                                                    <?php echo $prod->obtener_ciudad(); ?>
                                                    </option>
                                                    <?php   
                                                }
                                                 endif ?>
                                            
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
