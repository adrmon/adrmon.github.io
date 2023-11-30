<?php
session_start();
include("../con_db.php");

header('Content-Type: application/json'); // JSON

if (isset($_SESSION['id'])) {
    $userID = $_SESSION['id'];

    $sql = "SELECT * FROM usuarios WHERE id = $userID";
    $result = mysqli_query($conex, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        $userData = mysqli_fetch_assoc($result);
        $response = [
            "success" => true,
            "id" => $userData['id'],
            "nombre" => $userData['nombre'],
            "email" => $userData['email'],
            "phone" => $userData['telefono'],
            "address" => $userData['direccion']
        ];
    } else {
        $response = ["error" => "User not found"];
    }
} else {
    $response = ["error" => "User not logged in"];
}

echo json_encode($response);
exit();
?>

