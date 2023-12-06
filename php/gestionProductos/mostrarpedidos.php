<!--ESTA SERA EL INVENTARIO PARA EL ADMINISTRADOR-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar pedidos</title>
</head>
<body>
  <center>
    <table border="2">
      <thead>
        <tr>
        <th>Idpedido</th>
        <th>Idproducto</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Fecha</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("../con_db.php");
        $query = "SELECT * FROM pedidos";
        $resultado = $conex->query($query);
        while($row = $resultado->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $row['idpedido'];?></td>
          <td><?php echo $row['idproducto'];?></td>
          <td><?php echo $row['cantidad'];?></td>
          <td><?php echo $row['total'];?></td>
          <td><?php echo $row['fecha'];?></td>
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