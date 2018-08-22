 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="vistas/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrador</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MODULOS</li>
        
          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                    <a href="inicio">
                      <i class="fa fa-home fa-lg"></i> <span>Inicio</span>
                    </a>
                  </li>';
            }
          ?>          

          <?php
            if($_SESSION["perfil"]=="Administrador"||$_SESSION["perfil"]=="Vendedor"){
              echo '<li>
                      <a href="ventas">
                        <i class="fa fa-usd fa-lg" style="padding-left: 3px"></i> <span>Ventas</span>
                      </a>
                    </li>';
            }
          ?> 

          <?php
            if($_SESSION["perfil"]=="Administrador"||$_SESSION["perfil"]=="Vendedor"){
              echo '<li>
                      <a href="crear-venta">
                        <i class="fa fa-list-ol " style="padding-left: 0px"></i> <span>Nueva venta</span>
                      </a>
                    </li>';
            }
          ?> 

          <?php
            if($_SESSION["perfil"]=="Administrador"||$_SESSION["perfil"]=="Vendedor"){
              echo '<li>
                      <a href="categorias">
                        <i class="fa fa-clipboard" style="padding-left: 0px"></i> <span>Categorias</span>
                      </a>
                    </li>';
            }
          ?> 

          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                      <a href="usuarios">
                        <i class="fa fa-user fa-lg" style="padding-left: 2px"></i> <span>Usuarios</span>
                      </a>
                    </li>';
            }
          ?> 

          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                      <a href="productos">
                        <i class="fa fa-shopping-cart"></i> <span>Productos</span>
                      </a>
                    </li>';
            }
          ?> 

          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                      <a href="inventario">
                        <i class="fa fa-cubes"></i> <span>Invetario</span>
                      </a>
                    </li>';
            }
          ?> 

          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                      <a href="reportes">
                        <i class="fa fa-line-chart"></i> <span>Reportes</span>
                      </a>
                    </li>';
            }
          ?>

          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                      <a href="entregas">
                        <i class="fa fa-truck"></i> <span>Entregas</span>
                      </a>
                    </li>';
            }
          ?>

          <?php
            if($_SESSION["perfil"]=="Administrador"){
              echo '<li>
                      <a href="inicio">
                        <i class="fa fa-users"></i> <span>Clientes</span>
                      </a>
                    </li>';
            }
          ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>