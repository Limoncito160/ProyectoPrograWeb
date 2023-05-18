<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/slog.css">
</head>

<body>

    <div class="container background-container" style="margin-start:10px; margin-bottom:20px; border-radius:20px;">
        <h2 style="color: white; text-align:center; margin:20px; font-weight:bold;">INICIAR SESIÓN</h2>

        <form action="procesar_login.php" method="post">
            <div class="imgcontainer">
                <img src="img/lona.png" alt="Avatar" class="avatar">
            </div>

            <!--Etiqueta y Caja de texto de Correo-->
            <label for="uname"><b>CORREO ELECTRÓNICO:</b></label><br>
            <input type="text" placeholder="Correo@ejemplo.com" name="email" required><br><br>
            <!--Etiqueta y Caja de texto de Contraseña-->
            <label for="psw"><b>CONTRASEÑA:</b></label><br>
            <input type="password" placeholder="***************" name="password" required><br>
            <!--Boton Acceso-->
            <button type="submit">ACCEDER</button>

            <!--¿No Tienes Cuenta?-->
            <span class="psw" style="color:white; font-weight: lighter;">¿No Tienes Cuenta?
                <a href="registro.php" style="color:lightblue; text-align: left;"><strong>¡Crea una
                        aquí!</strong></a></span>
        </form>
    </div>

</body>

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

</html>