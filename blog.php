<?php 
require 'functions/home/select_blog.php';
require 'functions/home/select_main.php';
require 'header.php';
$res = getArticles();
$total_rows = $res->num_rows;
$paginas = $total_rows/5 ;  
$paginas = ceil($paginas);

if(!isset($_GET['pagina'])){
    header('Location: blog?pagina=1');
    exit();
}
?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Nutrition and Fitness
          </h1>

          <?php

            $res = getArticlesPag($_GET['pagina']);
          	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
            $img = '../img/'.getImg($row['img']);        	
          ?>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo $img ?>" alt="Card image cap">
            <div class="card-body">
              <a href="blog_post.php?id=<?php echo $row['articulo_id'] ?>" class="text-dark"><h5 class="card-title text-dark"><?php echo utf8_encode($row['titulo']); ?></h5></a>
            </div>
            <div class="card-footer text-muted">
              <?php $date = date_create($row['fecha']); ?>
              Publicado el <?php echo getFecha($row['fecha']) ?>
            </div>
          </div>

      	  <?php } ?>

          <!-- Pagination -->
            <ul class="pagination justify-content-between">
              <li><a class="text-light <?php echo $_GET['pagina']<=1 ? 'disabled' : ''?> btn btn-dark" href="blog?pagina=<?php echo $_GET['pagina']-1?>">Anterior</a></li>
              <li><a class="text-light <?php echo $_GET['pagina']>=$paginas ? 'disabled' : ''?> btn btn-dark" href="blog?pagina=<?php echo $_GET['pagina']+1?>">Siguiente</a></li>
            </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php require 'sidebar.php' ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php require 'footer.php' ?>