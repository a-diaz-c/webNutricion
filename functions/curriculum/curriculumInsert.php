<?php 
spl_autoload_register(function($class){
	if($class === 'Conexion' || $class === 'Session')
		return include "../../class/$class/$class.class.php";
	include "../../class/Curriculum/$class.class.php";
});

function validar($file){
	if(($file['user-file']['type'] !== 'image/jpeg') && ($file['user-file']['type'] !== 'image/png')){
		return false;
	}

	if($file['user-file']['size'] > 1000000){
		return false;
	}
	return true;
}

function upload(){
	$file = $_SERVER['DOCUMENT_ROOT']."/doc_curriculum/".basename($_FILES['user-file']['name']);
	if(! move_uploaded_file($_FILES['user-file']['tmp_name'],$file)){
		return false;
	}
	return $file;
}


if(! validar($_FILES)){
	header('location: ../../dashboard/curriculum.php');
	exit();
}

$file = upload($_FILES);
$curriculum  = new Curriculum(new Conexion);
$curriculum->setNombre($_POST['nombre']);
$curriculum->setRuta($file);

if($curriculum->insert())
	header('Location: ../../dashboard/curriculum.php?text=Se subio carrectamente');
else
	header('Location: ../../dashboard/curriculum.php?text=Error al subir');



 ?>