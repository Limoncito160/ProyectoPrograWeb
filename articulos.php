<head>
  <link rel="stylesheet" href="css/articulos.css">
</head>

<?php
session_start();
if (isset($_SESSION['correo']) && isset($_SESSION['id_rol'])) {

  // Existe una sesión activa, puedes acceder a los datos de la sesión
  $correo = $_SESSION['correo'];
  $id_rol = $_SESSION['id_rol'];

  // Resto del código para usuarios autenticados...
  // Verifica que tipo de usuario es

  if ($id_rol == '601') {

    //Código para el administrador
    $user_role = 'admin';
    include("header.php");

  } else if ($id_rol == '600') {

    //Código para el usuario mortal
    $user_role = 'user';
    include("header.php");

  }

} else {

  // Código para el usuario invitado
  $user_role = 'guest';
  include("header.php");

}
?>

<div class="container background-container" style="margin-start:10px; margin-bottom:20px; border-radius:20px; height:100%">
  <h1 style="text-align:center; color:white;"><strong>CATÁLOGO DE ARTÍCULOS</strong></h1>

  <?php
  // Verifica si la sesión pertenece a un administrador
  if ($user_role == 'admin') {
    ?>
    <button><a href="registros_productos.php" style="color:black;">REGISTRAR NUEVO PRODUCTO</a></button><br></br>
    <?php
  }
  ?>

  <table style="height:450px;">
    <thead>
      <tr height="40" rowspan="4">
        <th style = "text-align:center;">NOMBRE DEL ARTICULO</th>
        <th style = "text-align:center;">CANTIDAD EN STOCK</th>
        <th style = "text-align:center;">PRECIO</th>
        <th></th>
      </tr>
    </thead>
    <tbody  style = "text-align:center; color:white">
      <?php
      // Conexión a la base de datos
      $conexion = mysqli_connect("localhost", "root", "", "estuches_pinceles");

      // Verificar conexión
      if (mysqli_connect_errno()) {
        echo "Error de conexión a la base de datos: " . mysqli_connect_error() . "<br/>";
        exit();
      }

      $sql = "SELECT NOMBRE, EXISTENCIA, CONCAT('$', PRECIO, ' MXN') AS PRECIO FROM PRODUCTOS;";
      $result = mysqli_query($conexion, $sql);

      // verifica si se encontraron resultados
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr> ";
          echo "<td>" . $row["NOMBRE"] . "</td>";
          echo "<td>" . $row["EXISTENCIA"] . "</td>";
          echo "<td>" . $row["PRECIO"] . "</td>";
          echo "<td><a href='detalles_articulo.php?nombre=" . urlencode($row["NOMBRE"]) . "'>Ver detalles</a></td>";

          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
      }
      ?>
    </tbody>
  </table>

  <form class="form-inline" action="busqueda.php" method="POST"  style = "margin-left:850px;">
    <input class="form-control mr-sm-2" type="search" placeholder="Buscar productos" aria-label="Search" maxlength="100"
      style="margin-top:10px;" name="articulo_busqueda">
    <button class="btn btn-outline-success" type="submit" style="margin-top:10px;">Buscar</button>
  </form>

</div>

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