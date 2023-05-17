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
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:black; display:flex;">
    <p class="navbar-brand disable" style="color: white;">Pincheles S.A. de C.V.</p>
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php" style="color: white;"><span class="glyphicon glyphicon-home"></span> Pagina Principal</a></li>
      <li><a href="articulos.php" style="color: white;">Articulos</a></li>
      <li><a href="pedidos.php" style="color: white;">Pedidos</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-earphone" style="color: white;"> Contacto
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <p>Telefono: </p><a class="dropdown-item" href="#">722 554 5526</a>
          <p>Correo: </p><a class="dropdown-item" href="#">srobledon@toluca.tecnm.mx</a>
          <p>Liga a Github: </p><a class="dropdown-item" href="https://github.com/Limoncito160/ProyectoPrograWeb">Limoncito160/ProyectoPrograWeb</a>

      </li>
    </ul>
    <u1 class="nav navbar-nav" style="margin-left: 615px;">
    <li><a href="login.php" style="color: white;">Cerrar Sesión</a></li>
    </u1>
    
<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    exit();
    header('Location: login.php');
    
}
?>

  </nav>
