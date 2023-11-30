<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INDEX DE IMAGENES</title>
</head>
<body>
<?php
        include("../con_db.php");
        $id = $_REQUEST['id'];
        $query = "SELECT * FROM productos WHERE idproducto ='$id'";
        $resultado = $conex->query($query);
        $row = $resultado->fetch_assoc();
        ?>
  <center>
    <form action="proceso_modificar.php?id=<?php echo $row['idproducto']; ?>" method="POST" enctype="multipart/form-data">
      <input type="text"  REQUIRED name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?> ">
      <input type="text"  REQUIRED name="precio" placeholder="Precio" value="<?php echo $row['precio']; ?> ">
      <input type="text"  REQUIRED name="cantidad" placeholder="Cantidad" value="<?php echo $row['cantidad']; ?> ">
      <input type="text"  REQUIRED name="categoria" placeholder="Categoria" value="<?php echo $row['categoria']; ?> ">
      <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">
      <input type="file" REQUIRED name="imagen">
      <input type="submit" value="Aceptar">
    </form>
  </center>
  
</body>
</html>