<?php  

include_once "conexion.php";

class ModeloEntregas{

	static public function mdlMostrarEntregas($tabla, $item, $valor){
		if($item!=null){
			//ojo devuelve solo el ultimo
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt=conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		

		$stmt->close();
		$stmt=null;
	}


	
	/*=============================================
	REGISTRO DE ENTREGA
	=============================================*/

	static public function mdlIngresarEntrega($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(venta,ruta,direccion,latitud,longitud,fecha_creacion,fecha_recepcion,estado) VALUES (:venta, :ruta, :direccion, :latitud, :longitud, :fecha_creacion :fecha_recepcion, :estado)");

		$stmt->bindParam(":venta", $datos["venta"], PDO::PARAM_INT);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":latitud", $datos["latitud"], PDO::PARAM_STR);
		$stmt->bindParam(":longitud", $datos["longitud"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_recepcion", $datos["fecha_recepcion"], PDO::PARAM_NULL);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	EDITAR ENTREGA
	=============================================*/

	static public function mdlEditarEntrega($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  venta = :venta, ruta = :ruta, direccion = :direccion, latitud = :latitud, longitud= :longitud, fecha_creacion = :fecha_creacion, fecha_recepcion = :fecha_recepcion, estado = :estado WHERE id = :id");

		$stmt->bindParam(":venta", $datos["venta"], PDO::PARAM_INT);
		$stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_INT);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":latitud", $datos["latitud"], PDO::PARAM_STR);
		$stmt->bindParam(":longitud", $datos["longitud"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_creacion", $datos["fecha_creacion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_recepcion", $datos["fecha_recepcion"], PDO::PARAM_NULL);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR ENTREGA
	=============================================*/

	static public function mdlEliminarEntrega($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



}

?>