<?php 
require 'functions/home/select_curriculum.php';
require 'header.php';
$res = getCurriculum();
?>

<!-- <div class="container mt-5 tyle="flex: 1">
	<div class="row justify-content-center">
		<div class="col-xl-6">
			<div class="card bg-dark mb-5">
			  <img class="card-img" src="../curriculum/50933001_1955849544710838_5771460976578658304_n.png" alt="Card image">
			  <div class="card-img-overlay">
			  </div>
			</div>
		</div>
	</div>
</div>-->


<div class="container mt-5" Style="flex: 1">
	<?php
		while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
			$img = 'doc_curriculum/'.getImg($row['ruta']);
	?>
	<div class="row justify-content-center">
		<div id="accordion" class="col-xl-8">
		  <div class="card">
		    <div class="card-header" id="heading<?php echo $row['curriculum_id'] ?>">
		      <h5 class="mb-0">
		        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $row['curriculum_id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['curriculum_id'] ?>">
		          <?php echo $row['nombre']; ?>
		        </button>
		      </h5>
		    </div>
		    <div id="collapse<?php echo $row['curriculum_id'] ?>" class="collapse" aria-labelledby="heading<?php echo $row['curriculum_id']?>" data-parent="#accordion">
		      <div class="card-body">
		      		<div class="row mb-4 justify-content-center">
						<div class=""><img src="<?php echo $img ?>" class="img-fluid"></div>
					</div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
		<?php } ?>
</div>

<?php require('footer.php') ?>