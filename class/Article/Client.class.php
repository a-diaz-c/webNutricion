<?php 

/**
 * 
 */
class Client
{
	protected $article;
	protected $crud;
	protected $insert;
	protected $select;
	protected $update;
	protected $delete;

	function __construct(Article $article)
	{
		$this->article = $article;
		$this->insert = new InsertCommand($this->article);
		$this->update = new UpdateCommand($this->article);
		$this->select = new SelectCommand($this->article);
		$this->delete = new DeleteCommand($this->article);
		$this->crud = new Crud($this->insert, $this->select, $this->update, $this->delete);
	}

	function operate($action){
		switch ($action) {
			case 'insert':
			 return $this->crud->insert();
				break;
			case 'delete':
			return $this->crud->delete();
				break;
			case 'update':
			return $this->crud->update();
				break;
			case 'select':
			return $this->crud->select();
				break;
			default:
				throw new Exception('División por cero.');
				break;
		}
	}
}

 ?>