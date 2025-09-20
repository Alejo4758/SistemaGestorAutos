<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php" ?>
    <title>Buscar Auto</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center">Búsqueda de Auto</h1>
        <form action="Acciones/AccionBuscarAuto.php" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="patente" class="form-label">Patente</label>
                <input type="text" id="patente" name="patente" class="form-control" placeholder="Ingrese la patente" required>
                <div class="invalid-feedback">
                    Por favor ingrese una patente válida
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</body>
</html>