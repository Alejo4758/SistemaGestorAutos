<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Resultado de búsqueda</h1>

        <?php
            include_once __DIR__ . "/../../includes/load.php";
            include_once __DIR__ . "/../../includes/formData.php";

            $datos = datosEnviados ();
            $controlPersona = new ControladorPersona ();
            $persona = $controlPersona -> buscar ($datos["nroDni"]);
            if (!$persona) {
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body text-center">
                                <p class="text-danger fw-bold mb-3">No hay una persona con ese DNI</p>
                                <a href="../BuscarPersona.php" class="btn btn-personalizado w-100">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            else {
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body">
                                <form action="../ActualizarDatosPersona.php" method="post" class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" name="apellido" id="apellido" class="form-control" value="<?= htmlspecialchars ($persona -> getApellido ()) ?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)*$" required>
                                        <div class="invalid-feedback">Ingrese un apellido válido</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control" value="<?= htmlspecialchars ($persona -> getNombre ()) ?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñÜü]+)*$" required>
                                        <div class="invalid-feedback">Ingrese un nombre válido</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" name="fechaNac" id="fechaNac" class="form-control" value="<?= htmlspecialchars ($persona -> getFechaNac ()) ?>" required>
                                        <div class="invalid-feedback">Ingrese una fecha válida</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="text" name="telefono" id="telefono" class="form-control" value="<?= htmlspecialchars ($persona -> getTelefono ()) ?>" pattern="^[0-9]{2,4}[-\s]?[0-9]{6,8}$" required>
                                        <div class="invalid-feedback">Ingrese un teléfono válido</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="domicilio" class="form-label">Domicilio</label>
                                        <input type="text" name="domicilio" id="domicilio" class="form-control" value="<?= htmlspecialchars ($persona -> getDomicilio ()) ?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñÜü0-9\s\.\,\-\/#ºª]+$" required>
                                        <div class="invalid-feedback">Ingrese un domicilio válido</div>
                                    </div>
                                    <button type="submit" class="btn btn-personalizado w-100">Actualizar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
    <script src="../JS/Validacion.js"></script>
</body>
</html>