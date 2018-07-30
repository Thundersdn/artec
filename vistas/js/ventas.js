
var table2 = $('.tablaVentas').DataTable({

	"ajax":"ajax/datatable-ventas.ajax.php",
	"columnDefs": [

		{
			"targets": -5,
			 "data": null,
			 "defaultContent": '<img class="img-thumbnail imgTablaVenta" width="40px">'

		},

		{
			"targets": -2,
			 "data": null,
			 "defaultContent": '<div class="btn-group"><button class="btn btn-success limiteStock"></button></div>'

		},

		{
			"targets": -1,
			 "data": null,
			 "defaultContent": '<div class="btn-group"><button class="btn btn-primary agregarProducto recuperarBoton" idProducto>Agregar</button></div>'

		}

	],

	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

})



$(".tablaVentas tbody").on( 'click', 'button.agregarProducto', function () {

	var data = table2.row( $(this).parents('tr') ).data();

	$(this).attr("idProducto",data[5]);

	// como saber el tamaño css del objeto
	//console.log($(this).css("width"));

})


function cargarImagenesProductos(){

	 var imgTabla = $(".imgTablaVenta");

	 var limiteStock = $(".limiteStock");

	 for(var i = 0; i < imgTabla.length; i ++){

	    var data = table2.row( $(imgTabla[i]).parents('tr') ).data();
	    
	    $(imgTabla[i]).attr("src",data[1]);

	    if(data[4] <= 10){

	    	$(limiteStock[i]).addClass("btn-danger");
	    	$(limiteStock[i]).html(data[4]);

	    }else if(data[4] > 11 && data[4] <= 15){

	    	$(limiteStock[i]).addClass("btn-warning");
	    	$(limiteStock[i]).html(data[4]);
	    
	    }else{

	    	$(limiteStock[i]).addClass("btn-success");
	    	$(limiteStock[i]).html(data[4]);
	    }

  	}


}

setTimeout(function(){

  cargarImagenesProductos()

},700);

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL PAGINADOR
=============================================*/

$(".dataTables_paginate").click(function(){

	cargarImagenesProductos()
})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL BUSCADOR
=============================================*/
$("input[aria-controls='DataTables_Table_0']").focus(function(){

	$(document).keyup(function(event){

		event.preventDefault();

		cargarImagenesProductos()

	})


})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE CANTIDAD
=============================================*/

$("select[name='DataTables_Table_0_length']").change(function(){

	cargarImagenesProductos()

})

/*=============================================
CARGAMOS LAS IMÁGENES CUANDO INTERACTUAMOS CON EL FILTRO DE ORDENAR
=============================================*/

$(".sorting").click(function(){

	cargarImagenesProductos()

})

$(".sorting_asc").click(function(){

	cargarImagenesProductos()
})

$(".sorting_desc").click(function(){

	cargarImagenesProductos()
})


// AGREGAR PRODUCTOS DESDE PC NORMAL (PANTALLA COMPLETA)

$(".tablaVentas tbody").on("click","button.agregarProducto",function(){
	var idProducto=$(this).attr("idProducto");
	$(this).removeClass("btn-primary agregarProducto");
	$(this).addClass("btn-default");
	console.log("idProducto ",idProducto);

	var datos=new FormData();
	datos.append("idProducto",idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			//console.log(respuesta);

			var descripcion=respuesta["descripcion"];
			var stock=respuesta["stock"];
			var precio=respuesta["precio_venta"];

			$(".nuevoProducto").append(
				'<div class="row" style="padding: 5px 15px">'+
				   	'<!-- Descripción del producto -->'+
	           		'<div class="col-xs-6" style="padding-right:0px">'+
		            	'<div class="input-group">'+
		                	'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+
		                	'<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" id="agregarProducto" name="agregarProducto" value="'+descripcion+'" readonly required>'+
		            	'</div>'+
	               	'</div>'+

	                '<!-- Cantidad del producto -->'+
	                '<div class="col-xs-3 ingresoCantidad">'+
	                   '<input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" nuevoStock="" required>'+
	                '</div>'+

	                '<!-- Precio del producto -->'+
	                '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
	                  '<div class="input-group">'+
	                    '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                    '<input type="number" min="1" class="form-control nuevoPrecioProducto" id="nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
	                  '</div>'+
	                '</div>'+ 
	            '</div>'
			);
			sumaTotalPrecios();
			agregarImpuesto();
			listarProductos();
		}

	})
	
})

$(".formularioVenta").on("click","button.quitarProducto",function(){

	var idProducto=$(this).attr("idProducto");

	// parent() toma el tipo de etiqueta superior del objeto actual(etiqueta)
	$(this).parent().parent().parent().parent().remove();

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');
	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');
    
    console.log($(".nuevoProducto").children().length);

	if($(".nuevoProducto").children().length == 0){
		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#nuevoTotalVenta").attr("total",0);
		$("#totalVenta").val(0);
	}else{	
			sumaTotalPrecios();
			agregarImpuesto();
			listarProductos();
	}
})

