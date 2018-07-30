
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li><a href="#">Configuracion</a></li>
        <li class="active"> Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          
            <button class="btn btn-primary" data-toggle="modal"  data-target="#modalAgregarUsuario" title="Collapse">Agregar Usuario</button>

        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped dt-responsive tablas ">

              
              <thead>
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Ultimo login</th>
                <th>Acciones</th>
              </thead>

              <tbody>
                <!--FILA 1-->
                <tr>
                  <td>1</td>
                  <td>Administrador</td>
                  <td>admin</td>
                  <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                  <td>Administrador</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>2017-12.11 12:05:32</td>
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
                  <td>Administrador</td>
                  <td>admin</td>
                  <td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                  <td>Administrador</td>
                  <td><button class="btn btn-success btn-xs">Activado</button></td>
                  <td>2017-12.11 12:05:32</td>
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


  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">
          <!-- HEAD MODAL -->
          <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar usuario</h4>
          </div>

          <!-- BODY MODAL -->
          <div class="modal-body">
            <div class="box-body">

              <!-- NOMBRE -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                </div>
              </div>
              <!-- USUARIO -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>
                </div>
              </div>
              <!-- PASSWORD -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                </div>
              </div>
              <!-- PERFIL -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil">
                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Especial">Especial</option>
                    <option value="Vendedor">Vendedor</option>
                  </select>
                </div>
              </div>
              <!-- FOTO -->
              <div class="form-group">
                <div class="panel">Subir Foto</div>
                <input type="file" name="nuevaFoto" id="nuevaFoto">
                <p class="help-block">Peso max 200 Mb</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">
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

