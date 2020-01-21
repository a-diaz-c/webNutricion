<?php 
require 'header.php';
require '../functions/select_archivo.php';
$res = getArchivos();
 ?>

 		<div class="container" style="flex: 1">	
		 <table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Descripcion</th>
		      <th scope="col">Nombre</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php

		  		while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
		  			$nombre = getNombre($row['dir']);
		  	?>
		    <tr>
		      <th scope="row"><?php echo $row['archivo_id']; ?></th>
		      <td><?php echo $row['descripcion']; ?></td>
		      <td><?php echo "$nombre"; ?></td>
		    </tr>
			<?php } ?>
		  </tbody>
		</table>
		</div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php require 'footer.php'; ?>