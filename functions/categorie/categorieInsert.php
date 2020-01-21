<?php 

if(!isset($_POST["categoria"])) exit('No se recibio la categoria');

if(strlen($_POST['descripcion'])>254) exit('La descripción es mayor a 255 caracteres');


spl_autoload_register(function($class){
		include "../../class/$class/$class.class.php";
});
function insertCategorie(){
	$categorie = new Categorie(new Conexion);
	$categorie->setCategoria(utf8_decode($_POST["categoria"]));
	$categorie->setDescripcion(utf8_decode($_POST["descripcion"]));
	return $categorie->insert();
}

if(insertCategorie())
	header('Location: ../../dashboard/categoria.php');
echo "Erro al guardar categoria";
 ?>