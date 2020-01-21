<?php 

/**
 * 
 */
class Registro 
{
	private $con;
	private $nombre;
	private $password;
	
	function __construct(Conexion $con)
	{
		$this->con = $con;
	}

	function setNombre($nombre){
		$this->nombre = $this->con->real_escape_string($nombre);
	}

	function setPassword($password){
		$this->password = $password;
	}

	function comprobar_usuario(){
		$query = "SELECT * FROM usuarios where usuario ='$this->nombre'";
		$res = $this->con->query($query);
		$rows = $res->num_rows;
		if($rows > 0)
			return true;
		return false;
	}

	function registrar(){
		$password = password_hash($this->password,PASSWORD_DEFAULT);
		$query = "INSERT into usuarios values('$this->nombre','$password')";
		$this->con->query($query);
		if($this->con->affected_rows <= 0)
			return false;
		return true;
	}
}

 ?>