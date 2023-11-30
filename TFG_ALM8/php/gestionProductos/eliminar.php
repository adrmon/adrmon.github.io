<?php
include("../con_db.php");

$id = $_REQUEST['id'];
//ELIMINAR UN PRODUCTO
$query = "DELETE FROM productos WHERE idproducto ='$id'";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrar.php");
 
}else{
  echo "ERROR";
}
?>