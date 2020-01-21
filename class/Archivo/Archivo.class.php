<?php 

class Archivo
{
	private $con;
	private $descripcion;
	private $archivo;


	function __construct(Conexion $con){
		$this->con = $con;
	}

	function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	function setArchivo($archivo){
		$this->archivo = $archivo;
	}
	
	function insert(){
		$query = "INSERT into archivos(descripcion,dir) values('$this->descripcion','$this->archivo')";
		$this->con->query($query);
		if($this->con->affected_rows <= 0)
			return false;
		return true;
	}

	function select(){
		$query = "SELECT * from archivos";
		return $this->con->query($query);

	}
}


 ?>