<?php
require 'img.php';
require 'fecha.php';    
spl_autoload_register(function($class){
	if($class === 'Conexion' or $class === 'Categorie')
		return include "class/$class/$class.class.php";
	include "class/Article/$class.class.php";
});

$conexion = new Conexion();

function getArticlesPag($indice){
	$indice = ($indice-1)*5;
	$query = "SELECT * from articulo order by fecha desc limit $indice,5";
	global $conexion;
	$res = $conexion->query($query);
	$conexion->close();
	return $res;
}

function getArticlesNombre($buscar){
    global $conexion;
    $buscar = $conexion->real_escape_string($buscar);
	$query = "SELECT * FROM articulo WHERE titulo LIKE '%$buscar%' order by fecha desc";
	$res = $conexion->query($query);
	$conexion->close();
	return $res;
}

function getArticlesCatego($buscar){
    global $conexion;
    $buscar = $conexion->real_escape_string($buscar);
    $query = "SELECT * FROM articulo WHERE categoria_id_arti= $buscar order by fecha desc";
    $res = $conexion->query($query);
  	$conexion->close();
  	return $res;
}
?>