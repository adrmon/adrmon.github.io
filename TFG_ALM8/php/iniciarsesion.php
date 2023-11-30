<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include("con_db.php");

header('Content-Type: application/json'); // JSON

if (isset($_POST['login'])) {
    if (
        isset($_POST['name']) &&
        isset($_POST['password']) &&
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        // PARA EVITAR SQL INJECTION
        $name = mysqli_real_escape_string($conex, trim($_POST['name']));
        $password = mysqli_real_escape_string($conex, trim($_POST['password']));

        $sql = "SELECT * FROM usuarios WHERE BINARY nombre = '$name' AND password = '$password'";
        $result = mysqli_query($conex, $sql);

        if (mysqli_num_rows($result) == 1) {
            // OK VAMOS A LA PAGINA DE BIENVENIDA
            $userData = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $userData['id'];
            $_SESSION['nombre'] = $name;
            $response = ["success" => true];
        } else {
            // ALGO FUE MAL
            $response = ["error" => "Nombre o contraseña incorrecta"];
        }
    } else {
        // MUY MAL
        $response = ["error" => "Datos de formulario inválidos"];
    }

    echo json_encode($response);
    exit();
    
}
?>
