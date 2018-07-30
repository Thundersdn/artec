
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Productos  
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li><a href="#">Configuracion</a></li>
        <li class="active"> Productos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
            <button class="btn btn-primary" data-toggle="modal"  data-target="#modalAgregarProducto" title="Collapse">Agregar Producto</button>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablaProductos">

              
            <thead>
                <tr>
                    <th style="width:10px">#</th>
                    <th>Imagen</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <!-- AQUI SE CARGA EL DATATABLEB -->
      
          </table>
          
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



<!-- MODAL CREAR PRODUCTO-->

  <div id="modalAgregarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">
          <!-- HEAD MODAL -->
          <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Producto</h4>
          </div>

          <!-- BODY MODAL -->
          <div class="modal-body">
            <div class="box-body">

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                  
                  <option value="">Selecionar categoría</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                  foreach ($categorias as $key => $value) {
                    
                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Codigo interno (SKU)" readonly required>

              </div>

            </div>
              <!-- DESCRIPCION -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Ingresar descripcion" required>
                </div>
              </div>
              <!-- STOCK-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Ingresar Stock" required>
                </div>
              </div>


             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg nuevoPrecioCompra" id="nuevoPrecioCompra" name="nuevoPrecioCompra" placeholder="Precio de Compra" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" placeholder="Precio de venta" min="0" required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>
                  <!-- ENTRADA PARA PORCENTAJE -->
                  <div class="col-xs-6" style="padding:0">
                    <div class="input-group">
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
            </div>



              <!-- FOTO -->
              <div class="form-group">
                <div class="panel">SUBIR IMAGEN</div>
                <input type="file" name="nuevaImagen" id="nuevaImagen" class="nuevaImagen">
                <p class="help-block">Peso max 2Mb</p>
                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>

            </div>
          </div>  
          <!-- FOOTER MODAL -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          <?php  
            $crearProducto=new ControladorProductos();
            $crearProducto->ctrCrearProducto();
          ?>

        </form>
      </div>
    </div>
    
  </div>


<!-- MODAL EDITAR-->

  <div id="modalEditarProducto" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">
          <!-- HEAD MODAL -->
          <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar Producto</h4>
          </div>

          <!-- BODY MODAL -->
          <div class="modal-body">
            <div class="box-body">

          <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarCategoria" readonly required>
                  
                  <option id="editarCategoria"></option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL CÓDIGO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

              </div>

            </div>
              <!-- DESCRIPCION -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                  <input type="text" class="form-control input-lg" name="editarDescripcion" id="editarDescripcion" required>
                </div>
              </div>

              <!-- STOCK-->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check"></i></span>
                  <input type="number" class="form-control input-lg" name="editarStock" id="editarStock" min="0" name="editarStock" required>
                </div>
              </div>

             <!-- ENTRADA PARA PRECIO COMPRA -->

             <div class="form-group row">

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg editarPrecioCompra" id="editarPrecioCompra" name="editarPrecioCompra" min="0" required>

                  </div>

                </div>

                <!-- ENTRADA PARA PRECIO VENTA -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" readonly required>

                  </div>
                
                  <br>

                  <!-- CHECKBOX PARA PORCENTAJE -->

                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>
                        <input type="checkbox" class="minimal porcentaje" checked>
                        Utilizar procentaje
                      </label>
                    </div>
                  </div>
                  <!-- ENTRADA PARA PORCENTAJE -->
                  <div class="col-xs-6" style="padding:0">
                    <div class="input-group">
                      <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                    </div>
                  </div>
                </div>
            </div>



              <!-- FOTO -->
              <div class="form-group">
                <div class="panel">SUBIR IMAGEN</div>
                <input type="file" name="editarImagen" id="nuevaImagen" class="nuevaImagen">
                <p class="help-block">Peso max 2Mb</p>
                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" id="imagenActual" name="imagenActual">

              </div>

            </div>
          </div>  
          <!-- FOOTER MODAL -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
        </form>
            <?php  
            $crearProducto=new ControladorProductos();
            $crearProducto->ctrEditarProducto();
            ?>
      </div>
    </div>
  </div>
          <?php  
            $crearProducto=new ControladorProductos();
            $crearProducto->ctrEliminarProducto();
          ?>

