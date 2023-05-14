<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
include("header.php");
?>

<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #34749E;
    color: white;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }

  .wider-container {
    max-width: 1200px;
    margin: 0 auto;
  }
</style>

<div class="container wider-container">
  <h1>Lista de productos que ofrece Pincheles</h1>

  <?php
  // Verifica si la sesión pertenece a un administrador
  if ($_SESSION['id_rol'] == '601') {
    ?>
    <button><a href="registros_productos.php">Registrar un nuevo producto</a></button>
    <?php
  }
  ?>

  <table>
    <thead>
      <tr>
        <th>NOMBRE DEL ARTICULO</th>
        <th>CANTIDAD EN STOCK</th>
        <th>PRECIO</th>
        <th>BOTON</th>
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

      $sql = "SELECT NOMBRE, EXISTENCIA, PRECIO FROM PRODUCTOS;";
      $result = mysqli_query($conexion, $sql);

      // verifica si se encontraron resultados
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["NOMBRE"] . "</td>";
          echo "<td>" . $row["EXISTENCIA"] . "</td>";
          echo "<td>" . $row["PRECIO"] . "</td>";
          echo "<td><a href='detalles_articulo.php?id=" . $row["NOMBRE"] . "'>Ver detalles</a></td>";

          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
      }
      ?>
    </tbody>
  </table>

</div>