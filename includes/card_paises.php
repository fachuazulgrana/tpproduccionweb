            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 my-3">
              <div class="card carta">

              <img height="auto" width="100%" src="pruebas/img/<?php echo $ciudades['id'] ?>.jpg" alt="imagen de <?php echo $ciudades['nombre']; ?>">

              
              <?php 
                //foreach ($Productos->getProductos() as $ciudades)
                //echo '<img src="' .  $ciudades["url"] . '" class="card-img-top" alt="..." />'
              ?>

                <div class="card-body">
                  <h5 class="card-title1 font-weight-bold"><?php echo $ciudades["nombre"]; ?></h5>
                  <p class="card-text"><?php echo cortar($ciudades["descripcion"]); ?></p>
                  <div class="row justify-content-center pt-1 pb-3">
                    <h5>
                      <span class="card-text text-center badge badge-light"><?php echo $ciudades["precio"]; ?></span>
                    </h5>
                  </div>
                  <div class="container d-flex justify-content-around">
                    <a href="#" class="btn btn-success">Comprar</a>

                    
                    <?php echo '<a href="product_details.php?id=' . $ciudades["id"] . '"class="btn btn-outline-primary">Ver mas</a>' ?>
                  </div>
                </div>
              </div>
            </div>