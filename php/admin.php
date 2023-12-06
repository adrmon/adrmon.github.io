<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: ../index.html");
}

$nombre = $_SESSION['nombre'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="icon" type="image/png" href="../images/logo.png">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/otros.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/sesiones/iniciarSesion2.js"></script>
    <script src="../js/sesiones/vaciarCarro.js"></script>
    <script src="../js/temaoscuro.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-s-12 col-m-2 col-l-2">
                <a class="logo" href="../index.html"><img src="../images/logo.png" width="200px" alt="Papeleria"></a>
                <ul id="menu">
                    <li><a href="../index.html">Todos los productos</a></li>
                    <li><a href="../html/productosHTML/papel.html">Folios y cartulinas</a></li>
                    <li><a href="../html/productosHTML/libretas.html">Libretas</a></li>
                    <li><a href="../html/productosHTML/boligrafos.html">Bolígrafos</a></li>
                    <li><a href="../html/productosHTML/lapices.html">Lápices</a></li>
                    <li><a href="../html/productosHTML/rotuladores.html">Rotuladores</a></li>
                    <li><a href="../html/productosHTML/gomasysp.html">Gomas y Sacapuntas</a></li>
                    <li><a href="../html/productosHTML/calculadoras.html">Calculadoras</a></li>
                    <li><a href="../html/productosHTML/informatica.html">Informática</a></li>
                    <li><a href="../html/productosHTML/mochilas.html">Mochilas</a></li>
                </ul>
            </div>
            <div class="col-m-10 col-l-7">
                <h1 class="tittle-products">¡BIENVENID@!</h1>
                <div class="row">
                    <div class="row">
                        <h2>Hola <?php echo $nombre; ?></h2>

                        <?php
                        // OPCIONES DE ADMINISTRADOR
                        if ($nombre === 'admin') {
                            echo '<h1>Opciones de Administrador</h1>';
                            echo '<br>';
                            echo '<a class="log" href="gestionUsuarios/mostrarUsuarios.php">Ver Usuarios</a>';
                            echo '<br>';
                            echo '<br>';
                            echo '<a class="log" href="gestionUsuarios/anadirUsuarios.php">Registrar Usuarios</a>';
                            echo '<br>';
                            echo '<br>';
                            echo '<a class="log" href="gestionProductos/mostrar.php">Ver inventario</a>';
                            echo '<br>';
                            echo '<br>';
                            echo '<a class="log" href="gestionProductos/anadir.php">Añadir un nuevo producto</a>';
                            echo '<br>';
                            echo '<br>';
                            echo '<a class="log" href="gestionPedidos/mostrarPedidos.php">Ver Pedidos</a>';
                            echo '<br>';
                            echo '<br>';
                            
                        }
                        if (empty($nombre)) {
                            echo '<h2>Nombre o contraseña incorrecta</h2>';
                        }                        
                        ?>
                        <a href="cerrarsesion.php" id="cerrarSesion" class="log">Cerrar sesión</a>
                    </div>
                </div>
            </div>
            <div class="col-m-12 col-l-3">
                <aside class="row">
           <!-- CARRITO DE LA COMPRA -->
           <div class="col-xs-3 col-s-3 col-m-3 col-l-12">
            <div id="cartContainer">
              <img src="../images/carrito.png" alt="carrito" width="60">
              <h2>CARRITO</h2>
              <ul id="cartList"></ul>
              <p>Total: <span id="cartTotal">0€</span></p>
              <button id="comprar">Comprar</button>
              <button id="vaciarBoton">Vaciar</button>
            </div>
          </div>
          <!-- FIN CARRITO DE LA COMPRA -->

                    <a href="#" class="col-xs-3 col-s-3 col-m-3 col-l-12">
                        <img src="../images/user.png" alt="cuenta" width="40">
                        <p>Cuenta</p>
                    </a>

                    <a href="../html/tuscompras.html" class="col-xs-3 col-s-3 col-m-3 col-l-12">
                        <img src="../images/fav.png" alt="tuscompras" width="40">
                        <p>Tus compras</p>
                    </a>

                    <a href="../html/ajustes.html" class="col-xs-3 col-s-3 col-m-3 col-l-12">
                        <img src="../images/settings.png" alt="ajustes" width="40">
                        <p>Ajustes</p>
                    </a>

                </aside>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-s-3 icon-footer">
                        <a href="#">
                            <img src="../images/twitter.png" alt="twitter">
                        </a>

                    </div>

                    <div class="col-xs-6 col-s-3 icon-footer">
                        <a href="#">
                            <img src="../images/github.png" alt="github">
                        </a>
                    </div>

                    <div class="col-xs-6 col-s-3 icon-footer">
                        <a href="#">
                            <img src="../images/drive.png" alt="drive">
                        </a>
                    </div>

                    <div class="col-xs-6 col-s-3 icon-footer">
                        <a href="#">
                            <img src="../images/mail.png" alt="mail">
                        </a>
                    </div>

                </div>
                <p>&copy;Adrian Lloria Monterde</p>
            </div>

        </footer>
</body>

</html>