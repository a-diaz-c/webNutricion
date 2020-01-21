function buscarArticle(){
	var buscar = $('#text_buscar').val()
	if(buscar=='')
		alert('Ingrese una palabra')
	else
	location.href = "blog_buscar.php?buscar=" + buscar
}