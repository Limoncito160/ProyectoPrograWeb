<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h1 style="text-align: center;">Registro de Usuario</h1>

        <form method="post" action=procesar_registro.php>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre(s): </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombres">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Apellido Paterno: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ap_paterno">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Apellido Materno: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ap_materno">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fecha de Nacimiento: </label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="f_nacimiento">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Telefono: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="telefono">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Estado: </label>
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

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Localidad: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre_localidad">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Código Postal: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cp" pattern="[0-9]+">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Dirección: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direccion">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Correo Electronico: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña: </label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo de Usuario: </label>
                <div class="col-sm-6">
                    <select class="form-control" name="tipo_usuario">
                        <option value="Usuario">Usuario</option>
                        <option value="Administrador">Administrador</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="procesar_registro.php" role="button">Cancelar<a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>