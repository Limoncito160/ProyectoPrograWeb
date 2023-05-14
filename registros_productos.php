<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
include("header.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <title>Registro Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <body>
        <div class="container my-5">
            <h1 style="text-align: center;">Registro de un nuevo producto</h1>
            <br> </br>

            <form method="post" action="procesar_registro_producto.php" enctype="multipart/form-data">

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Proveedor: </label>
                    <div class="col-sm-6">
                        <select class="form-control" name="proveedor">
                            <option value="Plásticos Gonzalo S.A. de C.V.">Plásticos Gonzalo S.A. de C.V.</option>
                            <option value="Arte de mi parte S.A. de C.V.">Arte de mi parte S.A. de C.V.</option>
                            <option value="Manualidades y plásticos C.V.">Manualidades y plásticos C.V.</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Nombre: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombre">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Cantidad: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="cantidad">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Precio: </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="precio" step="0.01" min="0" max="9999.99"
                            maxlength="8">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Imagen: </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="imagen">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="articulos.php" role="button">Cancelar<a>
                    </div>
                </div>

            </form>
        </div>
    </body>


</body>

</html>