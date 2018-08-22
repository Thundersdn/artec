
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
                <!--FILA 1-->
                <tr>
                  <td>1</td>
                  <td>EQUIPO ELECTRICO</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>
                <!--FILA 1-->
                <tr>
                  <td>2</td>
                  <td>TALADROS</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                    </div>
                  </td>
                </tr>

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



<!-- VENTANA MODAL -->


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


        </form>
      </div>
    </div>
    
  </div>
