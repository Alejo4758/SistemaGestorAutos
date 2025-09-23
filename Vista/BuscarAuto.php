<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php" ?>
    <title>Buscar Auto</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center">Buscar Auto</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="Acciones/AccionBuscarAuto.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="patente" class="form-label">Patente</label>
                                <input type="text" name="patente" id="patente" class="form-control" placeholder="ABC 123" required pattern="[A-Z]{3}\s[0-9]{3}">
                                <div class="invalid-feedback">Por favor, ingrese una patente válida</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/Validacion.js"></script>
</body>
</html>