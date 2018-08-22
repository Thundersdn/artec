<?php
	class ControladorUsuarios{

		// LOGIN DE USUARIO
		static public function ctrIngresoUsuario(){


			// si ingreso usuario
			if(isset($_POST["ingUsuario"])){

				if(preg_match('/^[a-zA-Z0-9\._-]+$/', $_POST["ingUsuario"]) &&
				   preg_match('/^[a-zA-Z0-9_-]+$/', $_POST["ingPassword"])){
					

					$encriptar=crypt($_POST["ingPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					$tabla="usuarios";
					$item="usuario";
					$valor=$_POST["ingUsuario"];

					// la llamar asi a la funcion se almacena el resultado
					$respuesta= ModeloUsuarios::mdlMostrarUsuarios($tabla,$item,$valor);
					
					// muetsra el resultado
					//var_dump($respuesta);
					 if($respuesta["usuario"]==$_POST["ingUsuario"] && 
					 	$respuesta["password"]==$encriptar){

					 	// PREGUNTO POR EL ESTADO 
					 	if($respuesta["estado"]==1){
					 		//echo '<br><div class="alert  alert-success">Ingreso permitido</div>';
						 	$_SESSION["iniciarSesion"]="ok";
						 	$_SESSION["id"]=$respuesta["id"];
						 	$_SESSION["nombre"]=$respuesta["nombre"];
						 	$_SESSION["usuario"]=$respuesta["usuario"];
						 	$_SESSION["foto"]=$respuesta["foto"];
						 	$_SESSION["perfil"]=$respuesta["perfil"];
						 	
						 	//te agrega al final de la navegacion 
						 	// ej si estoy en www.algo.com y hago window.location="otra";
						 	// me lleva a www.algo.com/otra
						 	
						 	// GUARDAR ULTIMO LOGIN
						 	date_default_timezone_set('America/Santiago');	
						 	$fecha=date('Y-m-d');
						 	$hora=date('H:i:s');
						 	$fechaActual=$fecha.' '.$hora;

						 	$item1="ultimo_login";
						 	$valor1=$fechaActual;
						 	$item2="id";
						 	$valor2=$respuesta["id"];

						 	$ultimo_login=ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						 	if($ultimo_login=="ok"){
									echo 
									 	'<script>
									 	window.location="inicio";
									 	</script>';
						 	}


				
						}else{
							 	echo '<br><div class="alert alert-danger">El usuario no esta activado</div>';
						}

					 	

					 }else{
					 	echo '<br><div class="alert alert-danger">Error de ingreso</div>';
					 }

				}else{
					echo '<br><div class="alert alert-danger">Error de ingreso</div>';
				}

			}else{
				
			}
		}

		// CREAR NUEVO USUARIO
		static public function ctrCrearUsuario(){

			 foreach ($_POST as $key => $value) {
				echo '<script>console.log("'.$value.'")</script>';
			 }


				if(isset($_POST["nuevoUsuario"])){
				if(
				   preg_match('/^([a-zA-Z])+(\s([a-zA-ZñÑ]*))$/', $_POST["nuevoNombre"])&&
				   preg_match('/^[a-zA-Z0-9\._-]+$/', $_POST["nuevoUsuario"])&&
				   preg_match('/^[a-zA-Z0-9_-]+$/', $_POST["nuevoPassword"])){


				 echo '<script>console.log("paso")</script>';
					// VALIDAR FOTO
					$ruta="";

					if(isset($_FILES["nuevaFoto"]["tmp_name"])){
						// recortar imagen a 500x500
						list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
						$nuevoAncho=500;
						$nuevoAlto=500;
						// lugar donde se guardan los archivos del usuario
						$directorio="vistas/img/usuarios/".$_POST["nuevoUsuario"];
						mkdir($directorio, 0755);

						//var_dump(getimagesize($_FILES["nuevaFoto"]["tmp_name"]));

						// se aplican funciones segun tipo de imagen

						// VALIDA JPEG
						if($_FILES["nuevaFoto"]["type"]=="image/jpeg"){
							$aleatorio=mt_rand(100,999);
							$ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
							$origen=imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
							$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagejpeg($destino, $ruta);

						}
						// VALIDAR PNG
						if($_FILES["nuevaFoto"]["type"]=="image/png"){
							$aleatorio=mt_rand(100,999);
							$ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
							$origen=imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
							$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagepng($destino, $ruta);

						}

						echo '<script>console.log("foto validada")</script>';
					}

					$tabla="usuarios";
					$datos=array(
							"nombre"=>$_POST["nuevoNombre"],
							"usuario"=>$_POST["nuevoUsuario"],
							"password"=>$_POST["nuevoPassword"],
							"perfil"=>$_POST["nuevoPerfil"],
							"ruta"=>$ruta);

					$respuesta=ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);
					if($respuesta=="ok"){
						echo '<script>
						swal({
							type:"success",
							title: "El usuario fue creado",
							showConfirmButton:true,
							confirmButtonText: "Cerrar",
							closeOnConfirm:false
						}).then((result)=>{
							if(result.value){
								window.location="usuarios";
							}
						});
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
				else{

					echo '<script>
					swal({
						type:"error",
						title: "Hay errores en los datos que ingresaste",
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
			else{

			 }
		}

		//MOSTRAR USUARIO
		static public function ctrMostrarUsuarios($item, $valor){
			$tabla="usuarios";
			$respuesta=ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
			return $respuesta;

		}

		//EDITAR USUARIO
		static public function ctrEditarUsuario(){
			if(isset($_POST["editarUsuario"])){

				// valido nombre de usuario
				if(preg_match('/^([a-zA-Z])+(\s([a-zA-ZñÑ]*))$/', $_POST["editarNombre"])){

					$ruta=$_POST["fotoActual"];	
					$data="aqui";

					if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

						echo("<script>console.log('PHP: ".$_FILES["editarFoto"]["tmp_name"]."');</script>");

						// recortar imagen a 500x500
						list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);
						$nuevoAncho=500;
						$nuevoAlto=500;
				

						// CREAR CARPETA DE USUARIO
						$directorio="vistas/img/usuarios/".$_POST["editarUsuario"];
						echo("<script>console.log('_POST: ".$_POST["fotoActual"]."');</script>");

						if(!empty($_POST["fotoActual"])){
							//borro el archivo q esta
							 unlink($_POST["fotoActual"]);
						}else{
							echo("<script>console.log('crear directorio ".$directorio."');</script>");// si no viene la foto se crea directorio
							mkdir($directorio, 0755);
						}

						// se aplican funciones segun tipo de imagen 

						// VALIDA JPEG
						if($_FILES["editarFoto"]["type"]=="image/jpeg"){
							$aleatorio=mt_rand(100,999);
							$ruta="vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
							$origen=imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
							$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagejpeg($destino, $ruta);

						}
						// VALIDAR PNG
						if($_FILES["editarFoto"]["type"]=="image/png"){
							$aleatorio=mt_rand(100,999);
							$ruta="vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
							$origen=imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
							$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
							imagepng($destino, $ruta);

						}
					}

					$tabla="usuarios";

//echo("<script>console.log('EDITAR PASS: ".$_POST["editarPassword"]."');</script>");
//echo("<script>console.log('actual PASS: ".$_POST["passwordActual"]."');</script>");


					// si cambio la clave 
					if($_POST["editarPassword"]!=""){
					
						if(preg_match('/^[a-zA-Z0-9_-]+$/', $_POST["editarPassword"])){
							$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
							$passValido=true;
						// y es incorrecta
						}else{

							echo'<script>

							swal({
								  type: "error",
								  title: "¡No se puede guardar esa contraseña!",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								  }).then((result) => {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					  		</script>';
					  		$passValido=false;
						}

					// si mantengo la clave
					}
					else{
					$encriptar = $_POST["passwordActual"];
					$passValido=true;
					}


					// PASO DATOS AL MODELO
					if($passValido){

						$datos = array("nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta);

						$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

						if($respuesta == "ok"){

							echo'<script>
							swal({
								  type: "success",
								  title: "El usuario ha sido editado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								  }).then((result) => {
											if (result.value) {
											window.location = "usuarios";
											}
										})
							</script>';

						}else{
							echo'<script>
								swal({
								  type: "error",
								  title: "¡Ahy problemas para actualidar datos!",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								  }).then((result) => {
									if (result.value) {
									window.location = "usuarios";
									}
								})
					  			</script>';

						}

					}
					




				}else{
				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

				}

			} 
		}

		// BORRAR USUARIO
		static public function ctrBorrarUsuario(){
			if(isset($_GET["idUsuario"])){
				$tabla="usuarios";
				$datos=$_GET["idUsuario"];

				if($_GET["fotoUsuario"]!=""){
					unlink($_GET["fotoUsuario"]);
					rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
				}

				$respuesta=ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>
					swal({
						  type: "success",
						  title: "El usuario ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then((result) => {
									if (result.value) {
									window.location = "usuarios";
									}
								})
					</script>';

				}
			}
		}	

	}
?>