<?php  
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TableProductos{

	static public function mostrarTabla(){
		$item=null;
		$valor=null;
		$productos=ControladorProductos::ctrMostrarProductos($item,$valor);

		echo'
		{
		  "data": [';

		for ($i=0; $i<count($productos)-1; $i++) { 

			$item="id";
			$valor=$productos[$i]["id_categoria"];

			$categorias=ControladorCategorias::ctrMostrarCategorias($item,$valor);


			echo '[
			      "'.($i+1).'",
			      "'.$productos[$i]["imagen"].'",
			      "'.$productos[$i]["codigo"].'",
			      "'.$productos[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$productos[$i]["stock"].'",
			      "$ '.number_format($productos[$i]["precio_compra"]).'",
			      "$ '.number_format($productos[$i]["precio_venta"]).'",
			      "'.$productos[$i]["fecha"].'",
			      "'.$productos[$i]["id"].'"
			 ],';

		}
			$item="id";
			$valor=$productos[count($productos)-1]["id_categoria"];
			$categorias=ControladorCategorias::ctrMostrarCategorias($item,$valor);

		  echo'	
		     [
				      "'.(count($productos)).'",
				      "'.$productos[(count($productos)-1)]["imagen"].'",
				      "'.$productos[(count($productos)-1)]["codigo"].'",
				      "'.$productos[(count($productos)-1)]["descripcion"].'",
				      "'.$categorias["categoria"].'",
				      "'.$productos[(count($productos)-1)]["stock"].'",
				      "$ '.number_format($productos[(count($productos)-1)]["precio_compra"]).'",
				      "$ '.number_format($productos[(count($productos)-1)]["precio_venta"]).'",
				      "'.$productos[(count($productos)-1)]["fecha"].'",
				      "'.$productos[(count($productos)-1)]["id"].'"
				  ]
		  ]
		}';


		// echo'
		// {
		//   "data": [
		//     [
		//       "Tiger Nixon",
		//       "vistas/img/productos/default/anonymous.png",
		//       "Edinburgh",
		//       "5421",
		//       "2011/04/25",
		//       "$320,800",
		//       "perso",
		//        "5421",
		//       "2011/04/25",
		//       "1"
		//     ],
		//     [
		//       "Garrett Winters",
		//       "vistas/img/productos/default/anonymous.png",
		//       "Tokyo",
		//       "8422",
		//       "2011/07/25",
		//       "$170,750",
		//       "perso",
		//        "5421",
		//       "2011/04/25",
		//       "2"
		//     ]
		//   ]
		// }';
	}
}
$activar=new TableProductos();
$activar->mostrarTabla();
?>