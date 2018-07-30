
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Ventas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li><a href="#">Configuracion</a></li>
        <li class="active"> Ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <a href="crear-venta">
            <button class="btn btn-primary" data-toggle="modal"  data-target="#modalAgregarCategoria" title="Collapse">Agregar categoria</button>
          </a>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas ">
       
              <thead>
                <th style="width:10px">#</th>
                <th>Codigo Factura</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Forma de pago</th>
                <th>Neto</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </thead>

              <tbody>
                <?php  

                  $item=null;
                  $valor=null;
                  $respuesta=ControladorVentas::ctrMostrarVentas($item,$valor);

                  //var_dump($respuesta);
                  foreach ($respuesta as $key => $value) {
                    echo '
                        <tr>
                          <td>'.($key+1).'</td>
                          <td>'.$value["codigo"].'</td>';

                          $itemCliente="id";
                          $valorCliente=$value["id_cliente"];
                          $respuestaCliente=ControladorClientes::ctrMostrarClientes($itemCliente,$valorCliente);

                    echo '<td>'.$respuestaCliente["nombre"].'</td>';

                          $itemUsuario="id";
                          $valorUsuario=$value["id_vendedor"];
                          $respuestaUsuario=ControladorUsuarios::ctrMostrarUsuarios($itemUsuario,$valorUsuario);

                    echo '<td>'.$respuestaUsuario["nombre"].'</td>
                          <td>'.$value["metodo_pago"].'</td>
                          <td>$ '.$value["neto"].'</td>
                          <td>$ '.$value["total"].'</td>
                          <td>'.$value["fecha"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-primary btnImprimirFactura" codigoVenta="'.$value["codigo"].'"><i class="fa fa-print "></i></button>
                              <button class="btn btn-warning btnEditarVenta"  idVenta='.$value["id"].'><i class="fa fa-pencil"></i></button>
                              <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>
                            </div>
                          </td>
                        </tr>
                    ';                    
                  }
                ?>

              </tbody>
      
          </table>
          
          <?php

            $eliminarVenta = new ControladorVentas();
            $eliminarVenta -> ctrEliminarVenta();

          ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
