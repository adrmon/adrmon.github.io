<?php
include("../con_db.php");

$query = "SELECT * FROM productos WHERE categoria ='foliosycartulinas'";
$resultado = $conex->query($query);

$data = array();

while ($row = $resultado->fetch_assoc()) {
    // QUIZA DEBERIA BORRAR LOS CAMBIOS QUE EL CLIENTE NO VA USAR
    $data[] = array(
        'idproducto' => $row['idproducto'],
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'cantidad' => $row['cantidad'],
        'categoria' => $row['categoria'],
        'imagen' => base64_encode($row['imagen']),
        'link_modificar' => 'modificar.php?id=' . $row['idproducto'],
        'link_eliminar' => 'eliminar.php?id=' . $row['idproducto']
    );
}

// USANDO EL FORMATO JSON
header('Content-Type: application/json');

// VARIABLE CON EL JSON
echo json_encode($data);
?>