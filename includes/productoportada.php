<div class="container">
  <div class="row justify-content-center pb-4">

    <div class="col-12">
      <div class="row">

        <?php
        $continente = (isset($_GET["continente"]) ? $_GET['continente'] : null);
        $pais = (isset($_GET["pais"]) ? $_GET['pais'] : null);
        $ciudad = (isset($_GET["ciudad"]) ? $_GET['ciudad'] : null);

        //foreach ($Productos->getProductos() as $ciudades)
        //foreach ($productos as $key => $value) {
        foreach ($Productos->getProductos() as $ciudades){

          if ($page == 'index' && $ciudades['destacado']) {

            include('card_paises.php');
          } elseif ($page == 'catalogo') {


            if (
              ((empty($continente) || $continente == 'Todo') && empty($pais) && empty($ciudad) || // No se aplica filtro 
              (empty($ciudad) && empty($pais) && $continente == $ciudades['continente']) || // Se filtra por continente
              ((empty($continente) || $continente == 'Todo') && empty($ciudad) && $pais == $ciudades['pais'] ) || // Se filtra por paises
              ((empty($continente) || $continente == 'Todo') && (empty($pais) || $pais == 'Todo') && $ciudad == $ciudades['nombre'] ) ||
              (empty($ciudad) && $pais == $ciudades['pais'] && $continente == $ciudades['continente']) ||
              ($continente == $ciudades['continente'] && $pais == $ciudades['pais'] && $ciudad == $ciudades['nombre']) // Se filtra por continente y pais
              ) 
            
            )
                
            {


              include('card_paises.php');
            }
          }
        }
        ?>

      </div>
    </div>

  </div>
</div>
