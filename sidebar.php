    <?php
    include 'functions/home/select_categorias.php';
    $res = selectCategorie();
    ?>
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Buscar</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar..." id="text_buscar">
                <span class="input-group-btn">
                  <a href=""></a><button class="btn btn-secondary" type="button" onclick="JavaScript: buscarArticle()">Ir!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <!-- <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>-->
          
          <div class="list-group mb-4">
              <a href="#" class="list-group-item list-group-item-action disabled .bg-light" style = "background-color: #f8f9fa;">
                Categorías
              </a>
              <?php while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
              ?>
              <a href="blog_buscar?id=<?php echo $row['id_categoria'].'&categoria='.utf8_encode($row['categoria']); ?>" class="list-group-item list-group-item-action"> <?php echo utf8_encode($row['categoria']);?></a>
              <?php } ?>
              <a href="categorias" class="list-group-item list-group-item-action">Ver más</a>
          </div>

        </div>