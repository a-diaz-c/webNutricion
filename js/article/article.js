$(document).ready(function(){
	var path = $(location).attr('pathname')
	var patfile = path.split('/')
	if(patfile[patfile.length-1]=== 'index.php'){
		imprimirTabla()
	}
})

function imprimirTabla(){
	$.ajax({
		url: '../functions/article/select.php'
	})
	.done(function(result){
		$('#articles').html(result)
		listen_delete()
	})
	.fail(function(){
		alert('Hubo un error al cargar los articulos')
	})
}

function mostrar_valores_inputs(search){
	var search_array = search.split('=')
	var id_article = search_array[1]

	$.ajax({
		type: 'POST',
		url: '../functions/article/select_by_id.php',
		data: {'id': id_article}
	})
	.done(function(result){
		var obj = $.parseJSON(result)
		alert(obj.contenido) 
		$('#title').val(obj.titulo)
		$('#area').val(obj.contenido)
		//$('#id_article').val(obj.articulo_id)
	})
	.fail(function(){
		alert('Hubo un error al cargar los articulos')
	})
}

//Metodo para optener el id de la fila en la tabla
function listen_delete(){
	$('.delete').on('click',function(){
		var r = confirm('¿Desea eliminar?')
		if(r==true){
			$("table tbody tr").click(function() {
				var total = $(this).find("td:first-child").text();
				delete_article(total);
			});
		}
	})
}

function delete_article(id_article){
	$.ajax({
		type: 'POST',
		url: '../functions/article/delete.php',
		data: {'id': id_article}
	})
	.done(function(result){
		alert('Eliminado')
	})
	.fail(function(result){
	})
}