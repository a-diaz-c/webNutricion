<?php 

require'config.php';


class Conexion extends Mysqli
{
	private $host;
	private $user;
	private $pass;
	private $db;
	
	function __construct()
	{
		$this->host = CONF_DB_HOTS;
		$this->user = CONF_DB_USER;
		$this->pass = CONF_DB_PASS;
		$this->db = CONF_DB_DATABASE;

		parent::__construct($this->host,$this->user,$this->pass,$this->db);
	}

	public function setCharset(){
		$this->set_charset(CONF_DB_CHARSET);
	}
}

 ?>