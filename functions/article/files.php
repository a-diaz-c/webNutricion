<?php 

function validar($file){
	if(($file['user-file']['type'] !== 'image/jpeg') && ($file['user-file']['type'] !== 'image/png')){
		return false;
	}

	if($file['user-file']['size'] > 10000000){
		return false;
	}
	return true;
}

function upload(){
	$file = $_SERVER['DOCUMENT_ROOT']."/img/".basename($_FILES['user-file']['name']);
	if(! move_uploaded_file($_FILES['user-file']['tmp_name'],$file)){
		return false;
	}
	return $file;
}

 ?>