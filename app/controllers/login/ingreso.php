<?php

include('../../config.php');

$n_usuario = $_POST['n_usuario'];
$password_user = $_POST['password_user'];

$contador = 0;
$sql = "SELECT * FROM tb_usuarios WHERE n_usuario = '$n_usuario' AND password_user = '$password_user';";
$query = $pdo->prepare($sql);
$query->execute();
$usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($usuarios as $usuario){
    $contador = $contador + 1;
    $n_usuario_tabla = $usuario['n_usuario'];
    $nombres = $usuario['nombres'];
    $password_user_tabla = $usuario['password_user'];
}

if( ($contador > 0) ) {
    echo "Datos correctos";
    session_start();
    $_SESSION['sesion_n_usuario'] = $n_usuario;
    header('Location: '.$URL.'/index.php');

}else{
    session_start();
    $_SESSION['mensaje'] = "Datos incorrectos";
    header('Location: '.$URL.'/login');
}