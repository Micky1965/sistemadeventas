<?php

include ('../../config.php');

$id_categoria = $_GET['id_categoria'];

$sentencia = $pdo->prepare("DELETE FROM tb_categorias WHERE id_categoria=:id_categoria ");

$sentencia->bindParam('id_categoria',$id_categoria);

if($sentencia->execute()){
    session_start();

    $_SESSION['mensaje'] = "La categoria fué Eliminada";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}else{
    session_start();
    
    $_SESSION['mensaje'] = "Error al eliminar la categoria";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}