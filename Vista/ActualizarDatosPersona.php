<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php"; ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización</title>
</head>
<body>
    <div class="container my-4">
        <?php
            include_once __DIR__ . "/../includes/load.php";
            include_once __DIR__ . "/../includes/formData.php";

            $datosPersona = datosEnviados ();
            $controlPersona = new ControladorPersona ();
            if ($controlPersona -> actualizar ($datosPersona)) {
        ?>
                <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-personalizada shadow-sm">
                                <div class="card-body text-center">
                                    <p class="text-success fw-bold mb-3">Datos actualizados correctamente</p>
                                    <a href="#" class="btn btn-personalizado w-100">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
            }
            else {
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body text-center">
                                <p class="text-danger fw-bold mb-3">No se pudieron actualizar los datos</p>
                                <a href="Inicio/index.php" class="btn btn-personalizado w-100">Volver al menú</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</body>
</html>