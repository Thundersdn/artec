<?php  
include_once "conexion.php";


class ModeloCategorias{

	// CREAR CATEGORIA
	static public function mdlIngresarCategoria($tabla,$datos){
		// INSERT $NOMBRE_TABLA(ATRIBUTO DONDE SE INSERTA)
		$stmt=conexion::conectar()->prepare("INSERT INTO $tabla(categoria) VALUE(:categoria)");
		$stmt->bindParam(":categoria", $datos, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();
		$stmt=null;
	}

	// CREAR CATEGORIA
	static public function mdlMostrarCategorias($tabla,$item,$valor){
		
		if($item!=null){
			$stmt=conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item=:$item");
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt=conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		

		$stmt->close();
		$stmt=null;
	}

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET categoria=:categoria WHERE id=:id");

		$stmt-> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt-> bindParam(":id", $datos["id"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
		
	}

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
		$stmt-> bindParam(":id", $datos, PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}


}
?>