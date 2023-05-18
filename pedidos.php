<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
include("header.php");

// Establecer la conexión con la base de datos
$conn = mysqli_connect("localhost", "root", "", "estuches_pinceles");

$consulta2 = "SELECT NOMBRES FROM USUARIOS WHERE EMAIL = '$correo';";

// Ejecutar una consulta SQL para obtener los nombres del usuario
$resultado2 = mysqli_query($conn, $consulta2);
if (!$resultado2) {
  $error = mysqli_error($conn);
  echo "Error de consulta: " . $error . "<br>";
  echo $consulta2;
} else {
  // Obtener el valor de la consulta en una variable
  $fila = mysqli_fetch_assoc($resultado2);
  $nombre_usuario = $fila['NOMBRES'];

}

// Verificar si la conexión fue exitosa
if (!$conn) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

?>
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }

  th,
  td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f2f2f2;
    text-align: center;
  }

  .background-container {
    background-image: url('img/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }

  td {
    color:white;
  }
</style>


<div class="container background-container"
  style="margin-start:10px; margin-bottom:20px; border-radius:20px; height:600px;">
  <div class="container" style="">
    <h1 style="text-align:center; color:white;"><strong>PEDIDOS DE 
        <?php echo $nombre_usuario ?>
      </strong></h1>
  </div>

  <br>
  <div class="container" style="background-color: #34749E;">

  </div>

  <?php

  $consulta = "SELECT ID_USUARIO FROM USUARIOS WHERE EMAIL = '$correo';";

  // Ejecutar una consulta SQL para obtener el id_usuario
  $resultado = mysqli_query($conn, $consulta);
  if (!$resultado) {
    $error = mysqli_error($conn);
    echo "Error de consulta: " . $error . "<br>";
    echo $consulta;
  } else {
    // Obtener el valor de la consulta en una variable
    $fila = mysqli_fetch_assoc($resultado);
    $idUsuario = $fila['ID_USUARIO'];

  }

  $consulta1 = "SELECT * FROM PEDIDOS WHERE ID_USUARIO = '$idUsuario'";
  //Ejecutar una consulta SQL para mostrar los pedidos del usuario
  $resultado1 = mysqli_query($conn, $consulta1);
  if (!$resultado1) {
    $error1 = mysqli_error($conn);
    echo "Error de consulta: " . $error1 . "<br>";
    echo $consulta1;
  } else {
    // Variables para almacenar los datos de la consulta
    $pedidos = array(); // Array para almacenar múltiples pedidos
  
    // Obtener los datos de la consulta y guardarlos en variables
    while ($row = mysqli_fetch_assoc($resultado1)) {
      $idPedido = $row['ID_PEDIDO'];
      $cantidad = $row['CANTIDAD'];
      $costo = $row['COSTO'];
      $f_pedido = $row['F_PEDIDO'];
      // Puedes asignar más columnas a variables aquí según tus necesidades
  
      // Guardar los datos en un array de pedidos
      $pedido = array(
        'idPedido' => $idPedido,
        'cantidad' => $cantidad,
        'costo' => $costo,
        'f_pedido' => $f_pedido
        // Agrega más columnas si es necesario
      );

      // Agregar el pedido al array de pedidos
      $pedidos[] = $pedido;
    }

    // Mostrar los pedidos en una tabla
    echo '<table>';
    echo '<thead>';
    echo '<tr><th>ID PEDIDO</th><th>CANTIDAD DE ARTÍCULOS</th><th>COSTO TOTAL</th><th>FECHA DEL PEDIDO</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($pedidos as $pedido) {
      echo '<tr>';
      echo '<td>' . $pedido['idPedido'] . '</td>';
      echo '<td>' . $pedido['cantidad'] . '</td>';
      echo '<td>' . $pedido['costo'] . '</td>';
      echo '<td>' . $pedido['f_pedido'] . '</td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  }
  ?>
  </div>

  <footer class="text-center text-white" style="background-color: black; color:white; font-weight: lighter;">
  <div>Conoce mas en:
    <a href="https://github.com/Limoncito160/ProyectoPrograWeb">GitHub</a>
  </div>

  <div class="text-center text-white p-3" style="background-color: black;">
    © Mayo 2023 Copyright: Pincheles de S.A. de C.V.
  </div>

</footer>