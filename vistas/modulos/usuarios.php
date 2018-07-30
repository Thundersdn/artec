
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

              <?php 
                $item=null;
                $valor=null;
                $usuarios= ControLadorUsuarios::ctrMostrarUsuarios($item, $valor);
                foreach ($usuarios as $key => $value) {
                  echo '
                    <tr>
                      <td>1</td>
                      <td>'.$value["nombre"].'</td>
                      <td>'.$value["usuario"].'</td>';

                      if($value["foto"]!=null){
                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                      }else{
                        echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                      }

                  echo'   
                      <td>'.$value["perfil"].'</td>';
                       if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                  }             

                      echo'
                      <td>'.$value["ultimo_login"].'</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times" ></i></button>
                        </div>
                      </td>
                    </tr>
                  ';
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



<!-- VENTANA MODAL crear usuario-->
  
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
                  <span class="input-group-addon" ><i class="fa fa-user" style="width: 15px"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                </div>
              </div>
              <!-- USUARIO -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key" style="width: 15px"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>
                </div>
              </div>
              <!-- PASSWORD -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock" style="width: 15px"></i></span>
                  <input type="text" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                </div>
              </div>
              <!-- PERFIL -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users" style="width: 15px"></i></span>
                  <select class="form-control input-lg" name="nuevoPerfil">
                    <option value="">Seleccionar perfil</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Cajero">Cajero</option>
                    <option value="Vendedor">Vendedor</option>
                    <option value="Despacho">Despacho</option>
                    <option value="Logistica">Logistica</option>

                  </select>
                </div>
              </div>
              <!-- FOTO -->
              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" class="nuevaFoto" name="nuevaFoto">
                <p class="help-block">Peso max 200 Mb</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>

            </div>
          </div>  
          <!-- FOOTER MODAL -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
          
          <?php
            $crearUsuario=new ControLadorUsuarios();
            $crearUsuario->ctrCrearUsuario();
          ?>

        </form>
      </div>
    </div>
    
  </div>

<!-- VENTANA MODAL editar usuario-->

  <div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">
          <!-- HEAD MODAL -->
          <div class="modal-header" style="">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editar usuario</h4>
          </div>

          <!-- BODY MODAL -->
          <div class="modal-body">
            <div class="box-body">

              <!-- NOMBRE -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" placeholder="Ingresar nombre" required>
                </div>
              </div>
              <!-- USUARIO -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                  <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario"  value="" readonly>
                </div>
              </div>
              <!-- PASSWORD -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                  <input type="text" class="form-control input-lg" id="editarPassword" name="editarPassword" placeholder="Nueva contraseña" >
                  <input type="hidden" name="passwordActual" id="passwordActual">
                </div>
              </div>
              <!-- PERFIL -->
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <select class="form-control input-lg" name="editarPerfil">
                    <option value="" id="editarPerfil"></option>
                    <option value="Administrador">Administrador</option>
                    <option value="Cajero">Cajero</option>
                    <option value="Vendedor">Vendedor</option>
                    <option value="Despacho">Despacho</option>
                    <option value="Logistica">Logistica</option>
                  </select>
                </div>
              </div>
              <!-- FOTO -->
              <div class="form-group">
                <div class="panel">SUBIR FOTO</div>
                <input type="file" name="editarFoto" class="nuevaFoto">
                <p class="help-block">Peso max 200 Mb</p>
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>

            </div>
          </div>  
          <!-- FOOTER MODAL -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
            <button type="submit" class="btn btn-primary">Modificar</button>
          </div>
          
          <?php
            $editarUsuario=new ControLadorUsuarios();
            $editarUsuario->ctrEditarUsuario();
          ?>

        </form>
      </div>
    </div>
            <?php
            $borrarUsuario=new ControLadorUsuarios();
            $borrarUsuario->ctrBorrarUsuario();
          ?>
  </div>

