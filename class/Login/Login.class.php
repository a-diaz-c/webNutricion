<?php 


class Login
{
	private $con;
	private $email;
	private $password;

	function __construct(Conexion $con){
		$this->con = $con;
	}

	function setEmail($email){
		$this->email = $this->con->real_escape_string($email);
	}

	function setPassword($password){
		$this->password = $password;
	}

	function singIn(){
		$row = $this->getArrayQueryResult();
		if($this->isAffectedRows()){
			if($this->passwordVerify($row['clave']))
				return $row;
		}
		return false;
	}	

	function getArrayQueryResult(){
		$query = "SELECT * FROM usuarios where usuario='$this->email';";
		$result = $this->con->query($query);
		return $result->fetch_array(MYSQLI_ASSOC);
	}

	function isAffectedRows() {
		return ($this->con->affected_rows>0);
	}

	function passwordVerify($password){
		return password_verify($this->password,$password);
	}

}

 ?>