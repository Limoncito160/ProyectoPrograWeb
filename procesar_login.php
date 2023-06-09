<?php

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verificar conexión
if (mysqli_connect_errno()) {
  echo "Error de conexión a la base de datos: " . mysqli_connect_error() . "<br/>";
  exit();
}

// Obtener datos del formulario de inicio de sesión
$correo = $_POST['email'];
$password = $_POST['password'];

// Validar que los campos no estén vacíos
if (empty($correo) || empty($password)) {
  // Si los campos están vacíos, redirige al usuario de vuelta a la página de inicio de sesión
  header("Location: login.php");
  exit();
}

//Valida si existe EMAIL y PASSWORD
$valida_email = "SELECT * FROM USUARIOS WHERE EMAIL = '$correo' AND PASSWORD = '$password';";
$result = mysqli_query($conexion, $valida_email);

if ($result->num_rows > 0) {

  // Obtener el campo ID_ROL de la fila encontrada
  $fila = mysqli_fetch_assoc($result);
  $id_rol = $fila['ID_ROL'];

  // Iniciar sesión y almacenar el correo electrónico y el id_rol del usuario en variables de sesión
  session_start();
  $_SESSION['correo'] = $correo;
  $_SESSION['id_rol'] = $id_rol;
  include("home.php");


} else {
  echo "<script>alert('ERROR: Datos incorrectos; verifica tu información.')</script>";
  include("login.php");
}

// Aquí agregarías cualquier otra validación adicional que necesites hacer, como verificar si el usuario y la contraseña son válidos
?>