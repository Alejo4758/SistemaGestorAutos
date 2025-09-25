<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto</title>
</head>
<body class="bg-dark text-light">
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Resultado de búsqueda</h1>

        <?php
            include_once __DIR__ . "/../../includes/formData.php";
            include_once __DIR__ . "/../../includes/load.php";

            $datos = datosEnviados ();
            $controlAuto = new ControladorAuto ();
            $auto = $controlAuto -> buscar ($datos["patente"]);

            if (!$auto) { 
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body text-center">
                                <p class="text-danger fw-bold mb-3">No hay un auto con esa patente</p>
                                <a href="../BuscarAuto.php" class="btn btn-personalizado w-100">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            else { 
        ?>
                <div class="card card-personalizada shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Patente</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>DNI del dueño</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= htmlspecialchars($auto->getPatente()); ?></td>
                                        <td><?= htmlspecialchars($auto->getMarca()); ?></td>
                                        <td><?= htmlspecialchars($auto->getModelo()); ?></td>
                                        <td><?= htmlspecialchars($auto->getDniDuenio()); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 text-center">
                            <a href="../BuscarAuto.php" class="btn btn-personalizado w-100">Volver</a>
                        </div>
                    </div>
                </div>
        <?php 
            } 
        ?>
    </div>
</body>
</html>
