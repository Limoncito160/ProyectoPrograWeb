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
    <div class="container my-5">
        <h1 style="text-align: center;">Registro Productos</h1>


        <form method="post" action=validar_registroProductos.php>
            <div class="row mb-3">
            <label for="proveedor">Proveedor</label>
                <select name="provedor" id="proveedor">
                    <option value="1">Proveedor</option>
                </select>
                <label class="col-sm-3 col-form-label">Proveedor: </label>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Producto: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="producto">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Precio </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="precio">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cantidad </label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="Cantidad">
                </div>
            </div>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="procesar_registro.php" role="button">Cancelar<a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>
