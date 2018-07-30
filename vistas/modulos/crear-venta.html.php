
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
              <form role="form" method="post"> 
                <div class="box-body">
                    <div class="box">
                      
                      <!-- Entrada VENDEDOR -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="Usuario Administrador" readonly>
                        </div>
                      </div>

                      <!-- Entrada VENTA -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                          <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="0000129" readonly>
                        </div>
                      </div>

                      <!-- Entrada CLIENTE -->
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-users"></i></span>
                          <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                          <option value="">Seleccionar cliente</option>
                          </select>
                          <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                        </div>
                      </div>
        
                      <!-- PRODUCTO-->
                      <div class="form-group row nuevoProducto">

                        <!-- Descripción del producto -->
                        <div class="col-xs-6" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>
                            <input type="text" class="form-control" id="agregarProducto" name="agregarProducto" placeholder="Descripción del producto" required>
                          </div>
                        </div>

                        <!-- Cantidad del producto -->
                        <div class="col-xs-3">
                           <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0000" required>
                        </div> 

                        <!-- Precio del producto -->
                        <div class="col-xs-3" style="padding-left:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                            <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="0000" required>
                          </div>
                        </div> 

                      </div>
                    
                      <!-- BOTON AGREGAR PRODUCTO (invisible para pantalla escritorio)-->
                      <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

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
                                    <input type="nummber" min="1" class="form-control" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>
                                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                  </div>
                                </td>
                                <td style="width: 50%">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                                    <input type="nummber" min="1" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="0000" required>
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
                              <option value="efectivo">Efectivo</option>
                              <option value="tarjetaCredito">Tarjeta Credito</option>
                              <option value="tarjetaDebito">Tarjeta Debito</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-xs-6" style="padding-left:0px">
                          <div class="input-group">
                            <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" required>
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                          </div>
                        </div>

                      </div>
                      <br>
                    </div>
                </div>
                <!-- BOTON GUARDAR -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
                </div>
              </form>
            </div>  
          </div>
        </div>
        <!-- TABLA 2-->
        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
          <div class="box box-warning">
            <div class="box-header with-border">
              <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas">
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
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                      <td>000123</td>
                      <td>aqui va descripcion</td>
                      <td>20</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary">Agregar</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
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