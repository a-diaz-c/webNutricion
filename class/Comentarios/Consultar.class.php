<?php 

class Consultar
{
	private $con;

	function __construct(Conexion $con)
	{
		$this->con = $con;
	}

	function article_new(){
		if(empty($this->article_id)){
			$query = "SELECT * from articulo";
			return $this->con->query($query);
		}
		$query = "SELECT * from articulo where articulo_id = $this->article_id";
		return $this->con->query($query);
	}
}

 ?>