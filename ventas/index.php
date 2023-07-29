<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Ventas</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Ventas Registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th><center>Nro</center></th>
                                            <th><center>Nro de venta</center></th>
                                            <th><center>Productos</center></th>
                                            <th><center>Clientes</center></th>
                                            <th><center>Total</center></th>
                                            <th><center>Acciones</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($ventas_datos as $ventas_dato) {
                                            $id_venta = $ventas_dato['id_venta'];
                                            $contador = $contador + 1;
                                        ?>

                                            <tr>
                                                <td><center><?php echo $contador; ?></center></td>
                                                <td><center><?php echo $ventas_dato['nro_venta']; ?></center></td>
                                                <td>
                                                    <center>
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Modal_productos<?php echo $id_venta; ?>">
                                                            Productos
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modal_productos<?php echo $id_venta; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #7FFFD4;">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Productos de la Venta Nro <?php echo $ventas_dato['nro_venta']; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
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
                                                                                    $nro_venta = $ventas_dato['nro_venta'];
                                                                                    $contador_de_carrito = 0;
                                                                                    $total = 0;
                                                                                    $sql_carrito = "SELECT *, pro.nombre as nombre, pro.descripcion as descripcion, pro.precio_venta as precio, pro.stock as stock, pro.id_producto as id_producto 
                                                                                                    FROM tb_carrito as carr INNER JOIN tb_almacen as pro on carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC";
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
                                                                                                <input type="text" value="<?php echo $carrito_dato['stock']; ?>" id="stock_de_inventario<?php echo $contador_de_carrito; ?>" hidden>
                                                                                            </td>
                                                                                            <td><center><?php echo $carrito_dato['precio']; ?></center></td>
                                                                                            <td>
                                                                                                <center>
                                                                                                    <?php
                                                                                                    $cantidad = $carrito_dato['cantidad'];
                                                                                                    $precio = $carrito_dato['precio'];
                                                                                                    echo $subtotal = $cantidad * $precio;
                                                                                                    $total = $total + $subtotal;
                                                                                                    ?>
                                                                                                </center>
                                                                                            </td>
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
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </td>
                                                <td><center><?php echo $ventas_dato['nombre_cliente']; ?></center></td>
                                                <td><center><?php echo "$ " . $ventas_dato['total_pagado']; ?></center></td>
                                                <td>
                                                    <center>
                                                        <a href="show.php?id_venta=<?php echo $id_venta; ?>" class="btn btn-warning btn-sm">Detalle</a>
                                                        <a href="delete.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                                        <a href="factura.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-secondary btn-sm">Factura</a>
                                                        <a href="factura2.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-secondary btn-sm">Ticket</a>
                                                    </center>
                                                </td>

                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    </tfoot>
                                </table>
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


<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/parte2.php'); ?>


<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 ventas",
                "infoFiltered": "(Filtrado de _MAX_ total ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ ventas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy',
                    }, {
                        extend: 'pdf'
                    }, {
                        extend: 'excel'
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }, {
                        extend: 'csv'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>