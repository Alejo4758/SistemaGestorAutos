<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Auto</title>
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

                            $datosAuto = datosEnviados ();
                            $controlAuto = new ControladorAuto ();
                            $controlPersona = new ControladorPersona ();
                            $persona = $controlPersona -> buscar ($datosAuto["dniDuenio"]);

                            if (!$persona) {
                                echo '<p class="text-danger fw-bold">No hay una persona cargada con ese DNI</p>';
                        ?>
                                <a href="../NuevaPersona.php" class="btn btn-personalizado mt-3 w-100">Cargar Persona</a>
                        <?php
                            }
                            else {
                                $altaValida = $controlAuto -> darAlta ($datosAuto);
                                if ($altaValida) {
                                    echo '<p class="text-success fw-bold">El auto se dio de alta correctamente</p>';
                                }
                                else {
                                    echo '<p class="text-danger fw-bold">No es posible dar de alta el auto</p>';
                                }
                        ?>
                                <a href="../NuevoAuto.php" class="btn btn-personalizado mt-3 w-100">Volver</a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>