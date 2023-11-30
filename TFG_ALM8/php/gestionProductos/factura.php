<?php
include("../con_db.php");

$json = file_get_contents('php://input');
$cartItems = json_decode($json, true);

$fecha = date('d / m / y');



    $query = "INSERT INTO factura(total, fecha) VALUES ('6', '$fecha')";
    $resultado = $conex->query($query);
    

    if (!$resultado) {
        echo "Error inserting order details";
        exit;
    }


echo json_encode(['success' => true]);
?>