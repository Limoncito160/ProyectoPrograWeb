<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
$nombre_producto = $_GET['nombre_producto'];
include("header.php");

// Establecer la conexión con la base de datos
$conn = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verificar si la conexión fue exitosa
if (!$conn) {
	die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Ejecutar una consulta SQL para obtener datos del producto
$resultado = mysqli_query($conn, "SELECT NOMBRE, PRECIO, EXISTENCIA
									FROM PRODUCTOS
									WHERE NOMBRE = '$nombre_producto'");

$sql = mysqli_query($conn, "SELECT NOMBRES FROM USUARIOS WHERE EMAIL = '$correo'");

// Procesar los datos del resultado
while ($fila1 = mysqli_fetch_assoc($resultado)) {
	// Guardar los datos en variables
	$nombre_producto = $fila1["NOMBRE"];
	$precio_producto = $fila1["PRECIO"];
	$existencia_producto = $fila1["EXISTENCIA"];
	// ...y así sucesivamente para cada columna de la tabla
}

while ($fila2 = mysqli_fetch_assoc($sql)){
    $nombre_usuario = $fila2['NOMBRES'];
}


//Código para llenar la tabla temporal de carrito
if (!isset($_SESSION['temp_table'])) {
	$_SESSION['temp_table'] = array();
}

if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$tipo = $_POST['tipo'];
	// Agregar el nuevo dato al arreglo del usuario correspondiente
	$_SESSION['temp_table'][$correo][] = array('nombre' => $nombre, 'apellido' => $apellido, 'tipo' => $tipo);
}

if (isset($_POST['limpiar'])) {
	// Limpiar sólo la tabla temporal del usuario correspondiente
	unset($_SESSION['temp_table'][$correo]);
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Formulario para agregar a tabla temporal</title>
	<style>
		body {
			background-color: #E0FFFF;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.column {
			flex-basis: 50%;
			padding: 20px;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			text-align: left;
			padding: 8px;
			border: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>
	<div class="column" style="background-color: #ADD8E6">
		<h1 style="text-align:center;"><strong>Revisar datos del articulo</strong></h1>
		<form method="POST" action="" style="margin: 20px;">

			<label style="display: block; margin-bottom: 10px;">Nombre:</label>
			<input type="text" name="nombre" style="margin-bottom: 10px;" size="30" value="<?php echo $nombre_producto ?>" readonly><br>

			<label style="display: block; margin-bottom: 10px;">Precio:</label>
			<input type="text" name="apellido" style="margin-bottom: 10px;" size="30" value="<?php echo $precio_producto?>" readonly><br>

			<label style="display: block; margin-bottom: 10px;">Cantidad en stock:</label>
			<input type="text" name="stock" style="margin-bottom: 10px;" size="30" value="<?php echo $existencia_producto?>" readonly><br>

			<label style="display: block; margin-bottom: 10px;">Cantidad a pedir:</label>
			<select name="tipo" style="margin-bottom: 10px; height: 30px;">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select><br>

			<input type="submit" name="submit" value="Agregar">
			<input type="submit" name="limpiar" value="Limpiar">

		</form>
	</div>
	<div class="column" style="background-color: #ADD8E6">
		<h1 style="text-align:center;"><strong>Carrito de
				<?php echo $nombre_usuario ?>
			</strong></h1>
			<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($_SESSION['temp_table'][$correo]) && count($_SESSION['temp_table'][$correo]) > 0): ?>
            <?php foreach ($_SESSION['temp_table'][$correo] as $row): ?>
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
        <?php else: ?>
            <tr>
                <td colspan="3">No tienes artículos en tu carrito</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

	</div>
</body>
<?php

echo $nombre_producto . "<br/>";
echo $precio_producto . "<br/>";
echo $existencia_producto . "<br/>";


?>

</html>