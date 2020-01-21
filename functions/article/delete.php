<?php 
require 'require.php';
require '../home/img.php';

if(empty($_POST['id'])) exit('No se recibió id');
//if(!is_numeric($_GET['id']) or $_GET['id'] <=0 ) exit('Hubo un error');

$article = new Article(new Conexion);
$article->setArticleId($_POST['id']);
//var_dump($article->article_id);
$cliente = new Client($article);

$res = $cliente->operate('select');
$row = $res->fetch_array(MYSQLI_ASSOC);
$img = $_SERVER['DOCUMENT_ROOT']."/img/".getImg($row['img']);

if($cliente->operate('delete')){
    unlink($img);
	header('Location: ../../dashboard/index.php');
	exit();
}

echo "Error al eliminar";

 ?>