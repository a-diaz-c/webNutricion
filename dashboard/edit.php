<?php 
require 'header.php'; 
require 'navbar.php';
require 'sidebar.php';
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
          </div>
          <h2>Edit Artículo</h2>

          <?php
          include '../functions/article/select_by_id.php';
          $id = $_GET['id'];
          if(!validateId($_GET['id'])) exit('id_inválido');
          $articulo =  getArticles($id);
          ?>

          <form enctype="multipart/form-data" action="../functions/article/update.php" method="post">
              <div class="form-group col-7">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="<?php echo utf8_encode($articulo['titulo']) ?>">
              </div>
              <div class="col-5">
                <label for="categorie">Categoría</label>
                <select name="categorie_id" class="form-control" id="categorie">
                  <?php
                  include '../functions/categorie/categorieSelect.php';
                  $res = selectCategorie();
                  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                  ?>
                  <option value="<?php echo $row['id_categoria'] ?>"><?php echo utf8_encode($row['categoria']); ?></option>
                <?php } ?>
                </select>
              </div>
              <div class="col-12">
              <label for="content">Contenido</label>
              <textarea name="area" rows="15"><?php echo $articulo['contenido']; ?></textarea><br>
              <div class="form-group">
                <label for="exampleInputFile">Subir archivo</label>
                <input name="user-file" type="file" id="exampleInputFile">
              </div>
              <input type="hidden" id="id_article" name="id_article" value="<?php echo $articulo['articulo_id'] ?>">
              <button name="submit" type="submit" class="btn btn-default">Guardar</button>
              </div>
            </form>         
          </div>
        </main>
      </div>
    </div>

    <?php require 'footer.php'; ?>