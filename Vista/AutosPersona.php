<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php"; ?>
    <title>Buscar Persona</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center">Buscar Persona</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form action="Acciones/AccionBuscarPersona.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="patente" class="form-label">Número de documento</label>
                                <input type="text" name="dni" id="dni" class="form-control" placeholder="12345678" required pattern="^\d{7,8}$">
                                <div class="invalid-feedback">Por favor, ingrese un DNI válido</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/ValidacionBuscarPersona.js"></script>
</body>
</html>