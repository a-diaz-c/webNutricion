<?php 
spl_autoload_register(function($class){
	if($class === 'Conexion')
		return include "../class/$class/$class.class.php";
	include "../class/Article/$class.class.php";
});

$article = new Article(new Conexion);
$cliente = new Client($article);

writeln($cliente->operate('insert'));
writeln($cliente->operate('update'));
writeln($cliente->operate('delete'));
writeln($cliente->operate('select'));

function writeln($value){
	print("$value </br></br>");
}

 ?>