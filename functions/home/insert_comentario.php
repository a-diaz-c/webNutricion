<?php 
if(!isset($_POST)) exit('No se recibieron datos');

if(empty($_POST['nombre']) || empty($_POST['contenido'])) exit('Datos vacios');

spl_autoload_register(function($class){
  include "../../class/$class/$class.class.php";
});

function insertComentario(){
	$comentario = new Comentarios(new Conexion);
	$comentario->setNombre(utf8_decode($_POST['nombre']));
	$comentario->setContenido(utf8_decode($_POST['contenido']));
	$comentario->setArticulo_id($_POST['id']);
	return $comentario->insert();
}

echo insertComentario();
 ?>