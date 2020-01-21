<?php

if(!isset($_GET['id']) || empty($_GET['id'])) exit('No se recibió id');

spl_autoload_register(function($class){
		include "../../class/$class/$class.class.php";
});

function selectCategorie($id){
	$categorie = new Categorie(new Conexion);
	return $res = $categorie->delete($id);
}

if(selectCategorie($_GET['id']))
	header('Location: ../../dashboard/categoria.php');
echo "Error al eliminar";
?>