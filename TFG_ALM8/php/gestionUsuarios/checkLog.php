<?php
// SACAMOS EL NOMBRE PARA iniciarSesion.js
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['nombre'])) {
    $username = $_SESSION['nombre'];
    echo json_encode(["success" => true, "name" => $username]);
} else {
    echo json_encode(["success" => false]);
}
?>

