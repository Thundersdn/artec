 <style>       
.icono {
    background: url('vistas/img/plantilla/icono-negro.png');
    height: 20px;
    width: 20px;
    display: block;
    /* Other styles here */
}
</style>

<?php

$item=null;
$valor=null;

$ventas=ControladorVentas::ctrSumaTotalVentas();
$clientes=count(ControladorClientes::ctrMostrarClientes($item,$valor));
$categorias=count(ControladorCategorias::ctrMostrarCategorias($item,$valor));
$productos=count(ControladorProductos::ctrMostrarProductos($item,$valor));
$usuarios=count(ControladorUsuarios::ctrMostrarUsuarios($item,$valor));
?>

<!-- CAJA 1 -->
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>$<?php echo $ventas["total"] ?></h3>
              <p>Ventas (neto)</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-usd"></i>
            </div>
            <a href="ventas" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 2 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php   echo $categorias ?></h3>
              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="categorias" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 3 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php   echo $usuarios ?></h3>
              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="usuarios" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 4 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php   echo $productos ?></h3>
              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-cart"></i>
            </div>
            <a href="productos" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 5 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>Inventario</p>
            </div>
            <div class="icon" style="margin-top: -5px;">
              <small><i class="fa fa-cubes"></i></small>
            </div>
            <a href="inventario" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 6 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>Informes</p>
            </div>
            <div class="icon">
              <small>
                <i class="fa fa-line-chart"></i>
              </small>
            </div>
            <a href="productos" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 7 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>Entregas</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="productos" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<!-- CAJA 8 -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
              <p>Clientes</p>
            </div>
            <div class="icon" style="margin-top: -5px;">
             <small><i class="fa fa-users"></i></small>
            </div>
            <a href="clientes" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>