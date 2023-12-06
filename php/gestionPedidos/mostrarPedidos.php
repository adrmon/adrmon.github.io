<!--ESTA SERA EL INVENTARIO PARA EL ADMINISTRADOR-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MOSTRAR PEDIDOS</title>
</head>
<body>
  <center>
    <table border="2">
    <thead>
        <tr>
        <th>idproducto</th>
        <th>cantidad</th>
        <th>precio</th>
        <th>fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("../con_db.php");
        $query = "SELECT idpedido, idproducto, COUNT(idproducto) AS cantidad, SUM(total) as total, fecha FROM pedidos GROUP BY idproducto";
        $resultado = $conex->query($query);
        while($row = $resultado->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['idproducto'];?></td>
          <td><?php echo $row['cantidad'];?></td>
          <td><?php echo $row['total'];?></td>
          <td><?php echo $row['fecha'];?></td>
          <th><a href="eliminarPedidos.php?id=<?php echo $row['idpedido']; ?>">Eliminar</a></th>
        </tr>
        <?php
        }
        ?>
        <tr>
          <th colspan="10"><a href="../../index.html">Inicio</a></th>
        </tr>
      </tbody>
    </table>
  </center>
  
</body>
</html>