// BOTON AGREGAR PRODUCTOS DESDE CELULAR O TABLET
$(".btnAgregarProducto").click(function(){
	var datos=new FormData();
	datos.append("traerProductos", "ok");

     
	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){

			console.log(respuesta);

			$(".nuevoProducto").append(
				'<div class="row" style="padding: 5px 15px">'+
				   	'<!-- Descripción del producto -->'+
	           		'<div class="col-xs-6" style="padding-right:0px">'+
		            	'<div class="input-group">'+
		                	'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button></span>'+
		                	'<select class="form-control nuevaDescripcionProducto" idProducto="" name="nuevaDescripcionProducto" required>'+
		                	'<option>Seleccione un producto</option>'+
		                	'</select>'+
		            	'</div>'+
	               	'</div>'+

	                '<!-- Cantidad del producto -->'+
	                '<div class="col-xs-3 ingresoCantidad">'+
	                   '<input type="number" class="form-control nuevaCantidadProducto" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock="" required>'+
	                '</div>'+

	                '<!-- Precio del producto -->'+
	                '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
	                  '<div class="input-group">'+
	                    '<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
	                    '<input type="number" min="1" class="form-control nuevoPrecioProducto" precioReal id="nuevoPrecioProducto" name="nuevoPrecioProducto" value readonly required>'+
	                  '</div>'+
	                '</div>'+ 
	            '</div>'
			);

			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index){
				$(".nuevaDescripcionProducto").append(
					'<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
				)
			}

			// SUMAR TOTAL DE PRECIOS
    		sumaTotalPrecios()

    		// AGREGAR IMPUESTO
	        agregarImpuesto()

	        // PONER FORMATO AL PRECIO DE LOS PRODUCTOS
			//$(".nuevoPrecioProducto").number(true, 2);

		}
	})


})


// INSERTAR PRODUCTO SELECCIONADO A LA TABLA-LISTA DE COMPRA

$(".formularioVenta").on("change","select.nuevaDescripcionProducto",function(){
	// decripcion de producto
	var nombreProducto=$(this).val();

	// obtengo la opcion seleccionada
	var opcion=$(this).find('option:selected'); 
    var idProducto= opcion.attr("idProducto"); 
//console.log($(this).attr("idProducto"));
    //obtengo la etiquetas donde pondre datos
	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	var datos=new FormData();
	datos.append("nombreProducto",nombreProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			//$(this).attr("idProducto",idProducto);
			$(nuevoPrecioProducto).val(respuesta["precio_venta"]);
			$(nuevoPrecioProducto).attr("precioReal",respuesta["precio_venta"]);
			$(nuevaCantidadProducto).attr("stock",respuesta["stock"]);
			// DESCONTAR DEL STOCK GENERAL (DEBERIA IR DENTRO DE IF?)
			$(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);
			listarProductos()
		}
	})
})


// MODIFICAR PRECIO BASADO EN LA CANTIDAD

