<?php
require 'header.php';
include 'functions/home/select_categorias.php';
$res = selectCategorie();
?>

<div class="container my-5" Style="flex: 1">
   <div class="list-group">
      <?php while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
      ?>
      <a href="blog_buscar?id=<?php echo $row['id_categoria'].'&categoria='.utf8_encode($row['categoria']); ?>" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1"><?php echo utf8_encode($row['categoria']); ?></h5>
        </div>
            <p class="mb-1"><?php echo utf8_encode($row['descripcion']); ?></p>
      </a>
      <?php } ?>
   </div> 
</div>

<?php require('footer.php') ?>