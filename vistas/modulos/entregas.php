
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Entregas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li><a href="#">Configuracion</a></li>
        <li class="active"> Entregas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <a href="crear-entrega">
            <button class="btn btn-primary" data-toggle="modal"  data-target="#modalAgregarCategoria" title="Collapse">Nueva entrega</button>
          </a>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas ">
       
              <thead>
                <th style="width:10px">#</th>
                <!--<th>Número</th>-->
                <th>N° Venta</th>
                <th>Ruta</th>
                <th>Dirección</th>
                <th>Creación</th>
                <th>Recepción</th>
                <th>Estado</th>
                <th>Acciones</th>
              </thead>

              <tbody>
                <?php  

                  $item=null;
                  $valor=null;
                  $respuesta=ControladorEntregas::ctrMostrarEntregas($item,$valor);

                  //var_dump($respuesta);
                  foreach ($respuesta as $key => $value) {
                    echo '
                        <tr>
                          ';#<td>'.($key+1).'</td>';
                          echo '<td>'.$value["id"].'</td>';

                          $itemVenta="id";
                          $valorVenta=$value["venta"];
                          $respuestaVenta=ControladorVentas::ctrMostrarVentas($itemVenta,$valorVenta);

                    echo '<td>'.$respuestaVenta["codigo"].'</td>';
                    echo '<td>'.$value["ruta"].'</td>
                          <td>'.$value["direccion"].'</td>
                          <td>'.$value["fecha_creacion"].'</td>
                          <td>'.$value["fecha_recepcion"].'</td>
                          <td>'.$value["estado"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-primary btnMostrarInformes" idEntrega="'.$value["id"].'"><i class="fa fa-book "></i></button>
                              <button class="btn btn-warning btnEditarEntrega"  idEntrega='.$value["id"].'><i class="fa fa-pencil"></i></button>';
                              if($_SESSION["perfil"]=="Administrador"){
                                echo '
                                      <button class="btn btn-danger btnEliminarEntrega" idEntrega="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                              }
                    echo'
                            </div>
                          </td>
                        </tr>
                    ';                    
                  }
                ?>

              </tbody>
      
          </table>
          
          <?php

            $eliminarEntrega = new ControladorEntregas();
            $eliminarEntrega -> ctrEliminarEntrega();

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
