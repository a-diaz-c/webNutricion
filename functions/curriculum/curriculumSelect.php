<?php 
spl_autoload_register(function($class){
		include "../../class/$class/$class.class.php";
});

function selectCurriculum(){
	$curriculum = new Curriculum(new Conexion);
	return $res = $curriculum->select();
}

?>