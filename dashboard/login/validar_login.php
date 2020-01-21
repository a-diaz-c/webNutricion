<?php 

spl_autoload_register(function($class){
	include "../../class/$class/$class.class.php";
});

if(isset($_POST['submit'])){
	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	if(empty($usuario) or empty($password)){
		header('location: login.php?message=Usuario o contrasela no introducidos');
	}
}

$login = new Login(new Conexion);
$login->setEmail($usuario);
$login->setPassword($password);
$row = $login->singIn();
if($row){
	$session = new Session();
	$session->addValue('usuario-nutrifit',$row['usuario']);
	echo $session->getValue('usuario-nutrifit');
	header('location: ../index.php');
}else{
	header('location: login.php?message=Usuario o contrasela incorrectos');
}

 ?>