<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>Nueva Persona</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Ingresar Nueva Persona</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-personalizada shadow-sm">
                    <div class="card-body">
                        <form action="Acciones/AccionNuevaPersona.php" method="post" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="dni" class="form-label">Número de documento</label>
                                <input type="text" id="dni" name="dni" class="form-control" placeholder="12345678" pattern="^\d{8}$" required>
                                <div class="invalid-feedback">Ingrese un DNI válido de 8 dígitos</div>
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Lopez" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)*$" required>
                                <div class="invalid-feedback">Ingrese un apellido</div>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Alejo" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)*$" required>
                                <div class="invalid-feedback">Ingrese un nombre</div>
                            </div>
                            <div class="mb-3">
                                <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                                <input type="date" id="fechaNac" name="fechaNac" class="form-control" required>
                                <div class="invalid-feedback">Ingrese una fecha de nacimiento</div>
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Número de teléfono</label>
                                <input type="text" id="telefono" name="telefono" class="form-control" placeholder="299 1234567" pattern="^[0-9]{2,4}[-\s]?[0-9]{6,8}$" required>
                                <div class="invalid-feedback">Ingrese un número de teléfono</div>
                            </div>
                            <div class="mb-3">
                                <label for="domicilio" class="form-label">Domicilio</label>
                                <input type="text" id="domicilio" name="domicilio" class="form-control" placeholder="San Martín 123" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü0-9\s\.\,\-\/#ºª]+$" required>
                                <div class="invalid-feedback">Ingrese un domicilio</div>
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