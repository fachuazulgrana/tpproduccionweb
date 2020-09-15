<div class="container">
  <div class="row justify-content-center pb-4">

    <div class="col-12">
      <div class="row">

        <?php
        include_once 'app/Conexion.inc.php';
        include_once 'app/config.inc.php';
        include_once 'app/Continente.inc.php';
        include_once 'app/Pais.inc.php';
        include_once 'app/Producto.inc.php';
        include_once 'app/Filtro.inc.php';

        $con = Filtro::obtener_continentes(Conexion::obtener_conexion());
        $pai = Filtro::obtener_paises(Conexion::obtener_conexion());
        $pro = Filtro::obtener_productos(Conexion::obtener_conexion());

        $continente_id = '';
        $pais_id = '';
        $producto_id = '';
 
        if(isset($_GET["continente"])){

        foreach($con as $c){
          if($_GET['continente'] == $c->obtener_nombre()){
            $continente_id = $c->obtener_id();
          }
        }

      } else{
        $continente_id = null;
      }
      if(isset($_GET["pais"])){

        foreach($pai as $p){
          if($_GET['pais'] == $p->obtener_nombre()){
            $pais_id = $p->obtener_id();
          }
        }
      } else{
        $pais_id = null;
      }

      if(isset($_GET["ciudad"])){

        foreach($pro as $pr){
          if($_GET['ciudad'] == $pr->obtener_ciudad()){
            $producto_id = $pr->obtener_id();
          }
        }
      } else{
        $producto_id = null;
      }

/*         $continente = (isset($_GET["continente"]) ? $_GET['continente'] : null);
        $pais = (isset($_GET["pais"]) ? $_GET['pais'] : null);
        $ciudad = (isset($_GET["ciudad"]) ? $_GET['ciudad'] : null); */

        $filtro_final = [
          "continente" => $continente_id,
          "pais" => $pais_id,
          "ciudad" => $producto_id
        ];

          if ($page == 'index'){
            
            $destacados = Filtro::obtener_productos_destacados(Conexion::obtener_conexion());

            foreach ($destacados as $prod_final){
            include('card_paises.php');

          }} elseif ($page == 'catalogo') {

            $producto_final = Filtro::obtener_productos_filtro(Conexion::obtener_conexion(), $filtro_final);

            foreach ($producto_final as $prod_final){

              include('card_paises.php');
            }

          }
/*             if (
              ((empty($continente) || $continente == 'Todo') && empty($pais) && empty($ciudad) || // No se aplica filtro 
              (empty($ciudad) && empty($pais) && $continente == $value['continente']) || // Se filtra por continente
              ((empty($continente) || $continente == 'Todo') && empty($ciudad) && $pais == $value['pais'] ) || // Se filtra por paises
              ((empty($continente) || $continente == 'Todo') && (empty($pais) || $pais == 'Todo') && $ciudad == $value['nombre'] ) ||
              (empty($ciudad) && $pais == $value['pais'] && $continente == $value['continente']) ||
              ($continente == $prod_final['continente'] && $pais == $prod_final['pais'] && $ciudad == $prod_final['nombre']) // Se filtra por continente y pais
              ) 
            
            )
                
            { */

          
        /* } */
        ?>

      </div>
    </div>

  </div>
</div>
