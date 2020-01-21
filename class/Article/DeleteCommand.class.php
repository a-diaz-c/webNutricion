<?php 

/**
 * 
 */
class DeleteCommand implements iCommand
{
	protected $article;
	function __construct(Article $article)
	{
		$this->article = $article;
	}

	function exec(){
		return $this->article->delete();
	}
}

 ?>