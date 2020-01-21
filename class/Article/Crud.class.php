<?php 

/**
 * 
 */
class Crud
{
	protected $insert;
	protected $select;
	protected $update;
	protected $delete;

	function __construct(InsertCommand $insertC, SelectCommand $selectC, UpdateCommand $updateC, DeleteCommand $deleteC)
	{
		$this->insert = $insertC;
		$this->select = $selectC;
		$this->update = $updateC;
		$this->delete = $deleteC;
	}

	function insert(){
		return $this->insert->exec();
	}

	function select(){
		return $this->select->exec();
	}

	function update(){
		return $this->update->exec();
	}
	
	function delete(){
		return $this->delete->exec();
	}

}

 ?>