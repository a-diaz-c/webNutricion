<?php 
require 'img.php';
spl_autoload_register(function($class){
  include "class/$class/$class.class.php";
});

function getCurriculum(){
	$curriculum = new Curriculum(new Conexion);
	$res = $curriculum->select();
	return $res;
}



 ?>