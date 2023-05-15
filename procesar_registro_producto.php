<?php
$proveedor = $_POST['proveedor'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$imagen = $_FILES['imagen']['tmp_name'];
$nombre_imagen = $_FILES['imagen']['name'];

// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "estuches_pinceles");

//Insertar datos en PRODUCTOS
$insert_productos = "INSERT INTO PRODUCTOS (NOMBRE, EXISTENCIA, PRECIO, ID_PROVEEDOR) VALUES ('$nombre','$cantidad','$precio', (SELECT ID_PROVEEDOR FROM PROVEEDORES WHERE NOMBRE = '$proveedor'));";
if (mysqli_query($conexion, $insert_productos)) {

} else {
    echo "<script>alert('ERROR: ¡No se ha podido insertar el registro en PRODUCTOS!')</script>";
    echo "$insert_productos" . "<br/>";
}

// Insertar datos en IMAGENES
$insert_imagenes = "INSERT INTO IMAGENES (NOMBRE, SOURCE, ID_PRODUCTO) VALUES (?, ?, (SELECT ID_PRODUCTO FROM PRODUCTOS WHERE NOMBRE = ?))";
$stmt = mysqli_prepare($conexion, $insert_imagenes);
mysqli_stmt_bind_param($stmt, "sss", $nombre_imagen, $imagen_data, $nombre);
$imagen_data = file_get_contents($imagen);
mysqli_stmt_execute($stmt);

if (mysqli_affected_rows($conexion) > 0) {
    include("articulos.php");
} else {
    echo "<script>alert('ERROR: ¡No se ha podido insertar el registro en IMAGENES!')</script>";
    echo mysqli_error($conexion);
}

?>