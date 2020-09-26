<div class="container">
  <div class="row justify-content-center pb-4">

    <div class="col-12">
      <div class="row">

        <?php

        if ($page == 'index') {
          foreach ($Productos->getProductosDestacados() as $ciudades) {
            include('card_paises.php');
          }
        } elseif ($page == 'catalogo') {
          // Parametros: ($_GET [continente, pais, ciudad], ORDER, activo/inactivo)
          foreach ($Productos->getProductos($_GET, 'ASC') as $ciudades) {

            include('card_paises.php');
          }
        }
        ?>
      </div>
    </div>

  </div>
</div>