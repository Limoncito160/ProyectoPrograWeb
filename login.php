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

<h2>Iniciar Sesión</h2>

<form action="procesar_login.php" method="post">
<div class="imgcontainer">
    <img src="img/avatar.png" alt="Avatar" class="avatar">
</div>

<div class="container">
    <!--Etiqueta y Caja de texto de Correo-->
    <label for="uname"><b>Correo Electronico</b></label>
    <input type="text" placeholder="Correo@ejemplo.com" name="email" required>
    <!--Etiqueta y Caja de texto de Contraseña-->
    <label for="psw"><b>Contraseña</b></label>
    <input type="password" placeholder="***************" name="password" required>
    <!--Boton Acceso-->
    <button type="submit">Acceso</button>
</div>
    <!--¿No Tienes Cuenta?-->
    <span class="psw">¿No Tienes Cuenta? <a href="registro.php">¡Crea Una!</a></span>
</form>

</body>
</html>