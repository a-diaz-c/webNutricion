<?php  
require 'img.php';
require 'fecha.php';  
spl_autoload_register(function($class){
	if($class === 'Conexion' || $class === 'Comentarios'|| $class === 'Session')
		return include "../../class/$class/$class.class.php";
});

function getComentarios($id){
	$comentario = new Comentarios(new Conexion);
	$comentario->setArticulo_id($id);
	$session = new Session();
	$res = $comentario->select();
	if($session->validateSession('usuario-nutrifit'))
		usuario($res);

	noUsuario($res);
	

}

function usuario($res){
	while ($row = $res->fetch_array(MYSQLI_ASSOC)){
		echo '<div class="card container card-header">';
		echo '<div class="media ">';
		echo '<div class="media-body" id="comentarios">';
		echo '<div class="row justify-content-between">';
		echo '<h5 class="mt-0">'.utf8_encode($row['nombre']).'</h5> ';
		echo '<a href="../functions/home/delete_coment_post.php?id='.utf8_encode($row['comentario_id']).'&articulo='.$row['articulo_id_coment'].'"><img src="../home/img/delete.png" class="img-fluid" height="30px" width="40px"></img></a>';
		echo '</div>';
		echo '<p class="lead">'.$row['contenido_coment'].'</p>';
		echo '<p class="text-right">'.getFecha($row['fecha']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
}

function noUsuario($res){
	while ($row = $res->fetch_array(MYSQLI_ASSOC)){
		echo '<div class="card container card-header">';
		echo '<div class="media ">';
		echo '<div class="media-body" id="comentarios">';
		echo '<div class="row justify-content-between">';
		echo '<h5 class="mt-0">'.$row['nombre'].'</h5> ';
		echo '</div>';
		echo '<p class="lead">'.$row['contenido_coment'].'</p>';
		echo '<p class="text-right">'.getFecha($row['fecha']).'</p>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}	
}

echo getComentarios($_GET['id']);
?>