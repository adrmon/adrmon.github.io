<?php
include("../con_db.php");

$id = $_REQUEST['id'];
//ELIMINAR UN PEDIDO
$query = "DELETE FROM pedidos WHERE idpedido ='$id'";
$resultado = $conex->query($query);

if($resultado){
  header("location:mostrarPedidos.php");
 
}else{
  echo "ERROR";
}
?>