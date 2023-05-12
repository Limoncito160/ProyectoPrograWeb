<?php
// Incluir archivo de configuración de base de datos
// include 'configuracion_db.php';

// Obtener datos del formulario de inicio de sesión
$correo = $_POST['uname'];
$contraseña = $_POST['psw'];

// Validar que los campos no estén vacíos
if (empty($correo) || empty($contraseña)) {
  // Si los campos están vacíos, redirige al usuario de vuelta a la página de inicio de sesión
  header("Location: login.php");
  exit();
}

// Aquí agregarías cualquier otra validación adicional que necesites hacer, como verificar si el usuario y la contraseña son válidos

// Si se ha autenticado correctamente, redirige al usuario a la página de inicio
header("Location: home.php");
exit();
?>
