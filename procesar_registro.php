<?php
  $nombres = $_POST['nombres'];
  $ap_paterno = $_POST['ap_paterno'];
  $ap_materno = $_POST['ap_materno'];
  $f_nacimiento = $_POST['f_nacimiento'];
  $telefono = $_POST['telefono'];
  $nombre_estado = $_POST['nombre_estado'];
  $nombre_localidad = $_POST['nombre_localidad'];
  $cp = $_POST['cp'];
  $direccion = $_POST['direccion'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $tipo_usuario = $_POST['tipo_usuario'];

/*
  echo "NOMBRES: " . $nombres . "<br/>";
  echo "AP_PATERNO: " . $ap_paterno . "<br/>";
  echo "AP_MATERNO: " . $ap_materno . "<br/>";
  echo "F_NACIMIENTO: " . $f_nacimiento . "<br/>";
  echo "TELEFONO: " . $telefono . "<br/>";
  echo "NOMBRE_ESTADO: " . $nombre_estado . "<br/>";
  echo "NOMBRE_LOCALIDAD: " . $nombre_localidad . "<br/>";
  echo "DIRECCION: " . $direccion . "<br/>";
  echo "EMAIL: " . $email . "<br/>";
  echo "PASSWORD: " . $password . "<br/>";
  echo "TIPO_USUARIO: " . $tipo_usuario . "<br/>";

  echo "INSERT INTO LOCALIDADES (NOMBRE, ID_ESTADO) VALUES ('$nombre_localidad', (SELECT ID_ESTADO FROM ESTADOS WHERE NOMBRE = '$nombre_estado'))";
*/


// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "estuches_pinceles");

// Verificar conexión
if (mysqli_connect_errno()) {
    echo "Error de conexión a la base de datos: " . mysqli_connect_error(). "<br/>";
    exit();
}


//Valida duplicidad de EMAIL
$valida_email = "SELECT * FROM USUARIOS WHERE EMAIL = '$email'";
$result = mysqli_query($conexion, $valida_email);
if (!$result -> num_rows > 0) {
    //Valida duplicidad de TELEFONO
    $valida_telefono = "SELECT * FROM USUARIOS WHERE TELEFONO = '$telefono'";
    $result1 = mysqli_query($conexion, $valida_telefono);
    if (!$result1 -> num_rows > 0) {
        
        // Insertar usuario
        $insert_usuario = "INSERT INTO USUARIOS (NOMBRES, AP_PATERNO, AP_MATERNO, F_NACIMIENTO, TELEFONO, EMAIL, PASSWORD, ID_DIRECCION, ID_ROL) 
        VALUES (
            '$nombres', '$ap_paterno', '$ap_materno', '$f_nacimiento', '$telefono', '$email', '$password',
            (SELECT ID_DIRECCION FROM DIRECCIONES WHERE ID_LOCALIDAD = 
            (SELECT ID_LOCALIDAD FROM LOCALIDADES WHERE ID_ESTADO = 
            (SELECT ID_ESTADO FROM ESTADOS WHERE NOMBRE = '$nombre_estado') LIMIT 1) LIMIT 1),
            (SELECT ID_ROL FROM ROLES WHERE NOMBRE = '$tipo_usuario'));";


        if (mysqli_query($conexion, $insert_usuario)) {
            echo "Registro insertado correctamente en la tabla USUARIOS. <br/>";
        } else {
            echo "Error al insertar registro en la tabla USUARIOS: " . mysqli_error($conexion) . "<br/>";
            echo "$insert_usuario <br/>";
        }

        // Insertar la dirección
        $insert_direccion = "INSERT INTO DIRECCIONES (DIRECCION, CP, ID_LOCALIDAD) 
        VALUES ('$direccion', '$cp' , 
        (SELECT DISTINCT ID_LOCALIDAD FROM LOCALIDADES WHERE ID_ESTADO = 
        (SELECT DISTINCT ID_ESTADO FROM ESTADOS WHERE NOMBRE = '$nombre_estado') LIMIT 1));";

        if (mysqli_query($conexion, $insert_direccion)) {
            echo "Registro insertado correctamente en la tabla DIRECCIONES. <br/>";
        } else {
            echo "Error al insertar registro en la tabla DIRECCIONES: " . mysqli_error($conexion) . "<br/>";
            echo "$insert_direccion <br/>";
        }

        // Insertar la localidad
        $insert_localidad = "INSERT INTO LOCALIDADES (NOMBRE, ID_ESTADO) VALUES ('$nombre_localidad', (SELECT ID_ESTADO FROM ESTADOS WHERE NOMBRE = '$nombre_estado'))";
        if (mysqli_query($conexion, $insert_localidad)) {
            echo "Registro insertado correctamente en la tabla LOCALIDADES. <br/>";
        } else {
            echo "Error al insertar registro en la tabla LOCALIDADES: " . mysqli_error($conexion) . "<br/>";
            echo "$insert_localidad". "<br/>";
        }

    } else {
        echo "<script>alert('El Telefono Registrado ya Existe')</script>";
        include("registro.php");
    }
} else {
    echo "<script>alert('El Email Registrado ya Existe')</script>";
    include("registro.php");
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
