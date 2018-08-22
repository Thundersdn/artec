<?php  

class ControladorEntregas{

	static public function ctrMostrarEntregas($item,$valor){
		
		$tabla="entregas";
		$respuesta=ModeloEntregas::mdlMostrarEntregas($tabla,$item,$valor);
		return $respuesta;
	}

	/*=============================================
	CREAR ENTREGA
	=============================================*/

	static public function ctrCrearEntrega(){

		if(isset($_POST["nuevaEntrega"])){

			/*=============================================
			REALIZAR LA REDUCCION DEL STOCK EN VENTA, AQUI SOLO REALIZAR LA ENTREGA
			=============================================*/

			/*=============================================
			GUARDAR LA ENTREGA Se debe seleccionar la venta
			=============================================*/	

			$tabla = "entregas";

			$datos = array("venta"=>$_POST["seleccionarVenta"],
						   "ruta"=>$_POST["seleccionarRuta"],
						   "direccion"=>$_POST["direccion"],
						   "latitud"=>$_POST["latitud"],
						   "longitud"=>$_POST["longitud"],
						   "fecha_creacion"=>$_POST["fecha"],
						   "fecha_recepcion"=>NULL,
						   "estado"=>"EN ESPERA");

			$respuesta = ModeloEntregas::mdlIngresarEntrega($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				localStorage.removeItem("rango");

				swal({
					  type: "success",
					  title: "La entrega ha sido guardada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then((result) => {
								if (result.value) {

								window.location = "entregas";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	EDITAR ENTREGA
	=============================================*/

	static public function ctrEditarEntrega(){

		if(isset($_POST["editarEntrega"])){

			/*=============================================
			LAS TABLAS VUELVEN AL ESTADO ANTERIOR A LA ENTREGA
			=============================================*/
			$tabla = "entregas";

			$item = "id";
			$valor = $_POST["editarEntrega"];

			$traerEntrega = ModeloEntregas::mdlMostrarEntregas($tabla, $item, $valor);

		}

	}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function ctrEliminarEntrega(){

		if(isset($_GET["idEntrega"])){

			$tabla = "entregas";

			$item = "id";
			$valor = $_GET["idEntrega"];

			$traerEntrega = ModeloEntregas::mdlMostrarEntregas($tabla, $item, $valor);

			/*=============================================
			ELIMINAR ENTREGA
			=============================================*/

			$respuesta = ModeloEntregas::mdlEliminarEntregas($tabla, $_GET["idEntrega"]);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La entrega ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then((result) => {
								if (result.value) {

								window.location = "ventas";

								}
							})

				</script>';

			}		
		}

	}

}


?>
