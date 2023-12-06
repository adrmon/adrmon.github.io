<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MODIFICAR USUARIOS</title>
</head>
<body>
<?php
        include("../con_db.php");
        $id = $_REQUEST['id'];
        $query = "SELECT * FROM usuarios WHERE id ='$id'";
        $resultado = $conex->query($query);
        $row = $resultado->fetch_assoc();
        ?>
  <center>
    <form action="proceso_modificarUsuarios.php?id=<?php echo $row['id']; ?>" method="POST">
      <input type="text"  REQUIRED name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?> ">
      <input type="text"  REQUIRED name="email" placeholder="Email" value="<?php echo $row['email']; ?> ">
      <input type="text"  REQUIRED name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?> ">
      <input type="text"  REQUIRED name="direccion" placeholder="Direccion" value="<?php echo $row['direccion']; ?> ">
      <input type="text"  REQUIRED name="password" placeholder="Password" value="<?php echo $row['password']; ?> ">
      <input type="text"  REQUIRED name="fecharegistro" placeholder="Fecha de Registro" value="<?php echo $row['fecharegistro']; ?> ">
      <input type="submit" value="Aceptar">
    </form>
  </center>
  
</body>
</html>