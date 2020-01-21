<?php 

require 'require.php';
require 'files.php';

if(! validar($_FILES)){
	header('location: ../../dashboard/post.php');
	exit();
}

$img = upload($_FILES);
$article = new Article(new Conexion);
$article->setTitle(utf8_decode($_POST['title']));
$article->setAutor($session->getValue('usuario-nutrifit'));
$article->setCategorieId($_POST['categorie_id']);
$article->setContent($_POST['area']);
$article->setImg($img);

$cliente = new Client($article);
if($cliente->operate('insert')){
	header('Location: ../../dashboard/index.php');
	exit();
}

echo "Error al guardar";

 ?>