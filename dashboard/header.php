<?php 

spl_autoload_register(function($class){
    if($class === 'Conexion' || $class === 'Session' || $class === 'Categorie' || $class === 'Curriculum')
      return include "../class/$class/$class.class.php";
  include "../class/Article/$class.class.php";
});

$session = new Session();
if(!$session->validateSession('usuario-nutrifit')){
  header('location: login/login.php');
}

setlocale(LC_TIME, 'es_ES');
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard/dashboard.css" rel="stylesheet">
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
  </head>

  <body>