<?php 
require 'header.php'; 
require 'navbar.php';
require 'sidebar.php';
if(isset($_GET['text']))
  $text = $_GET['text'];
else
  $text = "";
?>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          </div>
          <h6 class="mt-3"><?php echo $text; ?></h6>            
          <h2>Curriculum</h2>
            <form method="post" action="../functions/curriculum/curriculumInsert.php" enctype="multipart/form-data">
              <div class="form-group">
                  <label for="nombreArchivo">Nombre</label>
                  <input type="textarea" class="form-control" id="nombreArchivo" name="nombre">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Subir archivo</label>
                <input name="user-file" type="file" id="exampleInputFile">
              </div>
                  <button name="submit" type="submit" class="btn btn-default">Guardar</button>
            </form>
            <?php 
            include '../functions/curriculum/curriculumSelect.php';
            $res = selectCurriculum();
            ?>
              <div class="table-responsive mt-4">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>#Id</th>
                      <th>Nombre</th>
                    </tr>
                  </thead>
                  <tbody id="articles">
                    <?php while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                      <td><?php echo $row['curriculum_id']; ?></td>
                      <td><?php echo $row['nombre']; ?></td>
                      <td><a href="../functions/curriculum/curriculumDelete.php?id=<?php echo $row['curriculum_id'] ?>">Eliminar</a>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>

        </main>
      </div>
    </div>

 <?php require 'footer.php'; ?>