<?php 

class Categorie
{
	private $con;
	private $categoria;
	private $descripcion;

	function __construct(Conexion $con){
		$this->con = $con;
	}

	function setCategoria($categoria){
		$this->categoria = $this->con->real_escape_string($categoria);
	}

	function setDescripcion($descripcion){
		$this->descripcion = $this->con->real_escape_string($descripcion);
	}

	function insert(){
		$query = "INSERT into categoria(categoria,descripcion) values ('$this->categoria','$this->descripcion')";
		$this->con->query($query);
		if($this->con->affected_rows <= 0)
			return false;
		return true;
	}

	function select(){
		$query = "SELECT * from categoria";
		return $this->con->query($query);		
	}

	function delete($id){
		$query = "DELETE from categoria where id_categoria = $id";
		$this->con->query($query);
		return $this->con->affected_rows<=0 ? false : true;
	}	

}
?>