<!DOCTYPE html>
<html lang="es">

<head>
  <title>Pincheles</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!--Variables-->

</head>

<body>
  <!--Barra de navegación-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: darkgray; display:flex;">
    <p class="navbar-brand disable">Pincheles S.A. de C.V.</p>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Pagina Principal</a></li>
      <li><a href="articulos.php">Articulos</a></li>
      <li><a href="pedidos.php">Pedidos</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-earphone"> Contacto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <p>Telefono: </p><a class="dropdown-item" href="#">722 554 5526</a>
          <p>Correo: </p><a class="dropdown-item" href="#">srobledon@toluca.tecnm.mx</a>
          <p>Liga a Github: </p><a class="dropdown-item" href="https://github.com/Limoncito160/ProyectoPrograWeb">Limoncito160/ProyectoPrograWeb</a>

      </li>
    </ul>
    <u1 class="nav navbar-nav">

    </u1>
    <form method="POST" action="login.php">
    <input type="submit" name="logout" value="Cerrar sesión" style="margin-top:15px; margin-left:690px;">
</form>

<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    exit();
    header('Location: login.php');
    
}
?>

  </nav>