<?php

include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Nueva Compra</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ingrese los Datos</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                
                                </div>

                                <div class="card-body" style="display: block;">
                                    <div style="display: flex">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-buscar_producto">
                                            <i class="fas fa-search"></i>
                                            Buscar Producto
                                        </button>

                                        
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

                                                                                        var id_producto = "<?php echo $productos_dato['id_producto']; ?>";
                                                                                        $('#id_producto').val(id_producto);

                                                                                        var codigo = "<?php echo $productos_dato['codigo']; ?>";
                                                                                        $('#codigo').val(codigo);

                                                                                        var categoria = "<?php echo $productos_dato['categoria']; ?>";
                                                                                        $('#categoria').val(categoria);

                                                                                        var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                                        $('#descripcion_producto').val(descripcion);

                                                                                        var stock = "<?php echo $productos_dato['stock']; ?>";
                                                                                        $('#stock').val(stock);
                                                                                        $('#stock_actual').val(stock);

                                                                                        var precio_compra = "<?php echo $productos_dato['precio_compra']; ?>";
                                                                                        $('#precio_compra').val(precio_compra);

                                                                                        var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                                        $('#precio_venta').val(precio_venta);

                                                                                        var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso']; ?>";
                                                                                        $('#fecha_ingreso').val(fecha_ingreso);

                                                                                        $('#modal-buscar_producto').modal('toggle');
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
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal-->
                                        </div>

                                    <br>
                                    <div class="row">
                                        <input type="text" id="id_producto" hidden>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Código:</label>
                                                        <input type="text" class="form-control" id="codigo" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Categoría:</label>
                                                        <div style="display: flex">
                                                            <input type="text" class="form-control" id="categoria" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Descripción del producto:</label>
                                                        <textarea name="descripcion" id="descripcion_producto" cols="30" rows="2" class="form-control" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" name="stock" id="stock" class="form-control" style="background-color:navajowhite" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Precio compra:</label>
                                                        <input type="number" name="precio_compra" id="precio_compra" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Precio venta:</label>
                                                        <input type="number" name="precio_venta" id="precio_venta" class="form-control" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Fecha de ingreso:</label>
                                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="display: flex">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-buscar_proveedor">
                                                    <i class="fas fa-search"></i>
                                                    Buscar Proveedor
                                                </button>
                                                <!-- Modal para ver datos de los proveedores -->
                                                <div class="modal fade" id="modal-buscar_proveedor">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #07b0d6;color: white">
                                                                <h4 class="modal-title">Busqueda del Proveedor</h4>
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
                                                                                <th><center>Proveedor</center></th>
                                                                                <th><center>Teléfono</center</th>
                                                                                <th><center>Dirección</center></th>
                                                                                <th><center>Email</center></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            foreach ($proveedores_datos as $proveedores_dato) {
                                                                                $id_proveedor = $proveedores_dato['id_proveedor'];
                                                                                $nombre_proveedor = $proveedores_dato['nombre_proveedor']; ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <center><?php echo $contador = $contador + 1; ?></center>
                                                                                    </td>
                                                                                    <td>
                                                                                        <button class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>">
                                                                                            Seleccionar
                                                                                        </button>
                                                                                        <script>
                                                                                            $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click(function() {

                                                                                                var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                                                                $('#id_proveedor').val(id_proveedor);
                                                                                                
                                                                                                var nombre_proveedor = '<?php echo $nombre_proveedor; ?>';
                                                                                                $('#nombre_proveedor').val(nombre_proveedor);

                                                                                                var telefono_proveedor = '<?php echo $proveedores_dato['telefono']; ?>';
                                                                                                $('#telefono').val(telefono_proveedor);

                                                                                                var direccion_proveedor = '<?php echo $proveedores_dato['direccion']; ?>';
                                                                                                $('#direccion').val(direccion_proveedor);

                                                                                                var email_proveedor = '<?php echo $proveedores_dato['email']; ?>';
                                                                                                $('#email').val(email_proveedor);

                                                                                                $('#modal-buscar_proveedor').modal('toggle');
                                                                                            });
                                                                                        </script>
                                                                                    </td>
                                                                                    <td><?php echo $nombre_proveedor; ?></td>
                                                                                    <td>
                                                                                        <a href="https://wa.me/+54<?php echo $proveedores_dato['telefono']; ?>" target="_blank" class="btn btn-info">
                                                                                            <?php echo $proveedores_dato['telefono']; ?>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td><?php echo $proveedores_dato['direccion']; ?></td>
                                                                                    <td><?php echo $proveedores_dato['email']; ?></td>
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
                                                <!-- /.modal-->
                                            </div>

                                            <br>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" id="id_proveedor" hidden>
                                                        <label for="">Proveedor </label>
                                                        <input type="text" id="nombre_proveedor" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Teléfono </label>
                                                        <input type="number" id="telefono" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Dirección </label>
                                                        <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Email </label>
                                                        <input type="email" id="email" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de la Compra</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php
                                                $contador_de_compras = 1;
                                                foreach ($compras_datos as $compras_dato) {
                                                    $contador_de_compras = $contador_de_compras + 1;
                                                }
                                                ?>
                                                <label for="">Número de la Compra</label>
                                                <input type="text" value="<?php echo $contador_de_compras; ?>" style="text-align: center" class="form-control" disabled>
                                                <input type="text" value="<?php echo $contador_de_compras; ?>" id="nro_compra" hidden>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de Compra</label>
                                                <input type="date" class="form-control" id="fecha_compra">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de Compra</label>
                                                <input type="text" class="form-control" id="comprobante">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio de Compra</label>
                                                <input type="number" class="form-control" id="precio_compra_controlador">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la Compra</label>
                                                <input type="number" id="cantidad_compra" class="form-control">
                                            </div>
                                            <script>
                                                $('#cantidad_compra').keyup(function() {
                                                    var stock_actual = $('#stock_actual').val();
                                                    var stock_compra = $('#cantidad_compra').val();

                                                    var total = parseInt(stock_actual) + parseInt(stock_compra);
                                                    $('#stock_total').val(total);
                                                });
                                            </script>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock Actual</label>
                                                <input type="number" id="stock_actual" class="form-control" style="background-color:navajowhite;text-align: center" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock Total</label>
                                                <input type="number" id="stock_total" class="form-control" style="background-color:aqua;text-align: center" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" id="btn_guardar_compra">Guardar Compra</button>
                                        </div>
                                    </div>
                                    <script>
                                        $('#btn_guardar_compra').click(function() {
                                            var id_producto = $('#id_producto').val();
                                            var nro_compra = $('#nro_compra').val();
                                            var fecha_compra = $('#fecha_compra').val();
                                            var id_proveedor = $('#id_proveedor').val();
                                            var comprobante = $('#comprobante').val();
                                            var id_usuario = '<?php echo $id_usuario_sesion; ?>';
                                            var precio_compra = $('#precio_compra_controlador').val();
                                            var cantidad_compra = $('#cantidad_compra').val();
                                            var stock_total = $('#stock_total').val();

                                            if (id_producto == "") {
                                                $('#id_producto').focus();
                                                alert('Complete todos los Campos');
                                            } else if (fecha_compra == "") {
                                                $('#fecha_compra').focus();
                                                $alert('Todos los campos son Obligatorios');
                                            } else if (comprobante == "") {
                                                $('#comprobante').focus();
                                                alert('Complete todos los Campos');
                                            } else if (precio_compra == "") {
                                                $('#precio_compra_controlador').focus();
                                                $alert('Todos los campos son Obligatorios');
                                            } else if (cantidad_compra == "") {
                                                $('#cantidad_compra').focus();
                                                $alert('Todos los campos son Obligatorios');
                                            } else {
                                                var url = "../app/controllers/compras/create.php";
                                                $.get(url, {id_producto:id_producto, nro_compra:nro_compra, fecha_compra:fecha_compra, id_proveedor:id_proveedor, 
                                                    comprobante:comprobante, id_usuario:id_usuario, precio_compra:precio_compra, cantidad_compra:cantidad_compra, stock_total:stock_total}, function(datos) {
                                                    $('#respuesta_create').html(datos);
                                                });
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div id="respuesta_create"></div>
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
    <?php include('../layout/mensajes.php'); ?>
    <?php include('../layout/parte2.php'); ?>

    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                    "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Productos",
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                    "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Proveedores",
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
