<?php
include("../con_db.php");

$id = $_REQUEST['id'];
//ELIMINAR UN PRODUCTO
$query = "DELETE FROM usuarios WHERE id ='$id'";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrarUsuarios.php");
 
}else{
  echo "ERROR";
}
?>