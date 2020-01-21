<?php 
spl_autoload_register(function($class){
	if($class === 'Conexion' || $class === 'Session')
		return include "../class/$class/$class.class.php";
	include "../class/Archivo/$class.class.php";
});

function upload(){
	$file = $_SERVER['DOCUMENT_ROOT']."/Practicas/Pagina Blog/archivos/".basename($_FILES['user-file']['name']);
	if(! move_uploaded_file($_FILES['user-file']['tmp_name'],$file)){
		return false;
	}
	return $file;
}

$file = upload($_FILES);
$archivo  = new Archivo(new Conexion);
$archivo->setDescripcion($_POST['desc']);
$archivo->setArchivo($file);

if($archivo->insert())
	header('Location: ../dashboard/archivos.php?text=Se subio carrectamente');
else
	header('Location: ../dashboard/archivos.php?text=Error al subir');



 ?>