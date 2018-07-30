 // SUBIR  Y VALIDADR FORMATO Y TAMAÑO DE FOTO
 $(".nuevaFoto").change(function(){
 	var imagen = this.files[0];

 	if(imagen["type"] != "image/jpeg" && imagen["type"]!="image/png"){
 		$(".nuevaFoto").val("");
 		swal({
 			title: "Error al subir la imagen",
 			text: "La imagen debe ser JPG o PNG!",
 			type: "error",
 			confirmButtonText: "Cerrar" 
 		});
 	}else{
 		if(imagen["size"]>2000000){
 			$(".nuevaFoto").val("");
 			swal({
 			title: "Error al subir la imagen",
 			text: "La imagen no puede pesar mas de 2 MB!",
 			type: "error",
 			confirmButtonText: "Cerrar"
 			});
 		}else{
 			var datosImagen= new FileReader;
 			datosImagen.readAsDataURL(imagen);
 			$(datosImagen).on("load", function(event){
 				var rutaImagen = event.target.result;
 				$(".previsualizar").attr("src", rutaImagen)

 			})
 		}
 	}
 	console.log("imagen", imagen);
 })  

 // BOTON EDITAR USUARIO CARGA DATOS DEL USUARIO DESDE DB
$(".btnEditarUsuario").click(function(){
	var idUsuario= $(this).attr("idUsuario");
	//console.log("Valor id holi: ",idUsuario);
	//llamada ajax
	var datos= new FormData();
	datos.append("idUsuario", idUsuario);
	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarUsuario").val(respuesta["usuario"]);
			// como perfil es un tipo option se cambia el parametro con .html
			$("#editarPerfil").html(respuesta["perfil"]);
			$("#editarPerfil").val(respuesta["perfil"]);
			$("#fotoActual").val(respuesta["foto"]);
			$("#passwordActual").val(respuesta["password"]);


			if (respuesta["foto"]!="") {
				$(".previsualizar").attr("src", respuesta["foto"]);

			}else{
				$(".previsualizar").attr("src", "vistas/img/usuarios/default/anonymous.png");
			}
			//console.log("respuesta", respuesta);
		},
  		error: function(result) {
            console.log("error ajax");
        }
	})
})

//ACTIVAR USUARIO

$(".btnActivar").click(function(){
	var idUsuario=$(this).attr("idUsuario");
	var usuarioEstado=$(this).attr("estadoUsuario");
	console.log(idUsuario);
	console.log(usuarioEstado);
	// MODIFICO EN DB
	var datos=new FormData();
	datos.append("activarId",idUsuario);
	datos.append("activarUsuario",usuarioEstado);

	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){
			
		}
	})
	// MODIFICO INTERFAZ
	if(usuarioEstado==0){
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario',1)
	}else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoUsuario',0)
	}

})

// EVITAR USUARIO REPETIDO
$("#nuevoUsuario").change(function(){
	// siguiente linea remueve alertas anteriores
	$(".alert").remove();
	var usuario=$(this).val();
	var datos=new FormData;
	datos.append("validarUsuario",usuario);
	$.ajax({
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){
				$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este nombre ya esta utilizado, elige otro!</div>');
				$("#nuevoUsuario").val("");
			}
		}
	})
})

// ELIMINAR USUARIO

$(".btnEliminarUsuario").click(function(){

	var idUsuario=$(this).attr("idUsuario");
	var fotoUsuario=$(this).attr("fotoUsuario");
	var usuario=$(this).attr("usuario");

	console.log("id ="+idUsuario);
	console.log("ruta ="+fotoUsuario);
	console.log("usuario ="+usuario);
	
	swal({
		title: "Estas seguro de borrar este usuario?",
		text: "Si no lo esta, puedes cancelar esta accion",
		type: "warning",
		showCancelButton:true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: "Cancelar",
		confirmButtonText: "Si, borrar"
		}).then((result)=>{
			if(result.value){
				window.location="index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
			}
		})
})