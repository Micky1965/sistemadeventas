<?php

include ('../../config.php');

$n_usuario = $_POST['n_usuario'];
$nombres = $_POST['nombres'];
$rol = $_POST['rol'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];

if($password_user == $password_repeat){
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios
       ( n_usuario, nombres, id_rol, password_user, fyh_creacion) 
VALUES (:n_usuario,:nombres,:id_rol,:password_user,:fyh_creacion)");

    $sentencia->bindParam('n_usuario', $n_usuario);
    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('id_rol', $rol);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = "Usuario registrado con éxito";
    header('Location: '.$URL.'/usuarios/');

}else{
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas NO son iguales";
    header('Location: '.$URL.'/usuarios/create.php');
}
