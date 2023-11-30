<?php
// PARAMETROS GENERALES
$servidor = "127.0.0.1"; // "localhost"
$usuario_bd = "root"; // USUARIO ADMIN MySQL (VIENE POR DEFECTO)
$clave_bd = ""; // CONTRASEÑA DE ADMIN MySQL (NO TENGO)
$basedatos = "papeleria";
//PODRIA CAMBIAR ESTO POR INCLUDE
$tabla = "usuarios";
$tabla2 = "productos";
$tabla3 = "pedidos";
$tabla4 = "facturas";


// DUDAS CON LAS TABLAS

$sql_crearbasedatos = "CREATE DATABASE $basedatos";

$sql_creartabla = "CREATE TABLE $tabla(";
$sql_creartabla .= "id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,";
$sql_creartabla .= "nombre VARCHAR(50) NOT NULL,";
$sql_creartabla .= "email VARCHAR(50) NOT NULL,";
$sql_creartabla .= "telefono VARCHAR(15) NOT NULL,";
$sql_creartabla .= "direccion VARCHAR(100)NOT NULL,";
$sql_creartabla .= "password VARCHAR(20) NOT NULL,";
$sql_creartabla .= "fecharegistro VARCHAR(15) NOT NULL";
$sql_creartabla .= ");";



$sql_creartabla2 = "CREATE TABLE $tabla2(";
$sql_creartabla2 .= "idproducto INT AUTO_INCREMENT PRIMARY KEY NOT NULL,";
$sql_creartabla2 .= "nombre VARCHAR(50) NOT NULL,";
$sql_creartabla2 .= "precio DECIMAL(10, 2) NOT NULL,";
$sql_creartabla2 .= "cantidad INT NOT NULL,";
$sql_creartabla2 .= "categoria VARCHAR(100) NOT NULL,";
$sql_creartabla2 .= "imagen longblob";
$sql_creartabla2 .= ");";


$sql_creartabla3 = "CREATE TABLE $tabla3 (";
$sql_creartabla3 .= "idpedido INT AUTO_INCREMENT PRIMARY KEY NOT NULL,";
$sql_creartabla3 .= "idproducto INT DEFAULT NULL,";
$sql_creartabla3 .= "cantidad INT NOT NULL,";
$sql_creartabla3 .= "total DECIMAL(10, 2) NOT NULL,";
$sql_creartabla3 .= "fecha VARCHAR(15) NOT NULL,";
$sql_creartabla3 .= "FOREIGN KEY (idproducto) REFERENCES $tabla2(idproducto) ON DELETE SET NULL ON UPDATE SET NULL";
$sql_creartabla3 .= ");";



$sql_creartabla4 = "CREATE TABLE $tabla4 (";
$sql_creartabla4 .= "idfactura INT AUTO_INCREMENT PRIMARY KEY NOT NULL,";
$sql_creartabla4 .= "idpedido INT DEFAULT NULL,";
$sql_creartabla4 .= "idcliente INT DEFAULT NULL,";
$sql_creartabla4 .= "total DECIMAL(10, 2) NOT NULL,";
$sql_creartabla4 .= "fecha VARCHAR(15) NOT NULL,";
$sql_creartabla4 .= "FOREIGN KEY (idpedido) REFERENCES $tabla3(idpedido) ON DELETE SET NULL ON UPDATE SET NULL,";
$sql_creartabla4 .= "FOREIGN KEY (idcliente) REFERENCES $tabla(id) ON DELETE SET NULL ON UPDATE SET NULL";
$sql_creartabla4 .= ");";




// USUARIOS
$sql_insertarregistros = "INSERT INTO $tabla VALUES ";
$sql_insertarregistros .= "('1', 'admin', 'admin@example.com', '000000000','X', 'admin', '2023-11-01'),";
$sql_insertarregistros .= "('2', 'Prueba','Prueba@example.com', '100100100', 'USA', 'Prueba', '2023-11-01')";


