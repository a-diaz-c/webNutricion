<?php 
require 'header.php'; 
require 'navbar.php';
require 'sidebar.php';
?>
	        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
          </div>
          <h2>Categorías</h2>
          
            <form action="../functions/categorie/categorieInsert.php" method="post">
              <div class="form-group col-7">
                <label for="title">Categoría</label>
                <input type="text" class="form-control" id="title" placeholder="Categoria" name="categoria">
              </div>
              <div class="col-7">
                <label for="title">Descripción</label>
                <input type="text" class="form-control" id="title" placeholder="Max 255 caracteres" name="descripcion">
              </div>
              <div class="col-12 mt-4">
              <button name="submit" type="submit" class="btn btn-default">Guardar</button>
              </div>
            </form>
            <?php 
            include '../functions/categorie/categorieSelect.php';
            $res = selectCategorie();
            ?>
              <div class="table-responsive mt-4">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#Id</th>
                      <th>Categoría</th>
                      <th>Descripción</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody id="articles">
                    <?php while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                      <td><?php echo $row['id_categoria']; ?></td>
                      <td><?php echo utf8_encode($row['categoria']); ?></td>
                      <td><?php echo utf8_encode($row['descripcion']); ?></td>
                      <td><a href="../functions/categorie/categorieDelete.php?id=<?php echo $row['id_categoria'] ?>">Eliminar</a>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

        </main>
      </div>
    </div>

 <?php require 'footer.php'; ?>