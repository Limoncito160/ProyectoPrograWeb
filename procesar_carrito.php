<?php
session_start();
$correo = $_SESSION['correo'];
$total_cantidad = $_POST['total_cantidad'];
$total_precio = $_POST['total_precio'];
include("header.php");

?>

<h1 style="margin: 0 30px;"><strong>Verifica tus datos de compra:</strong></h1>

<div style="margin: 0 30px; background-color:#34749E">
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
            background-color: #34749E;
            color: #fff;
        }

        .tabla-temporal tr:nth-child(even) {
            background-color: #6797B7;
        }

        div,
        p,
        table,
        th,
        td {
            color: #fff;
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

    <form action="confirmar_compra.php" method="POST">
        <?php foreach ($_SESSION['temp_table'][$correo] as $row): ?>
            <input type="hidden" name="id_articulo[]" value="<?php echo $row['id_articulo']; ?>">
            <input type="hidden" name="nombre[]" value="<?php echo $row['nombre']; ?>">
            <input type="hidden" name="precio[]" value="<?php echo $row['precio']; ?>">
            <input type="hidden" name="cantidad_solicitada[]" value="<?php echo $row['cantidad_solicitada']; ?>">
        <?php endforeach; ?>
        <input type="hidden" name="total_cantidad" value="<?php echo $total_cantidad; ?>">
        <input type="hidden" name="total_precio" value="<?php echo $total_precio; ?>">

        <p style="margin: 0 30px; color:black;"><strong>Cantidad de productos: </strong>
            <?php echo $total_cantidad ?>
        </p>
        <p style="margin: 0 30px; color:black;"><strong>Cantidad a pagar: $</strong>
            <?php echo $total_precio ?> MXN
        </p><br>

        <button type="submit" class="btn btn-primary">Confirmar compra</button>
    </form>
    <div class="offset-sm-3 col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="articulos.php" role="button" style="text-color:white;">Cancelar
            compra<a>
    </div>


</div>
</div>

<p style="margin: 0 30px; color:black;"><strong>Cantidad de productos: </strong>
    <?php echo $total_cantidad ?>
</p>
<p style="margin: 0 30px; color:black;"><strong>Cantidad a pagar: $</strong>
    <?php echo $total_precio ?> MXN
</p> <br>