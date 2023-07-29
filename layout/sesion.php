<?php

session_start();
if(isset($_SESSION['sesion_n_usuario'])){
    $n_usuario_sesion = $_SESSION['sesion_n_usuario'];
    $sql = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.n_usuario as n_usuario, rol.rol as rol FROM tb_usuarios as us 
    INNER JOIN tb_roles as rol ON us.id_rol = rol.id_rol WHERE n_usuario = '$n_usuario_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario){
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombres_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
    }
    
}else{
    echo "no existe sesion";
    header('Location: '.$URL.'/login');
}