<?php 

spl_autoload_register(function($class){
		include "../../class/$class/$class.class.php";
});

function validateId($_id){
	if(empty($_id) || !is_numeric($_id) || $_id <= 0){
		return false;
	}
	return true;
}
function getArticles($id){
	$article = new Article(new Conexion);
	$article->setArticleId($id);
	$cliente = new Client($article);
	$res = $cliente->operate('select');
	return $result_array = $res->fetch_array(MYSQLI_ASSOC);
}

 ?>