<?php
//FIXME:NO FUNCIONA BIEN, CREO QUE ES PORQUE LA HE CAGUE HACIENDO LAS TABLAS
session_start();
include("../con_db.php");

if (isset($_SESSION['id'])) {
    $userID = $_SESSION['id'];
    $idcliente = $userID;

    $query2 = "SELECT idpedido, idproducto, cantidad, SUM(total) AS total, fecha FROM pedidos GROUP BY idpedido";
    $resultado2 = $conex->query($query2);

    if ($resultado2) {
        if ($resultado2->num_rows > 0) {
            while ($row = $resultado2->fetch_assoc()) {
                $idpedido = $row['idpedido'];
                $total = $row['total'];
                $fecha = date('d / m / y');

                $checkQuery = "SELECT idpedido FROM facturas WHERE idpedido = '$idpedido'";
                $checkResult = $conex->query($checkQuery);

                if ($checkResult && $checkResult->num_rows > 0) {
                 
                    $query3 = "UPDATE facturas SET total = '$total', fecha = '$fecha' WHERE idpedido = '$idpedido'";
                } else {
                    
                    $query3 = "INSERT INTO facturas(idpedido, idcliente, total, fecha) VALUES ('$idpedido', '$idcliente', '$total', '$fecha')";
                }

                $resultInsert = $conex->query($query3);

                if (!$resultInsert) {
                    echo "Error al insertar/actualizar facturas: " . $conex->error;
                }
            }
        } else {
            echo "No hay resultados";
        }
    } else {
        echo "Error en la consulta: " . $conex->error;
    }
} else {
    $response = ["error" => "Usuario no logeado"];
}
?>





