<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');
include ('../app/controllers/compras/listado_de_compras.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Compras</h1>
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
                            <h3 class="card-title">Compras Registradas</h3>
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
                                       <th><center>Nro de Compra</center></th>
                                       <th><center>Producto</center></th>
                                       <th><center>Cantidad</center></th>
                                       <th><center>Precio compra</center></th>
                                       <th><center>Fecha compra</center></th>
                                       <th><center>Proveedor</center></th>
                                       <th><center>Comprobante</center></th>
                                       <th><center>Usuario</center></th>
                                       <th><center>Acciones</center></th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <?php
                                   $contador = 0;
                                   foreach ($compras_datos as $compras_dato){
                                       $id_compra = $compras_dato['id_compra']; ?>
                                       <tr>
                                            <td><?php echo $contador = $contador + 1;?></td>
                                            <td><?php echo $compras_dato['nro_compra'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" 
                                                        data-target="#modal-producto<?php echo $id_compra;?>">
                                                        <?php echo $compras_dato['nombre_producto'];?>
                                                </button>

                                                <!-- Modal para ver datos de los productos -->
                                                <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #07b0d6;color: white">
                                                                        <h4 class="modal-title">Datos del Producto</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-md-2">
                                                                                <div class="formgroup">
                                                                                    <label for="">Código</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['codigo'];?>" class= "form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-2">
                                                                                <div class="formgroup">
                                                                                    <label for="">Descripción</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['descripcion'];?>" class= "form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-2">
                                                                                <div class="formgroup">
                                                                                    <label for="">Stock</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['stock'];?>" class= "form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-2">
                                                                                <div class="formgroup">
                                                                                    <label for="">Precio Compra</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['precio_compra_producto'];?>" class= "form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-2">
                                                                                <div class="formgroup">
                                                                                    <label for="">Precio Venta</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['precio_venta_producto'];?>" class= "form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-2">
                                                                                <div class="formgroup">
                                                                                    <label for="">Categoría</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['nombre_categoria'];?>" class= "form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                            </td>
                                            <td><?php echo $compras_dato['cantidad'];?></td>
                                            <td><?php echo $compras_dato['precio_compra'];?></td>
                                            <td><?php echo $compras_dato['fecha_compra'];?></td>
                                            <td><?php echo $compras_dato['nombre_proveedor'];?></td>
                                            <td><?php echo $compras_dato['comprobante'];?></td>
                                            <td><?php echo $compras_dato['n_usuario_pro'];?></td>
                                            
                                           <td>
                                               <center>
                                                   <div class="btn-group">
                                                       <a href="show.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                                                       <a href="update.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                       <a href="delete.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                                                   </div>
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


<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 compras",
                "infoFiltered": "(Filtrado de _MAX_ total compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ compras",
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
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
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
