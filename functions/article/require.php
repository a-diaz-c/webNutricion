<?php 
spl_autoload_register(function($class){
	if($class === 'Conexion' || $class === 'Session')
		return include "../../class/$class/$class.class.php";
	include "../../class/Article/$class.class.php";
});

$session = new Session();
if(!$session->validateSession('usuario')){
  header('location: ../../dashboard/login/login.php');
}


 ?>