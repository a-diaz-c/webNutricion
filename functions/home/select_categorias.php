<?php 
spl_autoload_register(function($class){
		include "class/$class/$class.class.php";
});

function selectCategorie(){
	$categorie = new Categorie(new Conexion);
	return $res = $categorie->select();
}

?>