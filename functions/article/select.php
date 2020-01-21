<?php 
require 'require.php';

function getArticles(){
	$article = new Article(new Conexion);
	$cliente = new Client($article);
	$res = $cliente->operate('select');
	$tabla = '';
	$cont = 0;
	$titulo = '';
	while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
		echo '<tr>';
	    echo "<td id='articulo_id".$cont."'>$row[articulo_id]</td>";
	    echo "<td>$row[autor]</td>";
	    echo "<td>$row[fecha]</td>";
	    $titulo = utf8_encode($row['titulo']);
	    echo "<td>$titulo</td>";
	    //echo "<td><button type='button' class='btn btn-primary' onclick='location.href=\"edit.php?id=$row[articulo_id]\";'>Modificar</button></td>";
	    echo "<td><a href='edit.php?id=$row[articulo_id]'>Editar</a></td>";
	    echo "<td><a class='delete' href=''>Eliminar</a ></td>";
	    echo  '</tr>';
	    //../functions/article/delete.php?id=$row[articulo_id]
	    $cont++;
	}
}

echo getArticles();

 ?>