            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 my-3">
              <div class="card carta <?php 
              
              if($ciudades['destacado']==1){
                echo "border border-warning";}
              else {
                echo "";
              } ?>"> 

                <?php if($ciudades['destacado'] == 1): ?>
                <div class="badge-top">Destacado</div>
                <?else: ?>
                    <?php endif?>

              <img height="100%" width="100%" src="abm/images/<?php echo $ciudades['id']?>/img_0_small.jpg" alt="imagen de <?php echo $ciudades['nombre']; ?>">

                <div class="card-body">

                  <h5 class="card-title1 font-weight-bold <?php 
              
              if($ciudades['destacado']==1){
                echo "text-warning";}
              else {
                echo "";
              } ?>
                  "><?php echo $ciudades["nombre"]; ?></h5>
                  <p class="card-text"><?php echo cortar($ciudades["descripcion"]); ?></p>
                  <div class="row justify-content-center pt-1 pb-3">
                    <h5>
                    <p class="num-puntaje mr-2"> <?php echo $Comentarios->getRanqueo($ciudades['id']); ?> </p>
                    <p class="star-rating" style="--rating: <?php echo $Comentarios->getRanqueo($ciudades['id']); ?>"></p>
                      <span class="card-text text-center badge badge-light">$<?php echo $ciudades["precio"]; ?></span>
                    </h5>
                  </div>
                  <div class="container d-flex justify-content-around">
                    <a href="#" class="btn <?php 
              
              if($ciudades['destacado']==1){
                echo "btn-warning";}
              else {
                echo "btn-success";
              } ?>">Comprar</a>

                    
                    <?php echo '<a href="product_details.php?id=' . $ciudades["id"] . '"class="btn btn-outline-primary">Ver mas</a>' ?>
                  </div>
                </div>
              </div>
            </div>