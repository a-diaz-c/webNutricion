<?php 

class Article
{	
	private $con;
	public $title;
	public $categoire_id;
	public $content;
	public $autor;
	public $img;
	public $article_id;
	public $file;

	function __construct(Conexion $con)
	{
		$this->con = $con;
	}

	function setAutor($autor){
		$this->autor = $this->con->real_escape_string($autor);
	}

	function setTitle($title){
		$this->title = $this->con->real_escape_string($title);
	}

	function setCategorieId($categoire_id){
		$this->categoire_id = $this->con->real_escape_string($categoire_id);
	}

	function setContent($content){
		$this->content = $this->con->real_escape_string($content);
	}

	function setImg($img){
		$this->img = $this->con->real_escape_string($img);
	}

	function setArticleId($article_id){
		$this->article_id = $this->con->real_escape_string($article_id);
	}

	function setFile($file){
		$this->article_id = $this->con->real_escape_string($file);
	}		

	function select(){
		if(empty($this->article_id)){
			$query = "SELECT * from articulo order by fecha desc";
			return $this->con->query($query);
		}
		$query = "SELECT * from articulo where articulo_id = $this->article_id";
		return $this->con->query($query);

	}

	function insert(){
		$query = "INSERT into articulo(categoria_id_arti,autor,titulo,contenido,fecha,img) values($this->categoire_id,'$this->autor','$this->title','$this->content','".date('Y-m-d').' '.date('H:i:s')."','$this->img')";
		$this->con->query($query);
		if($this->con->affected_rows <= 0)
			return false;
		return true;
	}	

	function update(){
		if(empty($this->img)){
			$query = "UPDATE articulo SET categoria_id_arti = $this->categoire_id, titulo = '$this->title',contenido='$this->content', fecha='". date('Y-m-d').' '.date('H:i:s'). "' WHERE articulo_id= $this->article_id";
		}else{
		$query = "UPDATE articulo SET categoria_id_arti = $this->categoire_id, titulo = '$this->title',contenido='$this->content', img = '$this->img', fecha='". date('Y-m-d').' '.date('H:i:s'). "'  WHERE articulo_id= $this->article_id";
		}
		$this->con->query($query);
		if($this->con->affected_rows<=0){
			return false;
		}
		return true;	
}

	function delete(){
		$query = "DELETE from articulo where articulo_id = $this->article_id";
		$this->con->query($query);
		return $this->con->affected_rows<=0 ? false : true;
	}

}

 ?>