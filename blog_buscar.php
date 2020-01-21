<?php 
require 'functions/home/select_blog.php';
require 'header.php';
$busqueda = $_GET['categoria'] ?? $_GET['buscar'];//Operador de fusión de null, devolver 'categoria' y si no existe devolver 'bucar'
?>

    <!-- Page Content -->
    <div class="container" Style="flex: 1">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Blog</h1>
          <h4 class="my-4">Resultados de la busqueda de "<?php echo $busqueda ?>"</h4>

          <?php
          if(isset($_GET['id'])) $res = getArticlesCatego($_GET['id']);
          else $res = getArticlesNombre($_GET['buscar']) ;
          	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
          	    $dir = '../img/'.getImg($row['img']);
          ?>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="<?php echo $dir ?>" alt="Card image cap">
            <div class="card-body">
              <a href="blog_post.php?id=<?php echo $row['articulo_id'] ?>" class="text-dark"><h5 class="card-title text-dark"><?php echo utf8_encode($row['titulo']); ?></h5></a>
            </div>
            <div class="card-footer text-muted">
              Publicado el <?php echo $row['fecha']; ?>
            </div>
          </div>

      	  <?php } ?>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php require 'sidebar.php' ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php require 'footer.php' ?>


<?php //require 'footer.php'; ?>