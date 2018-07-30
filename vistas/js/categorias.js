
$(".btnEditarCategoria").click(function(){



	var idCategoria = $(this).attr("idCategoria");
	var datos = new FormData();

	datos.append("idCategoria", idCategoria);
	
//console.log(idCategoria);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

//console.log(respuesta);
     		 $("#editarCategoria").val(respuesta["categoria"]);
     		 $("#idCategoria").val(respuesta["id"]);

     	}

	})
})

$(".btnEliminarCategoria").click(function(){
  var idCategoria=$(this).attr("idCategoria");
  swal({
    title: "Estas seguro de querer borrar esta categoria?",
    text: "Si no lo esta, puedes cancelar esta accion",
    type: "warning",
    showCancelButton:true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar"
    }).then((result)=>{
      if(result.value){
        window.location="index.php?ruta=categorias&idCategoria="+idCategoria;
      }
    })
})