<?php
    if($_SESSION["perfil"]!="Administrador"){
      echo '<script type="text/javascript">
            window.location = "crear-venta"
            </script>';
    }

    else{
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tablero
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li class="active">Inicio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="content">
          <?php  
            include "inicio/cajas-superiores.php"
          ?>
        </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    }
 ?>



  <!-- /.content-wrapper 
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tablero
        <small>Panel de Control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> ArtecPos</a></li>
        <li class="active">Inicio</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="content">
          <?php  
            //include "inicio/cajas-superiores.php"
          ?>
        </div>
        </div>
    </section>

  </div>
-->