$conexion = mysqli_connect($servidor, $usuario_bd, $clave_bd);
if (!$conexion) {
	echo "ERROR: Imposible establecer conexión con el servidor (puede que está desactivado o que no se encuentre en el servidor $servidor).<br>\n";
} else {
	// CONEXION CON EL SERVER OK
	echo "Conexion realizada con el servidor.<br>\n";

	// CREAR LA BASE DE DATOS:
	$resultado = mysqli_query($conexion, $sql_crearbasedatos);
	if (!$resultado) {
		echo "ERROR: Imposible crear base de datos $basedatos (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
	} else {
		echo "Base de datos $basedatos creada.<br>\n";
	}

	// SELECCIONAR LA BASE DE DATOS:
	$resultado = mysqli_select_db($conexion, $basedatos);
	if (!$resultado) {
		echo "ERROR: Imposible seleccionar la base de datos $basedatos (puede que no exista o que no se tenga permiso para usarla).<br>\n";
	} else {
		// MUESTRA QUE SE HA SELECCIONADO LA BASE DATOS BIEN
		echo "Base de datos $basedatos seleccionada.<br>\n";

		// CREAR TABLA 1:
		$resultado = mysqli_query($conexion, $sql_creartabla);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		} else {
			echo "Tabla $tabla creada.<br>\n";
		}


		// CREAR TABLA 2:
		$resultado = mysqli_query($conexion, $sql_creartabla2);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla2 (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		} else {
			echo "Tabla $tabla2 creada.<br>\n";
		}

		// CREAR TABLA 3:
		$resultado = mysqli_query($conexion, $sql_creartabla3);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla3 (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		} else {
			echo "Tabla $tabla3 creada.<br>\n";
		}

		// CREAR TABLA 4:
		$resultado = mysqli_query($conexion, $sql_creartabla4);
		if (!$resultado) {
			echo "ERROR: Imposible crear la tabla $tabla4 (puede que ya exista o que no se tenga permiso para crearla).<br>\n";
		} else {
			echo "Tabla $tabla4 creada.<br>\n";
		}

		// INSERTAR REGISTROS EN TABLA 1:
		$resultado = mysqli_query($conexion, $sql_insertarregistros);
		if (!$resultado) {
			echo "ERROR: Imposible insertar registros iniciales en tabla $tabla (puede que ya existan esos registros o que no se tengan los permisos).<br>\n";
		} else {
			echo "Registros iniciales insertados satisfactoriamente en la Tabla $tabla.<br>\n";
		}

		// INSERTAR IMAGENES
		$productData = array(
			array("Boli azul", 0.50, 100, "boligrafos", 'papeleria/boliazul.jpg'),
			array("Boli negro", 0.50, 100, "boligrafos", 'papeleria/bolinegro.jpg'),
			array("Boli rojo", 0.50, 100, "boligrafos", 'papeleria/bolirojo.jpg'),
			array("Boli verde", 0.50, 100, "boligrafos", 'papeleria/boliverde.jpg'),
			array("Calculadora", 3, 4, "calculadoras", 'papeleria/calculadora.jpg'),
			array("Cartulinas", 2.50, 100, "foliosycartulinas", 'papeleria/cartulinas.jpg'),
			array("Disco externo 1TB", 15, 10, "informatica", 'papeleria/discoexterno1tb.jpg'),
			array("Folios A4", 2, 100, "foliosycartulinas", 'papeleria/foliosA4.jpg'),
			array("Folios de colores", 1, 100, "foliosycartulinas", 'papeleria/folioscolores.jpg'),
			array("Goma blanca", 0.20, 100, "gomasysp", 'papeleria/gomaborrar.jpg'),
			array("Goma rosa", 0.20, 100, "gomasysp", 'papeleria/gomaborrarrosa.jpg'),
			array("Goma blanca", 0.20, 100, "gomasysp", 'papeleria/gomaborrar.jpg'),
			array("Lápices de colores", 0.20, 100, "lapices", 'papeleria/lapicescolores.jpg'),
			array("Lápiz", 0.20, 100, "lapices", 'papeleria/lapiz.jpg'),
			array("Libreta amarilla", 2, 100, "libretas", 'papeleria/libretaamarilla.jpg'),
			array("Libreta morada", 2, 100, "libretas", 'papeleria/libretamorada.jpg'),
			array("Libreta naranja", 2, 100, "libretas", 'papeleria/libretanaranja.jpg'),
			array("Libreta negra", 2, 100, "libretas", 'papeleria/libretanegra.jpg'),
			array("Libreta roja", 2, 100, "libretas", 'papeleria/libretaroja.jpg'),
			array("Libreta rosa", 2, 100, "libretas", 'papeleria/libretarosa.jpg'),
			array("Libreta verde", 2, 100, "libretas", 'papeleria/libretaverde.jpg'),
			array("Libreta azul", 2, 100, "libretas", 'papeleria/libretaazul.jpg'),
			array("Mochila azul", 10, 20, "mochilas", 'papeleria/mochilaazul.jpg'),
			array("Mochila roja", 10, 20, "mochilas", 'papeleria/mochilaroja.jpg'),
			array("Mochila rosa", 10, 20, "mochilas", 'papeleria/mochilarosa.jpg'),
			array("Mochila verde", 10, 20, "mochilas", 'papeleria/mochilaverde.jpg'),
			array("Pack boligrafos", 3, 20, "boligrafos", 'papeleria/packbolis.jpg'),
			array("Pack rotuladores", 5, 20, "rotuladores", 'papeleria/packrotuladores.jpg'),
			array("Pack sacapuntas", 1.50, 10, "gomasysp", 'papeleria/packsacapuntascolores.jpg'),
			array("Plastelina", 5, 20, "manualidades", 'papeleria/plastelina.jpg'),
			array("Portaminas", 0.50, 15, "lapices", 'papeleria/portaminas.jpg'),
			array("Rotulador negro", 1, 20, "rotuladores", 'papeleria/rotunegronormal.jpg'),
			array("Rotulador permanente", 2, 20, "rotuladores", 'papeleria/rotunegropermanente.jpg'),
			array("Sacapuntas de metal", 2.50, 20, "gomasysp", 'papeleria/sacapuntasmetal.jpg'),
			array("Tijeras", 2.50, 20, "tijeras", 'papeleria/tijeras.jpg'),
			array("USB 8GB", 2, 20, "informatica", 'papeleria/usb8gb.jpg'),
			array("USB 16GB", 4, 20, "informatica", 'papeleria/usb.jpg'),
			array("USB 32GB", 8, 20, "informatica", 'papeleria/usb32gb.jpg'),
			// MAS PRODUCTOS
		);

		foreach ($productData as $data) {
			$nombre = $data[0];
			$precio = $data[1];
			$cantidad = $data[2];
			$categoria = $data[3];
			$imagen_path = $data[4];

			$formatted_price = number_format($precio, 2);

			$imagen = file_get_contents($imagen_path);

			if ($imagen !== false) {
				// INTERROGANTES OARA HOLDEAR
				$sql_insert = "INSERT INTO $tabla2 (nombre, precio, cantidad, categoria, imagen) VALUES (?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($conexion, $sql_insert);
				mysqli_stmt_bind_param($stmt, "ssdss", $nombre, $formatted_price, $cantidad, $categoria, $imagen);

				$result = mysqli_stmt_execute($stmt);
		
				mysqli_stmt_close($stmt);
		
				if ($result) {
					echo "Imagen '$nombre' insertada con precio: $formatted_price.<br>";
				} else {
					echo "Error '$nombre': " . mysqli_error($conexion) . "<br>";
				}
			} else {
				echo "Error con el archivo '$nombre'.<br>";
			}
		}
		
		// CERRAMOS CONEXION CON LA BASE DE DATOS.
		echo "Cerrando la conexion con el servidor...<br>\n";
		mysqli_close($conexion);
	}

	echo "Fin del programa.<br>\n";
}
