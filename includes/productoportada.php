<div class="container">
  <div class="row justify-content-center pb-4">

    <div class="col-12">
      <div class="row">

        <?php
        $continente = (isset($_GET["continente"]) ? $_GET['continente'] : null);
        $pais = (isset($_GET["pais"]) ? $_GET['pais'] : null);
        $ciudad = (isset($_GET["ciudad"]) ? $_GET['ciudad'] : null);

        //foreach ($Productos->getProductos() as $ciudades)
        foreach ($productos as $key => $value) {
        //foreach ($Productos->getProductos() as $ciudades){
          //foreach($Continente->getContinente() as $continentes){
            //foreach ($Pais->getPais() as $paises){

              if ($page == 'index' && $ciudades['destacado'] == 1) {

                include('card_paises.php');
              } elseif ($page == 'catalogo') {
                if (
                  ((empty($_GET["continente"])) && empty($_GET["pais"]) && empty($_GET["ciudad"]) ||
                  (empty($_GET["ciudad"]) && empty($_GET["pais"]) && $_GET["continente"] == $continentes['nombre']) ||
                  ((empty($_GET["continente"])) && empty($_GET["ciudad"]) && $_GET["pais"] == $paises['nombre'] ) ||
                  ((empty($_GET["continente"])) && (empty($_GET["pais"])) && $_GET["ciudad"] == $ciudades['nombre'] ) ||
                  (empty($_GET["ciudad"]) && $_GET["pais"] == $paises['nombre'] && $_GET["continente"] == $continentes['nombre']) ||
                  ($_GET["continente"] == $continentes['nombre'] && $_GET["pais"] == $paises['nombre'] && $_GET["ciudad"] == $ciudades['nombre'])
                  ) 
                
                )
              /*
                if (
                  ((empty($continente) || $continente == 'Todo') && empty($pais) && empty($ciudad) || // No se aplica filtro 
                  (empty($ciudad) && empty($pais) && $continente == $ciudades['continente']) || // Se filtra por continente
                  ((empty($continente) || $continente == 'Todo') && empty($ciudad) && $pais == $ciudades['pais'] ) || // Se filtra por paises
                  ((empty($continente) || $continente == 'Todo') && (empty($pais) || $pais == 'Todo') && $ciudad == $ciudades['nombre'] ) ||
                  (empty($ciudad) && $pais == $ciudades['pais'] && $continente == $ciudades['continente']) ||
                  ($continente == $ciudades['continente'] && $pais == $ciudades['pais'] && $ciudad == $ciudades['nombre']) // Se filtra por continente y pais
                  ) 
                
                )
              */
                {


                  include('card_paises.php');
                }
              }

            }
          //}
        //}
        ?>

      </div>
    </div>

  </div>
</div>
