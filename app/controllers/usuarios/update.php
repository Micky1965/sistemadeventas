<?php

include ('../../config.php');

$n_usuario = $_POST['n_usuario'];
$nombres = $_POST['nombres'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['rol'];

if($password_user == ""){
    if ($password_user == $password_repeat){
        $sentencia = $pdo->prepare("UPDATE tb_usuarios
    SET n_usuario=:n_usuario,
        nombres=:nombres,
        id_rol=:id_rol,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_usuario = :id_usuario ");

        $sentencia->bindParam('n_usuario',$n_usuario);
        $sentencia->bindParam('nombres',$nombres);
        $sentencia->bindParam('id_rol',$rol);
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam('id_usuario',$id_usuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario Actualizado";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios/');

    }else{
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas NO son iguales";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }

}else{
    if ($password_user == $password_repeat){
        $sentencia = $pdo->prepare("UPDATE tb_usuarios
    SET n_usuario=:n_usuario,
        nombres=:nombres,
        id_rol=:id_rol,
        password_user=:password_user,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_usuario = :id_usuario ");

        $sentencia->bindParam('n_usuario',$n_usuario);
        $sentencia->bindParam('nombres',$nombres);
        $sentencia->bindParam('id_rol',$rol);
        $sentencia->bindParam('password_user',$password_user);
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam('id_usuario',$id_usuario);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario Actualizado";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/usuarios/');

    }else{
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas NO son iguales";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }

}