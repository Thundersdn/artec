<?php 


class ControladorCategorias
{
	
	static public function ctrCrearCategoria(){
		if(isset($_POST["nuevaCategoria"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["nuevaCategoria"])){
				$tabla="categorias";
				$datos= $_POST["nuevaCategoria"];
				$respuesta= ModeloCategorias::mdlIngresarCategoria($tabla,$datos);

				if($respuesta=="ok"){
					echo '<script>

						swal({
							type:"success",
							title: "La nueva categoria fue creada",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location="categorias";
							}
						});
						</script>';	
				}else{
						echo '<script>
						swal({
							type:"error",
							title: "No se pudo crear la categoria",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location="categorias";
							}
						});
						</script>';	
				}

			}else{

				echo '<script>
				swal({
					type:"error",
					title: "Hay errores en los datos que ingresaste",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm:false
				}).then((result)=>{
					if(result.value){
						window.location="categorias";
					}
				});
				</script>';
			}
		}
	}


	static public function ctrMostrarCategorias($item, $valor){
		$tabla = "categorias";
		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
		return $respuesta;
	}

	static public function ctrEditarCategoria(){
		if(isset($_POST["editarCategoria"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóú ]+$/', $_POST["editarCategoria"])){
				$tabla="categorias";
				$datos= array("categoria"=>$_POST["editarCategoria"],
						      "id"=>$_POST["idCategoria"]);

				$respuesta= ModeloCategorias::mdlEditarCategoria($tabla,$datos);
				if($respuesta=="ok"){
					echo '<script>

						swal({
							type:"success",
							title: "La categoria fue modificada",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location="categorias";
							}
						});
						</script>';	
				}else{
						echo '<script>
						swal({
							type:"error",
							title: "No se pudo modificar la categoria",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location="categorias";
							}
						});
						</script>';	
				}

			}else{

				echo '<script>
				swal({
					type:"error",
					title: "Surgio un error al modificar la categoria",
					showConfirmButton:true,
					confirmButtonText: "Cerrar",
					closeOnConfirm:false
				}).then((result)=>{
					if(result.value){
						window.location="categorias";
					}
				});
				</script>';
			}
		}
	}

	static public function ctrBorrarCategoria(){
		if(isset($_GET["idCategoria"])){
			$tabla="categorias";
			$datos=$_GET["idCategoria"];
			$respuesta= ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

			if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "La categoria ha sido borrada",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {
									window.location = "categorias";
									}
								})
					</script>';
			}else{
				echo '<script>
						swal({
							type:"error",
							title: "No se pudo crear el usuario",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location="usuarios";
							}
						});
						</script>';	
			}
		}
	}
	
}


?>