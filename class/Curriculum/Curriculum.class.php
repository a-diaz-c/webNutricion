<?php 

class Curriculum
{
	private $con;
	private $nombre;
	private $ruta;

	function __construct(Conexion $con){
		$this->con = $con;
	}

	function setRuta($ruta){
		$this->ruta = $this->con->real_escape_string($ruta);
	}

	function setNombre($nombre){
		$this->nombre = $this->con->real_escape_string($nombre);
	}	

	function insert(){
		$query = "INSERT into curriculum(nombre,ruta) values ('$this->nombre','$this->ruta')";
		$this->con->query($query);
		if($this->con->affected_rows <= 0)
			return false;
		return true;
	}

	function select(){
		$query = "SELECT * from curriculum";
		return $this->con->query($query);		
	}

	function delete($id){
		$query = "DELETE from curriculum where curriculum_id = $id";
		$this->con->query($query);
		return $this->con->affected_rows<=0 ? false : true;
	}	

}
?>