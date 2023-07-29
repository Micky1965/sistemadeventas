<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/clientes/listado_de_clientes.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
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
                            <?php
                            $contador_de_ventas = 0;
                            foreach ($ventas_datos as $ventas_dato) {
                                $contador_de_ventas = $contador_de_ventas + 1;
                            }
                            ?>
                            <h3 class="card-title"><i class="fas fa-dollar-sign"></i> Venta Nro
                                <input type="text" style="text-align:center" value="<?php echo $contador_de_ventas + 1; ?>" disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Venta</b>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-buscar_producto">
                                        <i class="fas fa-search"></i>
                                        Buscar Producto
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <b>Cliente</b>
                                    <button type="button" class="btn btn-info" data-toggle="modal" 
                                            data-target="#modal-buscar_cliente"><i class="fas fa-search"></i>
                                        Buscar Cliente
                                    </button>
                                </div>
                            </div>


                            <!-- Modal para ver datos de los productos -->
                            <div class="modal fade" id="modal-buscar_producto">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #07b0d6;color: white">
                                            <h4 class="modal-title">Busqueda del Producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example1" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th><center>Nro</center></th>
                                                            <th><center>Seleccionar</center></th>
                                                            <th><center>Código</center></th>
                                                            <th><center>Categoría</center></th>
                                                            <th><center>Descripción</center></th>
                                                            <th><center>Stock</center></th>
                                                            <th><center>Precio Com</center></th>
                                                            <th><center>Precio Ven</center></th>
                                                            <th><center>Fecha Com</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($productos_datos as $productos_dato) {
                                                            $id_producto = $productos_dato['id_producto']; ?>
                                                            <tr>
                                                                <td><?php echo $contador = $contador + 1; ?></td>
                                                                <td>
                                                                    <button class="btn btn-info" id="btn_seleccionar<?php echo $id_producto; ?>">
                                                                        Seleccionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_seleccionar<?php echo $id_producto; ?>').click(function() {

                                                                            var id_producto = "<?php echo $id_producto; ?>";
                                                                            $('#id_producto').val(id_producto);
                                                                            var producto = "<?php echo $productos_dato['nombre']; ?>";
                                                                            $('#producto').val(producto);
                                                                            var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                            $('#descripcion').val(descripcion);
                                                                            var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                            $('#precio_venta').val(precio_venta);
                                                                            $('#cantidad').focus();



                                                                        //$('#modal-buscar_producto').modal('toggle');
                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td><?php echo $productos_dato['codigo']; ?></td>
                                                                <td><?php echo $productos_dato['categoria']; ?></td>
                                                                <td><?php echo $productos_dato['descripcion']; ?></td>
                                                                <td><?php echo $productos_dato['stock']; ?></td>
                                                                <td><?php echo $productos_dato['precio_compra']; ?></td>
                                                                <td><?php echo $productos_dato['precio_venta']; ?></td>
                                                                <td><?php echo $productos_dato['fecha_ingreso']; ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <input type="text" id="id_producto" hidden>
                                                            <label for="">Producto</label>
                                                            <input type="text" id="producto" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="">Descripción</label>
                                                            <input type="text" id="descripcion" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Cantidad</label>
                                                            <input type="text" id="cantidad" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio Unitario</label>
                                                            <input type="text" id="precio_venta" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button style="float: right" id="btn_guardar_venta" class="btn btn-success">Guardar Venta</button>
                                                <div id="respuesta_carrito"></div>
                                                <script>
                                                    $('#btn_guardar_venta').click(function() {
                                                        var nro_venta = '<?php echo $contador_de_ventas + 1 ?>';
                                                        var id_producto = $('#id_producto').val();
                                                        var cantidad = $('#cantidad').val();

                                                        if (id_producto == "") {
                                                            alert("Debe llenar el campo PRODUCTO");
                                                        } else if (cantidad == "") {
                                                            alert("Debe llenar el campo CANTIDAD");
                                                        } else {
                                                            var url = "../app/controllers/ventas/guardar_venta.php";
                                                            $.get(url, {
                                                                nro_venta: nro_venta,
                                                                id_producto: id_producto,
                                                                cantidad: cantidad
                                                            }, function(datos) {
                                                                $('#respuesta_carrito').html(datos);
                                                            });
                                                        }
                                                    });
                                                </script>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <br><br>

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
                                            <th style="background-color: #e7e7e7; text-align: center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nro_venta = $contador_de_ventas + 1;
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
                                                <td style="text-align: right">
                                                        <?php
                                                        $cantidad = $carrito_dato['cantidad'];
                                                        $precio = $carrito_dato['precio'];
                                                        echo $subtotal = $cantidad * $precio;
                                                        $total = $total + $subtotal;
                                                        ?>
                                                    </td>
                                                <td><center>
                                                        <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                                            <input type="text" name="id_carrito" value="<?php echo $id_carrito; ?>" hidden>
                                                            <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                                        </form>
                                                    </center></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr>
                                            <th colspan="4"></th>
                                            <th style="background-color:#98FB98; text-align: right">TOTAL</th>
                                            <th style="background-color:#98FB98; text-align: right"><?php echo $total; ?>
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
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-user-check"></i> Datos del Cliente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Modal para ver datos de los cliente -->
                            <div class="modal fade" id="modal-buscar_cliente">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #07b0d6;color: white">
                                            <h4 class="modal-title">Busqueda del Cliente </h4>
                                            <div style="width: 12px"></div>
                                            <button type="button" class="btn btn-light" data-toggle="modal" 
                                                    data-target="#modal-agregar_cliente"><i class="fas fa-plus"></i>
                                                    Agregar Cliente
                                            </button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="example2" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th><center>Nro</center></th>
                                                            <th><center>Seleccionar</center></th>
                                                            <th><center>Nombre</center></th>
                                                            <th><center>Dni</center></th>
                                                            <th><center>Teléfono</center></th>
                                                            <th><center>Mail</center></th>
                                                            <th><center>Dirección</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador_clientes = 0;
                                                        foreach ($clientes_datos as $clientes_dato) {
                                                            $id_cliente = $clientes_dato['id_cliente']; 
                                                            $contador_clientes = $contador_clientes + 1; ?>
                                                            <tr>
                                                            <td><center><?php echo $contador_clientes; ?></center></td>
                                                            <td>
                                                                <center>
                                                                    <button id="btn_datos_cliente<?php echo $id_cliente; ?>" class="btn btn-info">Seleccionar</button>
                                                                    <script>
                                                                        $('#btn_datos_cliente<?php echo $id_cliente; ?>').click(function() {

                                                                            var id_cliente = '<?php echo $clientes_dato['id_cliente']; ?>';
                                                                            $('#id_cliente').val (id_cliente);

                                                                            var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente']; ?>';
                                                                            $('#nombre_cliente').val (nombre_cliente);

                                                                            var dni_cliente = '<?php echo $clientes_dato['dni_cliente']; ?>';
                                                                            $('#dni_cliente').val (dni_cliente);

                                                                            var telefono_cliente = '<?php echo $clientes_dato['telefono_cliente']; ?>';
                                                                            $('#telefono_cliente').val (telefono_cliente);

                                                                            var mail_cliente = '<?php echo $clientes_dato['mail_cliente']; ?>';
                                                                            $('#mail_cliente').val (mail_cliente);

                                                                            var direccion_cliente = '<?php echo $clientes_dato['direccion_cliente']; ?>';
                                                                            $('#direccion_cliente').val (direccion_cliente);

                                                                            $('#modal-buscar_cliente').modal('toggle');
                                                                        });
                                                                    </script>
                                                                </center>
                                                            </td>
                                                            <td><center><?php echo $clientes_dato['nombre_cliente']; ?></center></td>
                                                            <td><center><?php echo $clientes_dato['dni_cliente']; ?></center></td>
                                                            <td><center><?php echo $clientes_dato['telefono_cliente']; ?></center></td>
                                                            <td><center><?php echo $clientes_dato['mail_cliente']; ?></center></td>
                                                            <td><center><?php echo $clientes_dato['direccion_cliente']; ?></center></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" id="id_cliente" hidden>
                                        <label for="">Nombre Cliente</label>
                                        <input type="text" class="form-control" id="nombre_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="text" class="form-control" id="dni_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Mail</label>
                                        <input type="text" class="form-control" id="mail_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="text" class="form-control" id="direccion_cliente" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-dollar-sign"></i> Registrar Venta</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Total a Pagar</label>
                                <input type="text" class="form-control" id="total_a_pagar" style="text-align: center; font-weight:bold; background-color:#98FB98"
                                       value= "<?php echo $total; ?>" disabled>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paga Con</label>
                                        <input type="text" class="form-control" id="paga_con" style="text-align: center; font-weight:bold">
                                        <script>
                                            $('#paga_con').keyup(function (){
                                                var total_a_pagar = $('#total_a_pagar').val();
                                                var paga_con = $('#paga_con').val();
                                                var vuelto = parseFloat(paga_con) - parseFloat(total_a_pagar);
                                                $('#vuelto').val(vuelto);
                                            });
                                       </script>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Vuelto</label>
                                        <input type="text" class="form-control" id="vuelto" style="text-align: center; font-weight:bold" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button id="btn_registrar" class="btn btn-success btn-block">Guardar Venta</button>
                                <div id="respuesta_registro_venta"></div>
                                <script>
                                    $('#btn_registrar').click(function () {
                                        var nro_venta = '<?php echo $contador_de_ventas + 1; ?>';
                                        var id_cliente = $('#id_cliente').val();
                                        var total_a_pagar = $('#total_a_pagar').val();

                                        if(id_cliente=="") {
                                            alert("Debe llenar todos los campos");
                                        }else{
                                            actualizar_stock();
                                            guardar_venta ();
                                        }
                                        
                                        function actualizar_stock () {
                                            
                                            var i = 1;
                                            var n = '<?php echo $contador_de_carrito; ?>';
                                        
                                            for (i = 1; i <= n; i++) {
                                                
                                                var a = '#stock_de_inventario'+i;
                                                var stock_de_inventario = $(a).val();
                                                
                                                var b = '#cantidad_carrito'+i;
                                                var cantidad_carrito = $(b).html();

                                                var c = '#id_producto' +i;
                                                var id_producto = $(c).val();

                                                var stock_calculado = stock_de_inventario - cantidad_carrito;

                                                //alert(id_producto + " - " + stock_de_inventario + " - " + cantidad_carrito + " - " + stock_calculado);

                                                var url2 = "../app/controllers/ventas/actualizar_stock.php";
                                                $.get(url2, {id_producto:id_producto, stock_calculado:stock_calculado },function (datos) {
                                                });

                                            }

                                        }
                                        
                                        function guardar_venta () {
                                            var url = "../app/controllers/ventas/registro_de_ventas.php";
                                            $.get(url, {nro_venta:nro_venta, id_cliente:id_cliente, total_a_pagar:total_a_pagar }, 
                                            function(datos) { $('#respuesta_registro_venta').html(datos);
                                            });
                                        }
                                    });
                                </script>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function() {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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

        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>


<!-- Modal para agregar cliente -->
<div class="modal fade" id="modal-agregar_cliente">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#9370DB; color: white">
                <h4 class="modal-title">Agregar Cliente </h4>
                <div style="width: 12px"></div>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../app/controllers/clientes/guardar_cliente.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre del Cliente</label>
                        <input type="text" name= "nombre_cliente" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Dni</label>
                        <input type="text" name= "dni_cliente" class="form-control">
                    </div><div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" name= "telefono_cliente" class="form-control">
                    </div><div class="form-group">
                        <label for="">Mail</label>
                        <input type="text" name= "mail_cliente" class="form-control">
                    </div><div class="form-group">
                        <label for="">Dirección</label>
                        <input type="text" name= "direccion_cliente" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <center>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </center>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>