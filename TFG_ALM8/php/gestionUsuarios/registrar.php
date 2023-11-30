<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include("../con_db.php");

header('Content-Type: application/json'); // JSON

if (isset($_POST['register'])) {
    if (
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['phone']) >= 1 &&
        strlen($_POST['address']) >= 1 &&
        strlen($_POST['password']) >= 1
    ) {
        // PARA EVITAR SQL INJECTION //CHATGPT
        $name = mysqli_real_escape_string($conex, trim($_POST['name']));
        $email = mysqli_real_escape_string($conex, trim($_POST['email']));
        $phone = mysqli_real_escape_string($conex, trim($_POST['phone']));
        $address = mysqli_real_escape_string($conex, trim($_POST['address']));
        $password = mysqli_real_escape_string($conex, trim($_POST['password']));
        $fecharegistro = date('d / m / y');
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
            $response = ["error" => "La contraseña debe tener minimo 8 caracteres, 1 letra mayúscula y 1 número."];
            echo json_encode($response);
            exit();
        }

        $checkName = "SELECT * FROM usuarios WHERE nombre='$name'";
        $checkNameResult = mysqli_query($conex, $checkName);

        $checkEmail = "SELECT * FROM usuarios WHERE email='$email'";
        $checkEmailResult = mysqli_query($conex, $checkEmail);

        if (mysqli_num_rows($checkNameResult) > 0) {
            // NOMBRE NO DISPONIBLE
            $response = ["error" => "Nombre no disponible"];
        } else if (mysqli_num_rows($checkEmailResult) > 0) {
            // EMAIL NO DISPONIBLE
            $response = ["error" => "Email no disponible"];
        } else {
            $consulta = "INSERT INTO usuarios(nombre, email, telefono, direccion, password, fecharegistro) 
                VALUES ('$name','$email','$phone','$address', '$password' ,'$fecharegistro')";
            $result = mysqli_query($conex, $consulta);

            if ($result) {
                // BIEN
                $response = ["success" => true];
            } else {
                // MAL
                $response = ["error" => "Error en el registro"];
            }
        }
    } else {
        // MUY MAL
        $response = ["error" => "Datos de formulario inválidos"];
    }
    echo json_encode($response);
    exit(); 
    

    
    echo json_encode($response);
}
?>


