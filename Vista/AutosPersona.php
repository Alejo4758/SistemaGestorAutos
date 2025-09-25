<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php"; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Buscar Persona</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Buscar Persona</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-personalizada shadow-sm">
                    <div class="card-body">
                        <form action="Acciones/AccionBuscarPersona.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="patente" class="form-label">Número de documento</label>
                                <input type="text" name="dni" id="dni" class="form-control" placeholder="12345678" required pattern="^\d{8}$">
                                <div class="invalid-feedback">Por favor, ingrese un DNI válido</div>
                            </div>
                            <button type="submit" class="btn btn-personalizado w-100">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/Validacion.js"></script>
</body>
</html>