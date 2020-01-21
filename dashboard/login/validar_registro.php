<?php 

spl_autoload_register(function($class){
	include "../../class/$class/$class.class.php";
});


if(isset($_POST['submit'])){
	$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$passwordDos = isset($_POST['password']) ? $_POST['password-dos'] : '';
	if(empty($usuario) or empty($password)){
		header('location: registro.php?message=Usuario o contraseña no introducidos');
	}
	if($password != $passwordDos){
		header('location: registro.php?message=Las contraseñas no coinciden');
	}
}

$registro = new Registro(new Conexion);
$registro->setNombre($usuario);
$registro->setPassword($password);
if($registro->comprobar_usuario()){
	header('location: registro.php?message=El usuario ya se encuentra');
}else{
	if($registro->registrar())
		header('location: login.php?message=Registrado Correctamente');
	else
		header('location: registro.php?message=Error al registrar');
}

 ?>