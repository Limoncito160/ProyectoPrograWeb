<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
$total_cantidad = $_POST['total_cantidad'];
$total_precio = $_POST['total_precio'];
unset($_SESSION['temp_table'][$correo]);
include("header.php");

// Establecer la conexión con la base de datos
$conn = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verificar si la conexión fue exitosa
if (!$conn) {
	die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$consulta = "INSERT INTO PEDIDOS (ID_USUARIO, CANTIDAD, COSTO, F_PEDIDO) VALUES 
((SELECT ID_USUARIO FROM USUARIOS WHERE EMAIL = '$correo'), '$total_cantidad','$total_precio', CURDATE());";


// Ejecutar una consulta SQL para crear un nuevo pedido
$resultado = mysqli_query($conn, $consulta);
if (!$resultado) {
    $error = mysqli_error($conn);
    echo "Error de consulta: " . $error . "<br>";
    echo $consulta;
} else {
    echo '<script>alert("¡Pedido registrado con exito!");</script>';
    header("Location: pedidos.php");
    exit;
}
?>

