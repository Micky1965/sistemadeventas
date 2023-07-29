<?php

$id_venta_get = $_GET['id_venta'];
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/cargar_venta.php');
include('../app/controllers/clientes/cargar_cliente.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de la Venta Nro <?= $nro_venta; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #e7e7e7; text-align: center">Nro</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Descripción</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Precio Unitario</th>
                                            <th style="background-color: #e7e7e7; text-align: center">Precio Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_de_carrito = 0;
                                        $total = 0;

                                        $sql_carrito = "SELECT *, pro.nombre as nombre, pro.descripcion as descripcion, pro.precio_venta as precio, pro.stock as stock, pro.id_producto as id_producto FROM tb_carrito as carr 
                                                        INNER JOIN tb_almacen as pro on carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC";
                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();
                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($carrito_datos as $carrito_dato) {
                                            $contador_de_carrito = $contador_de_carrito + 1;
                                            $id_carrito = $carrito_dato['id_carrito'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador_de_carrito; ?></center>
                                                    <input type="text" value="<?php echo $carrito_dato['id_producto']; ?>" id="id_producto<?php echo $contador_de_carrito; ?>" hidden>
                                                </td>
                                                <td><center><?php echo $carrito_dato['nombre']; ?></center></td>
                                                <td><center><?php echo $carrito_dato['descripcion']; ?></center></td>
                                                <td>
                                                    <center><span id="cantidad_carrito<?php echo $contador_de_carrito; ?>"><?php echo $carrito_dato['cantidad']; ?></span></center>
                                                    <input type="text" value="<?php echo $carrito_dato['stock'];?>" id="stock_de_inventario<?php echo $contador_de_carrito; ?>" hidden>
                                                </td>
                                                <td><center><?php echo $carrito_dato['precio']; ?></center></td>
                                                <td><center>
                                                        <?php
                                                        $cantidad = $carrito_dato['cantidad'];
                                                        $precio = $carrito_dato['precio'];
                                                        echo $subtotal = $cantidad * $precio;
                                                        $total = $total + $subtotal;
                                                        ?>
                                                    </center></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <th colspan="4"></th>
                                            <th style="background-color:#98FB98; text-align: right">TOTAL</th>
                                            <th style="background-color:#98FB98;">
                                                <center><?php echo $total; ?></center>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-check"></i> Datos del Cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <?php
                        foreach ($clientes_datos as $clientes_dato)
                        {
                            $nombre_cliente = $clientes_dato['nombre_cliente'];
                            $dni_cliente = $clientes_dato['dni_cliente'];
                            $telefono_cliente = $clientes_dato['telefono_cliente'];
                            $mail_cliente = $clientes_dato['mail_cliente'];
                            $direccion_cliente = $clientes_dato['direccion_cliente'];
                        }
                        ?>

                        <div class="card-body">
                            <!-- Modal para ver datos de los cliente -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre Cliente</label>
                                        <input type="text" value="<?php echo $nombre_cliente; ?>" class="form-control" id="nombre_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="text" value="<?php echo $dni_cliente; ?>" class="form-control" id="dni_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="text" value="<?php echo $telefono_cliente; ?>" class="form-control" id="telefono_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Mail</label>
                                        <input type="text" value="<?php echo $mail_cliente; ?>" class="form-control" id="mail_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" value="<?php echo $direccion_cliente; ?>" class="form-control" id="direccion_cliente" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('../layout/parte2.php'); ?>
