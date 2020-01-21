<?php 

function getImg($path_img){
	$img = explode('/', $path_img);
	return $img[count($img) - 1];
}
 ?>