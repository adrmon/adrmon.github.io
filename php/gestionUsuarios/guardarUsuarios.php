<?php
// HACE LO MISMO que registar.php PERO ESTA ES PARA QUE...
// EL ADMINISTRADO DE ALTA A CLIENTES
include("../con_db.php");
// GUARDAR UN USUARIO NUEVO
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$password = $_POST['password'];
// PRIVILEGIO DE ADMIN
$fecharegistro = $_POST['fecharegistro'];// FORMAT0: 2023-09-26 

$query = "INSERT INTO usuarios(nombre,email,telefono,direccion,password,fecharegistro) VALUES ('$nombre','$email','$telefono','$direccion','$password','$fecharegistro')";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrarUsuarios.php");
}else{
  echo "ERROR";
}
?>