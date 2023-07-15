<?php

include ('../../config.php');

$nombre_proveedor = $_GET['nombre_proveedor'];
$telefono = $_GET['telefono'];
$direccion = $_GET['direccion'];
$email = $_GET['email'];

$sentencia = $pdo->prepare("INSERT INTO tb_proveedores
       ( nombre_proveedor, telefono, direccion, email, fyh_creacion) 
VALUES (:nombre_proveedor,:telefono,:direccion,:email,:fyh_creacion)");

$sentencia->bindParam('nombre_proveedor', $nombre_proveedor);
$sentencia->bindParam('telefono', $telefono);
$sentencia->bindParam('direccion', $direccion);
$sentencia->bindParam('email', $email);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Proveedor Registrado";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error al registrar el Proveedor";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}
