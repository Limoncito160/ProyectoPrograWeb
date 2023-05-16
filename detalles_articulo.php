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

<head>
    <title>Título de la página</title>
    <link rel="stylesheet" href="css/detalles_articulo.css">
    <!--<style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .col {
            flex: 1;
            margin: 10px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .image-col {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
    -->
</head>

<body>
    <div class="container">
        <div style="text-align: center;">
            <h1>DETALLES DEL PRODUCTO SELECCIONADO</h1>
        </div>
        <div class="row">
            <div class="col">
                <div style="text-align: center;">
                    <h2>
                        <?php echo $nombre_producto ?>
                    </h2>
                </div>

                <p><strong>ID:</strong>
                    <?php echo $id_producto ?>
                </p>
                <p><strong>Precio:</strong>
                    <?php echo $precio_producto ?>
                </p>
                <p><strong>Cantidad en stock:</strong>
                    <?php echo $existencia_producto ?>
                </p>
                <p><strong>Proveedor:</strong>
                    <?php echo $nombre_proveedor ?>
                </p>
            </div>
            <div class="col image-col">
                
            <img src="data:<?php echo $tipo_imagen; ?>;base64,<?php echo base64_encode($imagen_binario); ?>" width="200" height="200">
            </div>
        </div>

        <br> </br>

        <form action="carrito.php" >
        <input type="hidden" name="nombre_producto" value="<?php echo $nombre_producto; ?>">
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-flex">
                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-flex">
                    <a class="btn btn-outline-primary" href="articulos.php" role="button">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>