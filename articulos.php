<?php
session_start();
$correo = $_SESSION['correo'];
include("header.php");
?>

<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
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

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Dirección</th>
        <th>ID Rol</th>
        <th>Nombres</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Fecha de nacimiento</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Contraseña</th>
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

      $sql = "SELECT * FROM USUARIOS";
      $result = mysqli_query($conexion, $sql);

      // verifica si se encontraron resultados
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["ID_USUARIO"] . "</td>";
          echo "<td>" . $row["ID_DIRECCION"] . "</td>";
          echo "<td>" . $row["ID_ROL"] . "</td>";
          echo "<td>" . $row["NOMBRES"] . "</td>";
          echo "<td>" . $row["AP_PATERNO"] . "</td>";
          echo "<td>" . $row["AP_MATERNO"] . "</td>";
          echo "<td>" . $row["F_NACIMIENTO"] . "</td>";
          echo "<td>" . $row["TELEFONO"] . "</td>";
          echo "<td>" . $row["EMAIL"] . "</td>";
          echo "<td>" . $row["PASSWORD"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='10'>No se encontraron resultados</td></tr>";
      }
      ?>
    </tbody>
  </table>

</div>
