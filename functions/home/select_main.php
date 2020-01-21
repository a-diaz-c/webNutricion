<?php  
spl_autoload_register(function($class){
	if($class === 'Conexion')
		return include "class/$class/$class.class.php";
	include "class/Article/$class.class.php";
});

function getArticles(){
	$article = new Article(new Conexion);
	$cliente = new Client($article);
	$res = $cliente->operate('select');
	return $res;
}
 ?>