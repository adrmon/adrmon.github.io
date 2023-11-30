<?php
include("../con_db.php");
//CAMBIAR ALGO DE UN PRODUCTO
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$categoria = $_POST['categoria'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "UPDATE productos SET nombre='$nombre', imagen='$imagen',
precio='$precio',cantidad='$cantidad', categoria='$categoria' WHERE idproducto ='$id'";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrar.php");
}else{
  echo "ERROR";
}
?>