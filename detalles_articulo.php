<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
include("header.php");
$nombre = urldecode($_GET["nombre"]);

// Establecer la conexión con la base de datos
$conn = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verificar si la conexión fue exitosa
if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Ejecutar una consulta SQL
$resultado = mysqli_query($conn, "SELECT p.ID_PRODUCTO, p.NOMBRE, p.PRECIO, p.EXISTENCIA, pr.NOMBRE AS PROVEEDOR
FROM PRODUCTOS p
INNER JOIN PROVEEDORES pr ON p.ID_PROVEEDOR = pr.ID_PROVEEDOR
WHERE p.NOMBRE = '$nombre'");

// Procesar los datos del resultado
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Guardar los datos en variables
    $id_producto = $fila["ID_PRODUCTO"];
    $nombre_producto = $fila["NOMBRE"];
    $precio_producto = $fila["PRECIO"];
    $existencia_producto = $fila["EXISTENCIA"];
    $nombre_proveedor = $fila["PROVEEDOR"];
    // ...y así sucesivamente para cada columna de la tabla
}

$imagen_file = mysqli_query($conn, "SELECT SOURCE FROM IMAGENES WHERE ID_PRODUCTO = '$id_producto';");
if ($imagen_file) {
    $fila = mysqli_fetch_array($imagen_file);
    $imagen_binario = $fila['SOURCE'];
} else {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html>

<div class="container background-container"
    style="margin-start:10px; margin-bottom:20px; border-radius:20px; height:500px; width:auto;">

    <head>
        <title>Título de la página</title>
        <link rel="stylesheet" href="css/detalles_articulo.css">
    </head>

    <body>
        <div class="container">
            <div style="text-align: center;">
                <br><h1 style="color:white;"><strong>DETALLES DEL PRODUCTO SELECCIONADO</strong></h1><br>
            </div>
            <div class="row">
                <div class="col" style="border-radius:15px; background:white; width: 400px; height:250px;">
                    <div style="text-align: center; margin-left:20px;">
                        <h2>
                            <?php echo $nombre_producto ?>
                        </h2>
                    </div>

                    <p style="margin-left:20px;"><strong>ID:</strong>
                        <?php echo $id_producto ?>
                    </p>
                    <p style="margin-left:20px;"><strong>Precio:</strong>
                        <?php echo $precio_producto ?>
                    </p>
                    <p style="margin-left:20px;"><strong>Cantidad en stock:</strong>
                        <?php echo $existencia_producto ?>
                    </p>
                    <p style="margin-left:20px;"><strong>Proveedor:</strong>
                        <?php echo $nombre_proveedor ?>
                    </p>
                </div>
                <div class="col image-col" style="border-radius:15px; background:white; width: 500px; text-align:center; margin-left:20px;">

                    <img src="data:<?php echo $tipo_imagen; ?>;base64,<?php echo base64_encode($imagen_binario); ?>"
                        width="250">
                </div>
            </div>
        </div>

        <br> </br>

        <form action="carrito.php">
            <input type="hidden" name="nombre_producto" value="<?php echo $nombre_producto; ?>">
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-flex">
                    <button type="submit" class="btn btn-primary">AÑADIR AL CARRITO</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-flex">
                    <a class="btn btn-outline-primary" href="articulos.php" role="button">Regresar</a>
                </div>
            </div>
        </form>
    </body>
</div>

</html>

<footer class="text-center text-white" style="background-color: black; color:white; font-weight: lighter;">
    <div>Conoce mas en:
        <a href="https://github.com/Limoncito160/ProyectoPrograWeb">GitHub</a>
    </div>

    <div class="text-center text-white p-3" style="background-color: black;">
        © Mayo 2023 Copyright: Pincheles de S.A. de C.V.
    </div>

</footer>

<style>
    .background-container {
        background-image: url('img/background.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>