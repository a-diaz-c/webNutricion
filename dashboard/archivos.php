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
            <h1 class="h2">Subir Archivo</h1>
          	</div>
          	<h6 class="mt-3"><?php echo $text; ?></h6>	
        	<div class="container mt-3">
	        	<form method="post" action="../functions/subir_archivo.php" enctype="multipart/form-data">
	        		<div class="form-group">
	        	  		<label for="nombreArchivo">Descripción</label>
	        	  		<input type="textarea" class="form-control" id="nombreArchivo" name="desc">
				  	</div>
		              <div class="form-group">
		                <label for="exampleInputFile">Subir archivo</label>
		                <input name="user-file" type="file" id="exampleInputFile">
		              </div>
		              <button name="submit" type="submit" class="btn btn-default">Guardar</button>
		              </div>
				</form>
          	<h6 class="mt-3">No subir archivos mayores a 20MB</h6>				
			</div>			
        </main>
      </div>
    </div>

<?php require 'footer.php'; ?>