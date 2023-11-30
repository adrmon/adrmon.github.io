<!--ESTA SERA EL INVENTARIO PARA EL ADMINISTRADOR-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar imagenes</title>
</head>
<body>
  <center>
    <table border="2">
      <thead>
        <tr>
          <th colspan="8"><a href="anadir.php">Nuevo</a></th>
        </tr>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Categoria</th>
        <th>Imagen</th>
        <th colspan="2">Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("../con_db.php");
        $query = "SELECT * FROM productos";
        $resultado = $conex->query($query);
        while($row = $resultado->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['idproducto'];?></td>
          <td><?php echo $row['nombre'];?></td>
          <td><?php echo $row['precio'];?></td>
          <td><?php echo $row['cantidad'];?></td>
          <td><?php echo $row['categoria'];?></td>
          <td><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"></td>
          <th><a href="modificar.php?id=<?php echo $row['idproducto']; ?>">Modificar</a></th>
          <th><a href="eliminar.php?id=<?php echo $row['idproducto']; ?>">Eliminar</a></th>
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