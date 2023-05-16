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

while ($fila2 = mysqli_fetch_assoc($sql)) {
	$nombre_usuario = $fila2['NOMBRES'];
}


//Código para llenar la tabla temporal de carrito
if (!isset($_SESSION['temp_table'])) {
	$_SESSION['temp_table'] = array();
}

if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$cantidad_solicitad = $_POST['cantidad_solicitada'];
	// Agregar el nuevo dato al arreglo del usuario correspondiente
	$_SESSION['temp_table'][$correo][] = array('nombre' => $nombre, 'precio' => $precio, 'cantidad_solicitada' => $cantidad_solicitad);
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
			<input type="text" name="nombre" style="margin-bottom: 10px;" size="30"
				value="<?php echo $nombre_producto ?>" readonly><br>

			<label style="display: block; margin-bottom: 10px;">Precio:</label>
			<input type="text" name="precio" style="margin-bottom: 10px;" size="30"
				value="<?php echo $precio_producto ?>" readonly><br>

			<label style="display: block; margin-bottom: 10px;">Cantidad en stock:</label>
			<input type="text" name="stock" style="margin-bottom: 10px;" size="30"
				value="<?php echo $existencia_producto ?>" readonly><br>

			<label style="display: block; margin-bottom: 10px;">Cantidad a pedir:</label>
			<select name="cantidad_solicitada" style="margin-bottom: 10px; height: 30px;">
				<?php for ($i = 1; $i <= $existencia_producto; $i++): ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php endfor; ?>
			</select><br>


			<input type="submit" name="submit" value="Agregar al carrito">
			<input type="submit" name="limpiar" value="Limpiar carrito">

		</form>
	</div>
	<div class="column" style="background-color: #ADD8E6">
		<h1 style="text-align:center;"><strong>Carrito de
				<?php echo $nombre_usuario ?>
			</strong></h1>
		<?php
		$total_precio = 0; // variable para almacenar la suma total de precios
		$total_cantidad = 0; // variable para almacenar la suma total de cantidad solicitada
		
		if (isset($_SESSION['temp_table'][$correo]) && count($_SESSION['temp_table'][$correo]) > 0) {
			foreach ($_SESSION['temp_table'][$correo] as $row) {
				$total_precio += $row['precio'] * $row['cantidad_solicitada']; // suma total de precios
				$total_cantidad += $row['cantidad_solicitada']; // suma total de cantidad solicitada
			}
		}
		?>

		<table>
			<thead>
				<tr>
					<th>Articulo</th>
					<th>Total</th>
					<th>Cantidad solicitada</th>
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
								<?php echo "$" . ($row['precio'] * $row['cantidad_solicitada']) . " MXN"; ?>
							</td>
							<td>
								<?php echo $row['cantidad_solicitada']; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php else: ?>
					<tr>
						<td colspan="3">No tienes artículos en tu carrito</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table><br>

		<?php
		$total_precio = 0;
		$total_cantidad = 0;

		if (isset($_SESSION['temp_table'][$correo]) && count($_SESSION['temp_table'][$correo]) > 0) {
			foreach ($_SESSION['temp_table'][$correo] as $row) {
				$total_precio += ($row['precio'] * $row['cantidad_solicitada']);
				$total_cantidad += $row['cantidad_solicitada'];
			}
		}

		echo "Total de precios: $" . $total_precio . " MXN<br>";
		echo "Total de cantidades: " . $total_cantidad;
		if ($total_cantidad == 0) {
			echo " (Ningún artículo en tu carrito)";
		}
		?>


		<br><br>

		<div class="row mb-3">
			<div class="offset-sm-3 col-sm-3 d-grid">
				<form action="procesar_carrito.php" method="POST">
					<input type="hidden" name="correo" value="<?php echo $correo; ?>">
					<input type="hidden" name="total_precio" value="<?php echo $total_precio; ?>">
					<input type="hidden" name="total_cantidad" value="<?php echo $total_cantidad; ?>">
					<?php if (isset($_SESSION['temp_table'][$correo]) && count($_SESSION['temp_table'][$correo]) > 0): ?>
						<?php foreach ($_SESSION['temp_table'][$correo] as $row): ?>
							<input type="hidden" name="id_articulo[]" value="<?php echo $row['id_articulo']; ?>">
							<input type="hidden" name="nombre[]" value="<?php echo $row['nombre']; ?>">
							<input type="hidden" name="precio[]" value="<?php echo $row['precio']; ?>">
							<input type="hidden" name="cantidad_solicitada[]"
								value="<?php echo $row['cantidad_solicitada']; ?>">
						<?php endforeach; ?>
					<?php endif; ?>
					<button type="submit" class="btn btn-primary" id="botoncito">Confirmar carrito y pagar</button>
				</form>
			</div>
			<div class="offset-sm-3 col-sm-3 d-grid">
				<a class="btn btn-outline-primary" href="articulos.php" role="button">Cancelar<a>
			</div>
		</div>


	</div>

	<br>
	<a class="btn btn-outline-primary" href="articulos.php" role="button" style="font-size:15px;">Regresar a ver más
		articulos<a>


</body>

</html>