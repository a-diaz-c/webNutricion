<?php 

/**
 * 
 */
class UpdateCommand implements iCommand
{
	protected $article;
	function __construct(Article $article)
	{
		$this->article = $article;
	}

	function exec(){
		echo "*".__CLASS__.'-> exec</br>';
		return $this->article->update();
	}
}

 ?>