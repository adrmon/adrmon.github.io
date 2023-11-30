<?php
session_start();
include("../con_db.php");

header('Content-Type: application/json'); // JSON

if (isset($_SESSION['id'])) {
  $userID = $_SESSION['id'];
  $sql = "SELECT idfactura, idpedido, idcliente, total, fecha
  FROM facturas
  WHERE idcliente = $userID
  GROUP BY idpedido, idcliente
  HAVING total > 0
  ORDER BY idfactura DESC;";

    
  $result = mysqli_query($conex, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $userData = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $userData[] = [
        "idfactura" => $row['idfactura'],
        "idpedido" => $row['idpedido'],
        "idcliente" => $row['idcliente'],
        "total" => $row['total'],
        "fecha" => $row['fecha']
      ];
    }
    $response = [
      "success" => true,
      "data" => $userData
    ];
  } else {
    $response = ["error" => "Usuario no encontrado"];
  }
} else {
  $response = ["error" => "Nadie logeado"];
}

echo json_encode($response);
exit();
?>

