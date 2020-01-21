<?php 

class Comentarios
{
	private $con;
	private $articulo_id;
	private $nombre;
	private $contenido;

	function __construct(Conexion $con){
		$this->con = $con;
	}

	function setNombre($nombre){
		$this->nombre = $this->con->real_escape_string($nombre);
	}

	function setContenido($contenido){
		$this->contenido = $this->con->real_escape_string($contenido);
	}

	function setArticulo_id($articulo_id){
		$this->articulo_id = $articulo_id;
	}

	function insert(){
		$query = "INSERT into comentarios(nombre,fecha,contenido_coment,articulo_id_coment) values ('$this->nombre','".date("y-m-d H:i:s")."','$this->contenido',$this->articulo_id)";
		if($this->con->query($query))
			return 'Se inserta la comentario';
		return 'Hubo un error';			
	}

	function select(){
		 $query = "SELECT * from comentarios where articulo_id_coment = $this->articulo_id order by fecha desc";
		return $this->con->query($query);
	}

	function delete($id){
		$query = "DELETE from comentarios where comentario_id = $id";
		$this->con->query($query);
		return $this->con->affected_rows<=0 ? false : true;
	}	

}

 ?>