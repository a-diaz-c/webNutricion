<?php 

require 'require.php';
require 'files.php';

$img = '';

if (!empty($_FILES['user-file']['tmp_name'])) {
	if(! validar($_FILES)){
		header('location: ../../dashboard/edit.php');
		exit();
	}
	$img = upload($_FILES);
}

$article = new Article(new Conexion);
$article->setTitle(utf8_decode($_POST['title']));
$article->setAutor($session->getValue('usuario'));
$article->setCategorieId($_POST['categorie_id']);
$article->setContent($_POST['area']);
$article->setImg($img);
$article->setArticleId($_POST['id_article']);

$cliente = new Client($article);

if($cliente->operate('update')){
	header('Location: ../../dashboard/index.php');
	exit();
}

echo "Error al guardar";

 ?>