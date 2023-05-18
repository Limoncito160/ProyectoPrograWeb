<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="es">

<div class="container background-container" style="margin-start:10px; margin-bottom:20px; border-radius:20px;">

    <head>
        <title>Registro</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/registro.css">
    </head>

    <body>
        <div class="container my-5">
            <h1 style="color:white;"><strong>REGISTRO DE USUARIO</strong></h1>

            <form method="post" action=procesar_registro.php>
                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Nombre(s): </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombres" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Apellido Paterno: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="ap_paterno" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Apellido Materno: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="ap_materno" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Fecha de Nacimiento: </label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="f_nacimiento" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Telefono: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="telefono" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Estado: </label>
                    <div class="col-sm-6">
                        <select class="form-control" class="form-control" name="nombre_estado">
                            <?php
                            $estados = array(
                                "Aguascalientes",
                                "Baja California",
                                "Baja California Sur",
                                "Campeche",
                                "Chiapas",
                                "Chihuahua",
                                "Ciudad de México",
                                "Coahuila",
                                "Colima",
                                "Durango",
                                "México",
                                "Guanajuato",
                                "Guerrero",
                                "Hidalgo",
                                "Jalisco",
                                "Michoacán",
                                "Morelos",
                                "Nayarit",
                                "Nuevo León",
                                "Oaxaca",
                                "Puebla",
                                "Querétaro",
                                "Quintana Roo",
                                "San Luis Potosí",
                                "Sinaloa",
                                "Sonora",
                                "Tabasco",
                                "Tamaulipas",
                                "Tlaxcala",
                                "Veracruz",
                                "Yucatán",
                                "Zacatecas"
                            );

                            foreach ($estados as $estado) {
                                echo "<option value=\"$estado\">$estado</option>";
                            }
                            ?>
                        </select>
                        </select>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Localidad: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="nombre_localidad" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Código Postal: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="cp" pattern="[0-9]+" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Dirección: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="direccion" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Correo Electronico: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="email" required>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" class="row mb-3">
                    <label style="color:white;" class="col-sm-3 col-form-label">Contraseña: </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>

                <div style="display:none;" class="row mb-3">
                    <label class="col-sm-3 col-form-label">Tipo de Usuario: </label>
                    <div class="col-sm-6">
                        <select class="form-control" name="tipo_usuario">
                            <option value="Usuario">Usuario</option>
                            <!-- <option value="Administrador">Administrador</option> -->
                        </select>
                    </div>
                </div>

                <div style="margin-top:10px; margin-bottom:10px;" style="margin-bottom:20px; margin-left:300px; margin-top:20px;" class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">REGISTRAR</button>
                    </div>
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="login.php" role="button">Cancelar<a>
                    </div>
                </div>

            </form>
        </div>
    </body>
</div>

<footer class="text-center text-white" style="background-color: black; color:white; font-weight: lighter;">
  <div>Conoce mas en:
    <a href="#">GitHub</a>
  </div>

  <div class="text-center text-white p-3" style="background-color: black;">
    © Mayo 2023 Copyright: Pincheles de S.A. de C.V.
  </div>

</footer>

</html>

<style>
  .background-container {
    background-image: url('img/background.jpg');
    background-size: cover;
    background-repeat: no-repeat;
  }
</style>