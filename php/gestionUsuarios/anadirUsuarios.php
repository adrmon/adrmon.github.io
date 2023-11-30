<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AÑADIR USUARIOS</title>
</head>
<body>
  <center>
    <form action="guardarUsuarios.php" method="POST" enctype="multipart/form-data">
      <input type="text"  REQUIRED name="nombre" placeholder="Nombre" value=""><br>
      <input type="text" REQUIRED name="email" placeholder="Email" value=""><br>
      <input type="text" REQUIRED name="telefono" placeholder="Telefono" value=""><br>
      <input type="text" REQUIRED name="direccion" placeholder="Direccion" value=""><br>
      <input type="text" REQUIRED name="password" placeholder="Contraseña" value=""><br>
      <input type="text" REQUIRED name="fecharegistro" placeholder="fecha de Registro" value=""><br>
      <input type="submit" value="Aceptar">
    </form>
  </center>
</body>
</html>