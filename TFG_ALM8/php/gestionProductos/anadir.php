<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AÑADIR PRODUCTOS</title>
</head>
<body>
  <center>
    <form action="proceso_guardar.php" method="POST" enctype="multipart/form-data">
      <input type="text"  REQUIRED name="nombre" placeholder="Nombre" value=""><br>
      <input type="number" REQUIRED name="precio" placeholder="Precio" value=""><br>
      <input type="number" REQUIRED name="cantidad" placeholder="Cantidad" value=""><br>
      <input type="text" REQUIRED name="categoria" placeholder="Categoria" value=""><br>
      <input type="file" REQUIRED name="imagen"><br>
      <input type="submit" value="Aceptar">
    </form>
  </center>
</body>
</html>