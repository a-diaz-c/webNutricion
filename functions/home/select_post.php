<?php
require 'img.php';
require 'fecha.php';  
spl_autoload_register(function($class){
	if($class === 'Conexion' || $class === 'Comentarios' || $class === 'Categorie')
		return include "class/$class/$class.class.php";
	include "class/Article/$class.class.php";
});

function validateId($id){
	if(empty($id) || !is_numeric($id) || $id <= 0){
		return false;
	}
	return true;
}
function getArticles($id){
	$article = new Article(new Conexion);
	$article->setArticleId($id);
	$cliente = new Client($article);
	$res = $cliente->operate('select');
	return $res;
}

?>