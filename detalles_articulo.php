<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verifica si se pudo conectar
if (mysqli_connect_errno()) {
    echo "Error de conexión a la base de datos: " . mysqli_connect_error() . "<br/>";
    exit();
}

// Obtener el nombre del producto de la URL
$nombre_producto = $_GET["nombre"];
echo "$nombre_producto";
?>