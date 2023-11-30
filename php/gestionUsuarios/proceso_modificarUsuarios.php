<?php
include("../con_db.php");
//CAMBIAR ALGO DE UN USUARIO
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$password = $_POST['password'];
$fecharegistro = $_POST['fecharegistro'];// FORMAT0: 2023-09-26

$query = "UPDATE usuarios SET nombre='$nombre',
email='$email',telefono='$telefono', direccion='$direccion', password='$password',
fecharegistro ='$fecharegistro' WHERE id ='$id'";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrarUsuarios.php");
}else{
  echo "ERROR";
}
?>