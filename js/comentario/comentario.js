$( document ).ready(function(){
	actuzalizarComentarios()
	$('#submit_coment').on('click',function(){
		var nombre = $('#nombre_coment').val()
		var contenido = $('#contenido_coment').val()
		var id = $('#article_id').val()
		$.ajax({
			type: 'POST',
			url: '../functions/home/insert_comentario.php',
			data: {
				'nombre': nombre, 
				'contenido': contenido,
				'id': id
			}
		})
		.done(function(result){
			actuzalizarComentarios()
		})
		.fail(function(result){
			alert(result)
		})
	})
})

function actuzalizarComentarios(){
		var id = $('#article_id').val()
		$.ajax({
			type: 'GET',
			url: '../functions/home/select_comentarios.php',
			data: {'id': id}
		})
		.done(function(result){
			$('#comentarios').html(result)
			$('#nombre_coment').val('')
			$('#contenido_coment').val('')			

		})
		.fail(function(){
			alert('Hubo un error al cargar comentarios')
		})	
} 

function buscarArticle(){
	var buscar = $('#text_buscar').val()
	if(buscar=='')
		alert('Ingrese una palabra')
	location.href = "blog_buscar.php?buscar=" + buscar
}

function respoderComentario(){
	    var text = '<div class="card my-4"> <h5 class="card-header">Respoder Comentario: </h5> <div class="card-body">'
        var text2 = '<form action="#"> <input type="hidden" name="id" id="article_id_res" value="1">'
        var text3 = '<div class="form-group col-lg-6 col-sm-12"> <input type="text" name="nombre" placeholder="Nombre" class="form-control" id="nombre_coment_res">'
        var text4 = '</div> <div class="form-group col-12"> <textarea class="form-control" rows="3" id="contenido_coment_res"></textarea> </div>'
        var text5 = '<div class="col-lg-6"> <button type="button" class="btn btn-dark" onclick="JavaScript:enviarRespuesta()">Enviar</button>'
        var text6 = '</div> </form> </div> </div>'
        var todo = text+text2+text3+text4+text5+text6
	$("#abrir_resp").html(todo)
}

function enviarRespuesta(){
		var nombre = $('#nombre_coment_res').val()
		var contenido = $('#contenido_coment_res').val()
		var id = $('#article_id_res').val()
		$.ajax({
			type: 'POST',
			url: '../functions/home/insert_comentario.php',
			data: {
				'nombre': nombre, 
				'contenido': contenido,
				'id': id
			}
		})
		.done(function(result){
			actuzalizarComentarios()
		})
		.fail(function(result){
			alert(result)
		})
}