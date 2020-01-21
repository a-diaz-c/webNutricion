<?php

if(!isset($_GET['id']) || empty($_GET['id'])) exit('No se recibió id');

spl_autoload_register(function($class){
		include "../../class/$class/$class.class.php";
});
require '../home/img.php';

function selectCategorie($id){
	$curriculum = new Curriculum(new Conexion);
	return $res = $curriculum->delete($id);
}

if(selectCategorie($_GET['id']))
	header('Location: ../../dashboard/curriculum.php');
echo "Error al eliminar";
?>