<?php
include("../con_db.php");

$query = "SELECT * FROM usuarios";
$resultado = $conex->query($query);

$data = array();

while ($row = $resultado->fetch_assoc()) {
    // QUIZA DEBERIA BORRAR LOS CAMBIOS QUE EL CLIENTE NO VA USAR
    $data[] = array(
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'email' => $row['email'],
        'telefono' => $row['telefono'],
        'direccion' => $row['direccion'],
        'password' => $row['password'],
        'fecharegistro' => $row['password']
    );
}

// USANDO EL FORMATO JSON
header('Content-Type: application/json');

// VARIABLE CON EL JSON
echo json_encode($data);
?>