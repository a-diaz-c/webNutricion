<?php 


class Session
{
	
	function __construct()
	{
		session_start();
	}

	function addValue($key,$value){
		$_SESSION[$key] = $value;
	}

	function getValue($key){
		if($this->issetValue($key))
			return $_SESSION[$key];
		return false;
	}

	function removeValue($key){
		if ($this->issetValue($key))
			unset($_SESSION[$key]);
	}

	function issetValue($value){
		return isset($_SESSION[$value]);
	}

	function validateSession($key){
		if(!$this->issetValue('usuario-nutrifit')){
			$this->destroySession();
			return false;
		}
		return true;
	}

	function destroySession(){
		session_unset();
		session_destroy();
	}
}

 ?>