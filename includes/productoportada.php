<div class="container">
  <div class="row justify-content-center pb-4">

    <div class="col-12">
      <div class="row">

        <?php


      //WORKARROUND PARA EL FILTRO DEL GET
        $continente_id = '';
        $pais_id = '';
        $producto_id = '';

        if(isset($_GET["continente"])){

          foreach($Continente->getContinente() as $c){
            if($_GET['continente'] == $c['nombre']){
              $continente_id = $c['id'];
            }
          }
        } else{
          $continente_id = null;
        }

        if(isset($_GET["pais"])){
  
          foreach($Pais->getPais() as $p){
            if($_GET['pais'] == $p['nombre']){
              $pais_id = $p['id'];
            }
          }
        } else{
          $pais_id = null;
        }
  
        if(isset($_GET["ciudad"])){
  
          foreach($Productos->getProductos() as $pr){
            if($_GET['ciudad'] == $pr['nombre']){
              $producto_id = $pr['id'];
            }
          }
        } else{
          $producto_id = null;
        }


        $filtro_final = [
          "continente" => $continente_id,
          "pais" => $pais_id,
          "ciudad" => $producto_id
        ];

        //$continente = (isset($_GET["continente"]) ? $_GET['continente'] : null);
        //$pais = (isset($_GET["pais"]) ? $_GET['pais'] : null);
        //$ciudad = (isset($_GET["ciudad"]) ? $_GET['ciudad'] : null);

        //foreach ($Productos->getProductos() as $ciudades)
        //foreach ($productos as $key => $value) {
        
          //foreach($Continente->getContinente() as $continentes){
          //foreach ($Pais->getPais() as $paises){

          if ($page == 'index') {

            foreach ($Productos->getProductosDestacados() as $ciudades) {

            include('card_paises.php');
            }
          } elseif ($page == 'catalogo') {

            foreach ($Productos->getProductos($filtro_final) as $ciudades) {

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
              include('card_paises.php');
            }
          }

          //}
          //}
        
        ?>

      </div>
    </div>

  </div>
</div>