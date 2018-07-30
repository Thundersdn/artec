
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

     <div class="row">
        <!-- TABLA 1-->
        <div class="col-lg-5 col-xs-12">        
          <div class="box box-success">
            <div box-header with-border>
              <form role="form" method="post" class="formularioVenta"> 
                <div class="box-body">
                    <div class="box">
                      
                      <!-- Entrada VENDEDOR -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]?>" readonly>
                          <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]?>">
                        </div>
                      </div>
                       
                      <!-- Entrada VENTA -->

                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                          <?php  
                            $item=null;
                            $valor=null;
                            $ventas=ControladorVentas::ctrMostrarVentas($item,$valor);

                            if(!$ventas){
                              echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1000001" readonly>';
                            }else{
                              foreach ($ventas as $key => $value) {
                              }
                              $codigo=$value["codigo"]+1;
                              echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                            }
                          ?>
                        </div>
                      </div>

                      <!-- Entrada CLIENTE -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                          <option value="">Seleccionar cliente</option>
                          
                          <?php  
                            $item=null;
                            $valor=null;
                            $clientes=ControladorClientes::ctrMostrarClientes($item,$valor);
                            foreach ($clientes as $key => $value) {
                              echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                          ?>

                          </select>
                          <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                        </div>
                      </div>
        
                      <!-- LISTA DE PRODUCTOS-->
                      <div class="form-group row nuevoProducto">
                      </div>
                      <!-- String con los productos-->
                      <input type="hidden" id="listaProductos" name="listaProductos">

                      <!-- BOTON AGREGAR PRODUCTO (invisible para pantalla escritorio)-->
                      <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                      <!-- TOTAL COMPRA-->
                      <hr>
                      <div class="row">
                        <div class="col-xs-8 pull-right">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Impuesto</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="width: 50%">
                                  <div class="input-group">
                                    <input type="number" min="1" class="form-control input-lg" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="19" required>
                                    <input type="hidden" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" >
                                    <input type="hidden" id="nuevoPrecioNeto" name="nuevoPrecioNeto" >
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                  </div>
                                </td>
                                <td style="width: 50%">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                    <input type="nummber" min="1" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="0000" total="" required>

                                     <!-- almaceno el valor de la venta sin formato -->
                                    <input type="hidden" name="totalVenta" id="totalVenta">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <hr>

                      <!-- METODO DE PAGO -->
                      <div class="form-group row">

                        <div class="col-xs-6" style="padding-right:0px">
                          <div class="input-group">
                            <select class="form-control" name="nuevoMetodoPago" id="nuevoMetodoPago" required>
                              <option value="">Seleccione metodo de pago</option>
                              <option value="Efectivo">Efectivo</option>
                              <option value="TC">Tarjeta Credito</option>
                              <option value="TD">Tarjeta Debito</option>
                            </select>
                          </div>
                        </div>

                        <div class="cajasMetodoPago"></div>
                        <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">
                      </div>
                      <br>
                    </div>
                </div>
                <!-- BOTON GUARDAR -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
                </div>
              </form>

              <?php  
              $crearVenta=new ControladorVentas();
              $crearVenta->ctrCrearVenta();
              ?>
              
            </div>  
          </div>
        </div>


        <!-- TABLA 2-->

        <!-- invoco el DatatTable-->
        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div class="box box-warning">
            <div class="box-header with-border">
              <div class="box-body">
                 <table class="table table-bordered table-striped dt-responsive  tablaVentas">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Imagen</th>
                      <th>Codigo</th>
                      <th>Descripcion</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <!-- Para usar DataTable (tabla dinamica es necesario eliminar el tbody), se invoca la tabla desde js (pantilla.js, invocado por clase table), se carga el objeto datatable, los datos se cargan desde ventas.js con la clase tablaVentas-->
                </table>
              </div>
            </div>
          </div>
     </div>

    </section>
    <!-- /.content -->
  </div>


<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" >

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cliente</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user" style="width: 15px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key" style="width: 15px"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="nuevoRut" placeholder="Rut sin . ni -" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope" style="width: 15px"></i></span> 

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone" style="width: 15px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(99) 9999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker" style="width: 15px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Dirección">

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar" style="width: 15px"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Fecha nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cliente</button>

        </div>

      </form>
<?php  
$crearCliente=new ControladorClientes();
$crearCliente->ctrCrearCliente();
?>
    </div>

  </div>

</div>