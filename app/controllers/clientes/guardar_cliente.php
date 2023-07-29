<?php

include ('../../config.php');

$nombre_cliente = $_POST['nombre_cliente'];
$dni_cliente = $_POST['dni_cliente'];
$telefono_cliente = $_POST['telefono_cliente'];
$mail_cliente = $_POST['mail_cliente'];
$direccion_cliente = $_POST['direccion_cliente'];

$sentencia = $pdo->prepare("INSERT INTO tb_clientes
       ( nombre_cliente, dni_cliente, telefono_cliente, mail_cliente, direccion_cliente, fyh_creacion) 
VALUES (:nombre_cliente,:dni_cliente,:telefono_cliente,:mail_cliente,:direccion_cliente,:fyh_creacion)");

$sentencia->bindParam('nombre_cliente',$nombre_cliente);
$sentencia->bindParam('dni_cliente',$dni_cliente);
$sentencia->bindParam('telefono_cliente',$telefono_cliente);
$sentencia->bindParam('mail_cliente',$mail_cliente);
$sentencia->bindParam('direccion_cliente',$direccion_cliente);
$sentencia->bindParam('fyh_creacion',$fechaHora);

if($sentencia->execute()){

    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}else{

    session_start();
    $_SESSION['mensaje'] = "Error al registrar al Cliente";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
}

