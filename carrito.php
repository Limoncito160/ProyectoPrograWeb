<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
$nombre_producto = $_POST["nombre_producto"];
include("header.php");

if (!isset($_SESSION['temp_table'])) {
	$_SESSION['temp_table'] = array();
}

if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$tipo = $_POST['tipo'];
	$data = array('nombre' => $nombre, 'apellido' => $apellido, 'tipo' => $tipo);
	array_push($_SESSION['temp_table'], $data);
}

if (isset($_POST['limpiar'])) {
	$_SESSION['temp_table'] = array();
}

// Establecer la conexión con la base de datos
$conn = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verificar si la conexión fue exitosa
if (!$conn) {
	die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Ejecutar una consulta SQL para obtener datos del usuario
$resultado = mysqli_query($conn, "SELECT ID_USUARIO, NOMBRES FROM USUARIOS WHERE EMAIL = '$correo'");

// Procesar los datos del resultado
while ($fila = mysqli_fetch_assoc($resultado)) {
	// Guardar los datos en variables
	$id_usuario = $fila["ID_USUARIO"];
	$nombre_usuario = $fila["NOMBRES"];
}

$sql1 = mysqli_query($conn, "SELECT NOMBRE, EXISTENCIA, PRECIO FROM PRODUCTOS WHERE NOMBRE = '$nombre_producto';");

// Procesar los datos del resultado
while ($fila1 = mysqli_fetch_assoc($sql1)) {
	//Guardar los datos en variables
	$stock = $fila1['EXISTENCIA'];
	$precio = $fila1['PRECIO'];
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Carrito de compras</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
		}

		.container {
			background-color: #34749E;
			color: #fff;
			padding: 20px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: black;
			color: #fff;
		}

		form {
			margin-bottom: 20px;
		}

		input[type="text"],
		select {
			padding: 8px;
			border-radius: 5px;
			border: none;
			margin-bottom: 10px;
			color: black;
		}

		input[type="submit1"] {
			background-color: black;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}

		input[type="submit1"]:hover {
			background-color: #003459;
		}

		h1,
		h2 {
			margin-top: 0;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1 style="text-align:center;">Carrito de compras de
			<?php echo $nombre_usuario ?>
		</h1>
		<form method="POST" action="">
			<h3><strong>Nombre del articulo: </strong>
				<?php echo $nombre_producto ?>
			</h3>
			<h3><strong>Cantidad en stock: </strong>
				<?php echo $stock ?>
			</h3>
			<h3><strong>Precio: </strong>$
				<?php echo $precio ?> MXN
			</h3>
			<label>Cantidad a pedir:</label><br>
			<select name="cantidad">
				<?php
				for ($i = 1; $i <= $stock; $i++) {
					echo '<option value="' . $i . '">' . $i . '</option>';
				}
				?>
			</select><br>

			<input type="submit1" name="submit" value="Agregar">
			<input type="submit1" name="limpiar" value="Limpiar">
		</form>
		<h2>Tabla temporal</h2>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Tipo</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($_SESSION['temp_table'] as $row): ?>
					<tr>
						<td>
							<?php echo $row['nombre']; ?>
						</td>
						<td>
							<?php echo $row['apellido']; ?>
						</td>
						<td>
							<?php echo $row['tipo']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
		
	</div>

</body>

</html>