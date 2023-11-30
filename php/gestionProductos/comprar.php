<?php
include("../con_db.php");

$json = file_get_contents('php://input');
$cartItems = json_decode($json, true);

$fecha = date('d / m / y');

foreach ($cartItems as $item) {
    $idproducto = $item['idproducto'];
    $cantidad = 1; 
    $total = $item['precio']; 

    $query = "INSERT INTO pedidos(idproducto, cantidad, total, fecha) VALUES ('$idproducto', '$cantidad', '$total', '$fecha')";
    $resultado = $conex->query($query);
    
    if (!$resultado) {
        echo "Error";
        exit;
    }
}

echo json_encode(['success' => true]);
?>