$(".formularioVenta").on("change","input.nuevaCantidadProducto", function(){

	// en precio guardo la ruta del la etiqueta
	var precio=$(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	// consulto por el atributo de la etiqueta
	var precioFinal=$(this).val()*Number(precio.attr("precioreal"));
	console.log(precioFinal);
	
	// consulto por el stock primero
	if(Number($(this).val()) > Number($(this).attr("stock"))){
		$(this).val(1);
		precio.val(precio.attr("precioreal"));
		swal({
	      title: "La cantidad supera el Stock",
	      text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
	      type: "error",
	      confirmButtonText: "¡Cerrar!"
	    });
	}else{

	// pongo en caja precio sumatoria individual del producto
	precio.val(precioFinal);
	// le asigno nuevo stock basado en esta venta 
	var nuevoStock = Number($(this).attr("stock")) - $(this).val();
	$(this).attr("nuevoStock", nuevoStock);

	}

	// calculo la suma total de la boleta, asigno valor a etiqueta #nuevoTotalVenta
	sumaTotalPrecios();

	// le sumo el impuesto a #nuevoTotalVenta
	agregarImpuesto();
})

function sumaTotalPrecios(){
	var precioItems=$(".nuevoPrecioProducto");
	var arraySumaPrecios=[];
	for (var i = 0; i < precioItems.length; i++) {
		arraySumaPrecios.push(Number($(precioItems[i]).val()));
	}

	function sumaArrayPrecios(total, numero){
		return total+numero;
	}

	var sumaTotalPrecio=arraySumaPrecios.reduce(sumaArrayPrecios);
	console.log("suma: ", sumaTotalPrecio);
	console.log(arraySumaPrecios)
	$("#nuevoTotalVenta").val(sumaTotalPrecio);
	$("#nuevoTotalVenta").attr("total",sumaTotalPrecio);
	$("#nuevoTotalVenta").val(sumaTotalPrecio);


}

function agregarImpuesto(){
	var impuesto=$("#nuevoImpuestoVenta").val();
	var precioTotal=$("#nuevoTotalVenta").attr("total");

	var precioImpuesto=Number(precioTotal*impuesto/100);
	var totalConImpuesto=Number(precioImpuesto)+Number(precioTotal);


	$("#nuevoTotalVenta").val(totalConImpuesto);
	// hidden en vista
	$("#nuevoPrecioImpuesto").val(precioImpuesto);
	// hidden en vista
	$("#nuevoPrecioNeto").val(precioTotal);
	// valor a hidden sin formato
	$("#totalVenta").val(totalConImpuesto);

}


// AL CAMBIAR VALOR IMPUESTO

$("#nuevoImpuestoVenta").change(function(){
	agregarImpuesto();
});

// GENERAR ETIQUETAS DE METODO DE PAGO SEGUN LA SELECCION (EFECTIVO/TARJETA)
$("#nuevoMetodoPago").change(function(){

	console.log($(this));
	var metodo=$(this).val();
	
	//borro lo que este como metodo
	$("#listaMetodoPago").val("");


	if(metodo=="Efectivo"){
		$(this).parent().parent().removeClass('col-xs-6');
		$(this).parent().parent().addClass('col-xs-4');
		$(this).parent().parent().parent().children(".cajasMetodoPago").html(
			 
			 '<div class="col-xs-4">'+ 
			 	'<div class="input-group">'+ 
			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+ 
			 		'<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="Recivo" required>'+
			 	'</div>'+
			 '</div>'+
			 '<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+
			 	'<div class="input-group">'+
			 		'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
			 		'<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="Vuelto" readonly required>'+
			 	'</div>'+
			 '</div>'
			);

		listarMetodos();
	}else{

		if(metodo=="TD"||metodo=="TC"){
		$(this).parent().parent().removeClass('col-xs-4');
		$(this).parent().parent().addClass('col-xs-6');
		$(this).parent().parent().parent().children('.cajasMetodoPago').html(
		 	
		 	'<div class="col-xs-6" style="padding-left:0px">'+
                '<div class="input-group">'+        
                  '<input type="number" min="0" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción"  required>'+
                  '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
                '</div>'+
              '</div>'
        
        );
		}else{
			$(this).parent().parent().removeClass('col-xs-4');
			$(this).parent().parent().addClass('col-xs-6');
			$(this).parent().parent().parent().children('.cajasMetodoPago').children().remove();
			listarMetodos();
		}
	}

})

/*=============================================
CALCULAR EL VUELTO
=============================================*/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

	var efectivo= $(this).val();
	var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());
	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');
	nuevoCambioEfectivo.val(cambio);

})

/*=============================================
COMPROBAR QUE ESTE INGRESADO UN CODIGO DE TRANSACCION
=============================================*/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){

	// solo si hay un codigo creo la variable para base de datos
     listarMetodos();


})


function listarProductos(){

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");



	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
							  "descripcion" : $(descripcion[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "stock" : $(cantidad[i]).attr("stock"),
							  "precio" : $(precio[i]).attr("precioReal"),
							  "total" : $(precio[i]).val()})

	}

	$("#listaProductos").val(JSON.stringify(listaProductos)); 

	console.log("listaProductos",listaProductos);

}



/*=============================================
CREACION ATRIBUTO METODO DE PAGO PARA DB
=============================================*/

function listarMetodos(){

	var listaMetodos = "";
	if($("#nuevoMetodoPago").val() == "Efectivo"){
		$("#listaMetodoPago").val("Efectivo");
	}else{
		if($("#nuevoMetodoPago").val() == "TC"||$("#nuevoMetodoPago").val() == "TD"){
			$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());
		}else{
			
		}
	}

}

// BOTON EDITAR VENTA

$(".btnEditarVenta").click(function(){
	var idVenta= $(this).attr("idVenta");
	console.log(idVenta);
	window.location="index.php?ruta=editar-venta&idVenta="+idVenta;

})

// BOTON ELIMINAR VENTA

$(".btnEliminarVenta").click(function(){

  var idVenta = $(this).attr("idVenta");

  swal({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then((result) => {
        if (result.value) {
          
            window.location = "index.php?ruta=ventas&idVenta="+idVenta;
        }

  })

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablas").on("click", ".btnImprimirFactura", function(){

	var codigoVenta = $(this).attr("codigoVenta");

	window.open("extensiones/tcpdf/pdf/factura2.php?codigo="+codigoVenta, "_blank");

})