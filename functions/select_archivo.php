<?php  
spl_autoload_register(function($class){
	if($class === 'Conexion' || $class === 'Session')
		return include "../class/$class/$class.class.php";
	include "../class/Archivo/$class.class.php";
});

function getArchivos(){
	$archivo = new Archivo(new Conexion);
	return $archivo->select(); 
}

function getNombre($path_archivo){
	 $archivo = explode('/', $path_archivo);
	 return $archivo[count($archivo)-1];
}

?>