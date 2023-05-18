<?php
session_start();
$correo = $_SESSION['correo'];
$id_rol = $_SESSION['id_rol'];
include("header.php");
?>

<!DOCTYPE html>
<html lang="es">

<div class="container background-container"
    style="margin-start:10px; margin-bottom:20px; border-radius:20px; height:500px;">

    <head>

        <title>Registro Producto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container my-5">
            <h1 style="text-align: center; color:white;"><strong>REGISTRO DE PRODUCTO</strong></h1><br>

            <form method="post" action="procesar_registro_producto.php" enctype="multipart/form-data">

                <div class="row mb-3" style="margin-top:10px; margin-bottom:10px;">
                    <label class="col-sm-3 col-form-label" style="color:white; margin-left:90px;">PROVEEDOR: </label>
                    <div class="col-sm-6">
                        <select class="form-control" name="proveedor">
                            <option value="Plásticos Gonzalo S.A. de C.V.">Plásticos Gonzalo S.A. de C.V.</option>
                            <option value="Arte de mi parte S.A. de C.V.">Arte de mi parte S.A. de C.V.</option>
                            <option value="Manualidades y plásticos C.V.">Manualidades y plásticos C.V.</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top:10px; margin-bottom:10px;">
                    <label class="col-sm-3 col-form-label" style="color:white; margin-left:90px;">NOMBRE: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top:10px; margin-bottom:10px;">
                    <label class="col-sm-3 col-form-label" style="color:white; margin-left:90px;">CANTIDAD: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="cantidad" required>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top:10px; margin-bottom:10px;">
                    <label class="col-sm-3 col-form-label" style="color:white; margin-left:90px;">PRECIO: </label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="precio" step="0.01" min="0" max="9999.99"
                            maxlength="8" required>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top:10px; margin-bottom:10px;">
                    <label class="col-sm-3 col-form-label" style="color:white; margin-left:90px;">IMAGEN: </label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control" name="imagen" required>
                    </div>
                </div>

                <div class="row mb-3" style="margin-top:10px; margin-bottom:10px;">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary" style="margin-left:90px;">REGISTRAR</button>
                    </div>
                    <br><br>
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="articulos.php" role="button" style="margin-left:80px;">Cancelar<a>
                    </div>
                </div>

            </form>
        </div>
    </body>
</div>

</html>

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