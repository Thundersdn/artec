
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Categorias
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li><a href="#">Configuracion</a></li>
        <li class="active"> Categorias</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
            <button class="btn btn-primary" data-toggle="modal"  data-target="#modalAgregarCategoria" title="Collapse">Agregar categoria</button>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas ">

              
              <thead>
                <th style="width:10px">#</th>
                <th>Categoria</th>
                <th>Acciones</th>
              </thead>

              <tbody>
                <?php 
                $item=null;
                $valor=null;

                $categorias=ControladorCategorias::ctrMostrarCategorias($item,$valor);

                foreach ($categorias as $key => $value) {
                  echo '
                    <tr>
                      <td>'.($key+1).'</td>
                      <td class="text-uppercase">'.$value["categoria"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarCategoria" data-toggle="modal" data-target="#modalEditarCategoria" idCategoria='.$value["id"].'><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarCategoria" idCategoria='.$value["id"].'><i class="fa fa-times"></i></button>
                        </div>
                      </td>
                    </tr>';
                }
                ?>
              </tbody>
      
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



<!-- MODAL CREAR CATEGORIA -->


  <div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post">
          <!-- HEAD MODAL -->
          <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar categoria</h4>
          </div>

          <!-- BODY MODAL -->
          <div class="modal-body">
            <div class="box-body">

              <!-- NOMBRE -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevaCategoria" placeholder="Ingresar categoria" required>
                </div>
              </div>

            </div>
          </div>  
          <!-- FOOTER MODAL -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          <?php 
            $nuevaCategoria=new ControladorCategorias();
            $nuevaCategoria->ctrCrearCategoria();
          ?>
        </form>
      </div>
    </div>
  </div>


<!-- MODAL EDITAR CATEGORÍA -->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                 <input type="hidden"  name="idCategoria" id="idCategoria" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarCategoria = new ControladorCategorias();
          $editarCategoria -> ctrEditarCategoria();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();

?>