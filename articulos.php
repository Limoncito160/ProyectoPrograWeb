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

<div class="container wider-container">
  <h1>Lista de productos que ofrece Pincheles</h1>

  <?php
  echo $user_role;
  // Verifica si la sesión pertenece a un administrador
  if ($user_role == 'admin') {
    ?>
    <button><a href="registros_productos.php">Registrar un nuevo producto</a></button><br></br>
    <?php
    echo "Administrador";
  }
  ?>

  <table>
    <thead>
      <tr height="40" rowspan="4">
        <th>NOMBRE DEL ARTICULO</th>
        <th>CANTIDAD EN STOCK</th>
        <th>PRECIO</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
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

  <form class="form-inline" action="busqueda.php" method="POST">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" maxlength="100"
      style="margin-top:10px;" name="articulo_busqueda">
    <button class="btn btn-outline-success" type="submit" style="margin-top:10px;">Buscar</button>
  </form>

</div>