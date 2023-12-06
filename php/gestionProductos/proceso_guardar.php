<?php
include("../con_db.php");
//GUARDAR UN PRODUCTO NUEVO
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO productos(nombre,precio,cantidad,categoria,imagen) VALUES ('$nombre','$precio','$cantidad','$categoria','$imagen')";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrar.php");
}else{
  echo "ERROR";
}
?>