<?php

if (isset($_SESSION['correo']) && isset($_SESSION['id_rol'])) {

  // Existe una sesión activa, puedes acceder a los datos de la sesión
  $correo = $_SESSION['correo'];
  $id_rol = $_SESSION['id_rol'];

  // Resto del código para usuarios autenticados...
  // Verifica que tipo de usuario es

  if ($id_rol == '601') {

    //Código para el administrador
    $user_role = 'admin';

  } else if ($id_rol == '600') {

    //Código para el usuario mortal
    $user_role = 'user';

  }

} else {

  // Código para el usuario invitado
  $user_role = 'guest';

}
?>

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
  <style>
    /* Estilo inicial para los enlaces de navegación */
    .navbar-nav li a {
      color: white !important;
    }

    /* Estilo al pasar el mouse por encima */
    .navbar-nav li a:hover {
      color: black !important;
    }

  </style>

</head>

<body style="font-family:Montserrat">
  <!--Barra de navegación-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:black; display:flex;">

  <p class="navbar-brand disable" style="color: white;">Pincheles S.A. de C.V.</p>

    <ul class="nav navbar-nav">
      <li class="active"><a id="home-button" href="home.php" style="color: white;"><span
            class="glyphicon glyphicon-home"></span> Pagina
          Principal</a></li>

      <li><a id="articles-button" href="articulos.php" style="color: white;">Articulos</a></li>
      <li><a id="request-button" href="pedidos.php" style="color: white;">Pedidos</a></li>

      <li class="nav-item dropdown" style ="color:black;">
        <a id="contact-button" class="nav-link dropdown-toggle contact-link" href="#" id="navbarDropdown" role="button"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <span class="contact" style="color: white; font-family:Montserrat"> Contacto
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <p>Telefono: </p><b class="dropdown-item" href="#">722 554 5526</a>
          <p>Correo: </p><b class="dropdown-item" href="#">srobledon@toluca.tecnm.mx</a>
          <p>Liga a Github: </p><b class="dropdown-item"
            href="https://github.com/Limoncito160/ProyectoPrograWeb">Limoncito160/ProyectoPrograWeb</a>


      </li>
    </ul>

    <ul class="nav navbar-nav ml-auto">

      <?php if ($user_role == 'guest') { ?>

        <!-- BOTONES DEL INVITADO -->
        <li><a href="" style="color: white;"
            onclick="event.preventDefault(); document.getElementById('login-form').submit();">Iniciar sesión</a></li>
      <?php } else if ($user_role == 'user') { ?>

          <!--BOTONES DEL USUARIO-->
          <li><a href="" style="color: white;"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a></li>
      <?php } else { ?>

          <!--BOTONES DEL ADMINISTRADOR -->
          <li><a href="" style="color: white;"
              onclick="event.preventDefault(); document.getElementById('manage-form').submit();">Gestionar</a></li>
          <li><a href="" style="color: white;"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
      <?php } ?>


      <!-- Formulario oculto para realizar el logout USUARIO -->
      <form id="logout-form" action="" method="post" style="display: none;">
        <input type="hidden" name="logout" value="1">
      </form>

      <!-- Formulario oculto para realizar el inicio de sesión GUEST -->
      <form id="login-form" action="" method="post" style="display: none;">
        <input type="hidden" name="login" value="1">
      </form>

      <!-- Formulario oculto para realizar el gestion ADMINISTRADOR -->
      <form id="manage-form" action="" method="post" style="display: none;">
        <input type="hidden" name="manage" value="1">
      </form>
    </ul>

    <?php
    if (isset($_POST['logout'])) {
      session_unset();
      session_destroy();
      header('Location: home.php');
      exit();
    }
    ?>

    <?php
    if (isset($_POST['login'])) {
      header('Location: login.php');
      exit();
    }
    ?>

    <?php
    if (isset($_POST['manage'])) {
      header('Location: manage.php');
      exit();
    }
    ?>

  </nav>