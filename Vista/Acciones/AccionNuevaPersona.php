<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Persona</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Resultado del Alta</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-personalizada shadow-sm">
                    <div class="card-body text-center">
                        <?php
                            include_once __DIR__ . "/../../includes/formData.php";
                            include_once __DIR__ . "/../../includes/load.php";

                            $datosPersona = datosEnviados ();
                            $controlPersona = new ControladorPersona ();
                            $altaValida = $controlPersona -> darAlta ($datosPersona);

                            if ($altaValida) {
                                echo '<p class="text-success fw-bold">La persona se dio de alta correctamente</p>';
                            }
                            else {
                                echo '<p class="text-danger fw-bold">La persona ya se encuentra cargada en el sistema</p>';
                            }
                        ?>
                        <a href="../NuevaPersona.php" class="btn btn-personalizado mt-3 w-100">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
