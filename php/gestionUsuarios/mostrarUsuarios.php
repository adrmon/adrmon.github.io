<!--ESTA SERA EL INVENTARIO PARA EL ADMINISTRADOR-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MOSTRAR USUARIOS</title>
</head>
<body>
  <center>
    <table border="2">
      <thead>
        <tr>
          <th colspan="10"><a href="anadirUsuarios.php">Nuevo</a></th>
        </tr>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Telefono</th>
        <th>Direccion</th>
        <th>Contraseña</th>
        <th>Fecha de registro</th>
        <th colspan="2">Operaciones</th>
        </tr>
      
      </thead>
      <tbody>
        <?php
        include("../con_db.php");
        $query = "SELECT * FROM usuarios";
        $resultado = $conex->query($query);
        while($row = $resultado->fetch_assoc()){
        ?>
        <tr>
          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['nombre'];?></td>
          <td><?php echo $row['email'];?></td>
          <td><?php echo $row['telefono'];?></td>
          <td><?php echo $row['direccion'];?></td>
          <td><?php echo $row['password'];?></td>
          <td><?php echo $row['fecharegistro'];?></td>
          <th><a href="modificarUsuarios.php?id=<?php echo $row['id']; ?>">Modificar</a></th>
          <th><a href="eliminarUsuarios.php?id=<?php echo $row['id']; ?>">Eliminar</a></th>
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