<?php 
spl_autoload_register(function($class){
	include "../class/$class/$class.class.php";
});

$session = new Session();
if(!$session->validateSession('usuario')){
	header('location: login/login.php');
}

$session->destroySession();

header('location: login/login.php')
 ?>