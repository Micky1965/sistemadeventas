<?php

$sql_ventas = "SELECT *, cli.nombre_cliente as nombre_cliente  FROM tb_ventas as ven 
               INNER JOIN tb_clientes as cli on ven.id_cliente = cli.id_cliente WHERE ven.id_venta = '$id_venta_get' ";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($ventas_datos as $ventas_dato) {
    $nro_venta = $ventas_dato['nro_venta'];
    $id_cliente = $ventas_dato['id_cliente'];
}