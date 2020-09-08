<div class="container">
  <div class="row justify-content-center pb-4">

    <div class="col-12">
      <div class="row">

        <?php
        $continente = (isset($_GET["continente"]) ? $_GET['continente'] : null);
        $pais = (isset($_GET["pais"]) ? $_GET['pais'] : null);
        $ciudad = (isset($_GET["ciudad"]) ? $_GET['ciudad'] : null);


        foreach ($productos as $key => $value) {

          if ($page == 'index' && $value['destacado']) {

            include('card_paises.php');
          } elseif ($page == 'catalogo') {


            if (
              ((empty($continente) || $continente == 'Todo') && empty($pais) && empty($ciudad) || // No se aplica filtro 
              (empty($ciudad) && empty($pais) && $continente == $value['continente']) || // Se filtra por continente
              ((empty($continente) || $continente == 'Todo') && empty($ciudad) && $pais == $value['pais'] ) || // Se filtra por paises
              ((empty($continente) || $continente == 'Todo') && (empty($pais) || $pais == 'Todo') && $ciudad == $value['nombre'] ) ||
              (empty($ciudad) && $pais == $value['pais'] && $continente == $value['continente']) ||
              ($continente == $value['continente'] && $pais == $value['pais'] && $ciudad == $value['nombre']) // Se filtra por continente y pais
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
