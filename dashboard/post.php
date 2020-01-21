<?php 
require 'header.php'; 
require 'navbar.php';
require 'sidebar.php';
?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <h2>Nuevo Post</h2>
          
            <form enctype="multipart/form-data" action="../functions/article/insert.php" method="post">
              <div class="form-group col-7">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
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
              <div class="col-12 mt-3">
              <label for="content">Contenido</label>
              <textarea name="area" rows="15"></textarea><br>
              <div class="form-group">
                <label for="exampleInputFile">Subir archivo</label>
                <input name="user-file" type="file" id="exampleInputFile">
              </div>
              <button name="submit" type="submit" class="btn btn-default">Guardar</button>
              </div>
            </form>             
        </main>
      </div>
    </div>

    <?php require 'footer.php'; ?>