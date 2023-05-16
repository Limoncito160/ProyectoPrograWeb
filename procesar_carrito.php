<?php
session_start();
$correo = $_SESSION['correo'];
include("header.php");

?>

<style>
    .tabla-temporal {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    .tabla-temporal th,
    .tabla-temporal td {
        text-align: left;
        padding: 8px;
    }

    .tabla-temporal th {
        background-color: #428bca;
        color: #fff;
    }

    .tabla-temporal tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>

<?php

// Verificar si hay datos en la tabla temporal del usuario
if (isset($_SESSION['temp_table'][$correo]) && count($_SESSION['temp_table'][$correo]) > 0) {
    // Mostrar la tabla temporal del usuario
    echo '<table class="tabla-temporal">';
echo '<thead>';
echo '<tr><th>Nombre</th><th>Precio</th><th>Cantidad solicitada</th></tr>';
echo '</thead>';
echo '<tbody>';
foreach ($_SESSION['temp_table'][$correo] as $row) {
    echo '<tr>';
    echo '<td>' . $row['nombre'] . '</td>';
    echo '<td>' . $row['precio'] . '</td>';
    echo '<td>' . $row['cantidad_solicitada'] . '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

} else {
    // No hay datos en la tabla temporal del usuario
    echo '<p>No hay productos en el carrito.</p>';
}

// Borrar los datos de la tabla temporal original
unset($_SESSION['temp_table'][$correo]);

?>

<button type="submit" class="btn btn-primary">Continuar</button>
</form>
</div>
<div class="offset-sm-3 col-sm-3 d-grid">
    <a class="btn btn-outline-primary" href="articulos.php" role="button">Cancelar compra<a>
</div>