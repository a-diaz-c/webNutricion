<?php

if(!isset($_GET['id']) || empty($_GET['id'])) exit('No se recibió id');

spl_autoload_register(function($class){
		include "../../class/$class/$class.class.php";
});

function selectCategorie($id){
	$comentarios = new Comentarios(new Conexion);
	return $res = $comentarios->delete($id);
}

if(selectCategorie($_GET['id']))
	header('Location: ../../blog_post.php?id='.$_GET['articulo']);
echo "Error al eliminar";
?>