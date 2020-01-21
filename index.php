<?php 
require 'functions/home/select_main.php';
require 'functions/home/img.php';
require 'header.php';
$res = getArticles();
?>

	<!-- Carousel -->
	<div class="container col-xl-8">
		<div class="row"> 
			<div class="col-lg-12">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				  </ol>
				  <div class="carousel-inner">
				  	<?php
				  	$i=0;
				  	while($row = $res->fetch_array(MYSQLI_ASSOC) and ($i<3)){
				  		$dir = '../img/'.getImg($row['img']);
				  		if($i==0)
				  			echo '<div class="carousel-item active">';
				  		else
				  			echo '<div class="carousel-item">';
				  		$i++;
				  	 ?>
				    
				      <a href="blog_post.php?id=<?php echo $row['articulo_id'] ?>"><img class="d-block w-100" src="<?php echo $dir ?>" alt="First slide" id=""></a>
				      <div class="carousel-caption">
				      	<a class="text-light" href="blog_post.php?id=<?php echo $row['articulo_id'] ?>"><p class="text-light"><?php echo utf8_encode($row['titulo']); ?></p></a>
				      </div>
				  </div>
				<?php } ?>
				  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Anterior</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Siguiente</span>
				  </a>
				</div>
			</div>
		</div>
	</div>
	<!-- fin Carousel-->

	<!-- texto -->

	<div class="container">
		<div class="row mb-3">
			<div class="card bg-light">
				<div class="card-header titulo-card">¿Quiénes somos?</div>	
				<div class="card-body">
					<p class="card-text text-justify">
						Somos un equipo profesional y multidisciplinario enfocados en el área de la salud y deporte, donde ofrecemos programas de orientación nutrimental y entrenamiento de acuerdo a las necesidades de mejorar: el estado físico y/o el estado de salud de cada persona, contando con nutricionistas y entrenadores deportivos físicos capacitados y actualizados en las ramas académicas, brindando un servicio más completo, vinculando en todo momento el ejercicio y planes alimenticios.
					</p>
				</div>
			</div>
		</div>

		<div class="row mt-3 justify-content-between">		
			<div class="card bg-light mb-3 col-md-6 col-xl-6 col-sm-12">
			  <div class="card-header titulo-card">Misión</div>
			  <div class="card-body">
			    <p class="card-text text-justify">Ser una organización reconocida a nivel nacional e internacional, por brindar servicios especializados en mejora de rendimiento deportivo, salud y estética corporal dirigida a hombres y mujeres interesados en tener un buen estado físico y de salud, mediante  consultas nutricionales y entrenamientos periodizados y estructurada para cada persona, basados en sus objetivos, características físicas, anatómicas y gustos alimenticios.</p>
			  </div>
			</div>
			<div class="card bg-light mb-3 col-md-6 col-xl-6 col-sm-12">
			  <div class="card-header titulo-card">Visión</div>
			  <div class="card-body">
			    <p class="card-text text-justify">Consolidar Reconocimiento a nivel nacional e internacional, por generar mejoras físicas y de salud, que permitan superar las expectativas de nuestros clientes, por la calidad de servicio, y valides académica.</p>
			  </div>
			</div>			
		</div>
	</div>
</div>
	<!-- fin texto-->
<?php require 'footer.php' ?>