<?php

include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];
$nombre_proveedor = $_GET['nombre_proveedor'];
$telefono = $_GET['telefono'];
$direccion = $_GET['direccion'];
$email = $_GET['email'];

$sentencia = $pdo->prepare("UPDATE tb_proveedores
    SET nombre_proveedor=:nombre_proveedor, 
        telefono=:telefono, 
        direccion=:direccion, 
        email=:email, 
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_proveedor = :id_proveedor ");

$sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('direccion', $direccion);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_proveedor', $id_proveedor);

if ($sentencia->execute()) {
    
?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Proveedor Actualizado',
            showConfirmButton: false,
            timer: 2500
        })
    </script>

    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
<?php
} else {
    
?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Error al actualizar al Proveedor',
            showConfirmButton: false,
            timer: 2500
        })
    </script>

    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
<?php
}
?>
