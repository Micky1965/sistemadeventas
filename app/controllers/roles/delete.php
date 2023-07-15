<?php

include ('../../config.php');

$id_rol = $_POST['id_rol'];
$rol = $_POST['rol'];

        $sentencia = $pdo->prepare("DELETE FROM tb_roles WHERE id_rol=:id_rol");

        $sentencia->bindParam('id_rol',$id_rol);
        
        if($sentencia->execute()){
            session_start();
            $_SESSION['mensaje'] = "Rol Eliminado";
            $_SESSION['icono'] = "success";
            header('Location: '.$URL.'/roles/');
        }else{
            session_start();
            $_SESSION['mensaje'] = "Error al Eliminar el Rol";
            $_SESSION['icono'] = "error";
            header('Location: '.$URL.'/roles/');
        }
