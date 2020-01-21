// A $( document ).ready() block.
$( document ).ready(function(){
	$('#submit_categorie').on('click',function(){
		var categorie = $('#new_categorie').val()
		$.ajax({
			type: 'POST',
			url: '../functions/categorieInsert.php',
			data: {'categorie': categorie}
		})
		.done(function(result){
			alert(result)
			update_select_categorie()
		})
		.fail(function(result){
			alert(result)
		})
	})
})

function update_select_categorie(){
		$.ajax({
			type: 'POST',
			url: '../functions/categorieSelect.php',
		})
		.done(function(result){
			//$('#categorie').html(result)
			alert(result)
		})
		.fail(function(){
			alert('Hubo un error al actuzalizar las categorías')
		})	
}

function buscarArticle(){
	alert('Buscar')
}