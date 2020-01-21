<?php 
require 'functions/home/select_post.php';
require 'header.php';
validateId($_GET['id'])==false ? header('Location: blog?pagina=1') : '';
$res = getArticles($_GET['id']);
$row = $res->fetch_array(MYSQLI_ASSOC);
$img = '../img/'.getImg($row['img']);
?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4"><?php echo utf8_encode($row['titulo']); ?></h1>

          <hr>
          <!-- Date/Time -->
          <p>Publicado el <?php echo getFecha($row['fecha'])?><a href=""><?php //echo $row['autor'];?></a></p>
          <hr>
          <!-- Preview Image -->
          <img class="img-fluid rounded" src="<?php echo $img; ?>" alt="">
          <hr>
          <!-- Post Content -->
          <?php echo $row['contenido']; ?>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Dejar un comentario: </h5>
            <div class="card-body">
              <form action="#">
              	<input type="hidden" name="id" id="article_id" value="<?php echo $_GET['id'];?>">
              	<div class="form-group col-lg-6 col-sm-12">
              	  <input type="text" name="nombre" placeholder="Nombre" class="form-control" id="nombre_coment">
              	</div>
                <div class="form-group col-12">             
                  <textarea class="form-control" rows="3" id="contenido_coment"></textarea>
                </div>
                <div class="col-lg-6">
                	<button type="button" class="btn btn-dark" id="submit_coment">Enviar</button>
                </div>
              </form>
            </div>
          </div>
          
          <!-- Single Comment -->
          <div id="comentarios" class="mb-4">
            
          </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php require 'sidebar.php'; ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.container -->

      	<!-- footer -->
    <footer class="page-footer font-small bg-dark">
    
      <!-- Copyright -->
      <div class="text-light">
      	<div class="container">
      		<h5 class="font-weight-bold">Ubicación</h5>
      	</div>
      	<div class="container">
      	<p>Calle Tampico #56, esquina con Nautla col. Progreso</p>
      	</div>
      </div>
      <!-- Copyright -->
    
    </footer>
    </body>
    	<!-- footer -->
    </body>
    	<script src="../js/jquery-3.3.1.min.js"></script>
    	<script src="../js/popper.min.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
      <script src="../js/comentario/comentario.js"></script>
</html>