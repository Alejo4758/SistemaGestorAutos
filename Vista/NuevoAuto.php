<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Nuevo Auto</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Ingresar Nuevo Auto</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-personalizada shadow-sm">
                    <div class="card-body">
                        <form action="Acciones/AccionNuevoAuto.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="patente" class="form-label">Patente</label>
                                <input type="text" id="patente" name="patente" class="form-control" placeholder="FDE 345" pattern="[A-Z]{3}\s[0-9]{3}" required>
                                <div class="invalid-feedback">Ingrese una patente válida</div>
                            </div>
                            <div class="mb-3">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" id="marca" name="marca" class="form-control" placeholder="Fiat uno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)*$" required>
                                <div class="invalid-feedback">Ingrese una marca válida</div>
                            </div>
                            <div class="mb-3">
                                <label for="modelo" class="form-label">Modelo</label>
                                <input type="text" id="modelo" name="modelo" class="form-control" placeholder="2004" pattern="^(19|20)\d{2}$" required>
                                <div class="invalid-feedback">Ingrese un modelo válido</div>
                            </div>
                            <div class="mb-3">
                                <label for="dniDuenio" class="form-label">DNI del dueño</label>
                                <input type="text" id="dniDuenio" name="dniDuenio" class="form-control" placeholder="12345678" required pattern="^\d{8}$">
                                <div class="invalid-feedback">Ingrese un DNI válido de 8 dígitos</div>
                            </div>
                            <button type="submit" class="btn btn-personalizado w-100">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="JS/Validacion.js"></script>
</body>
</html>