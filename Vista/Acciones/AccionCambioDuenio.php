<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Titular</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Resultado del cambio de titular</h1>

        <?php
            include_once __DIR__ . "/../../includes/formData.php";
            include_once __DIR__ . "/../../includes/load.php";

            $controlPersona = new ControladorPersona ();
            $controlAuto = new ControladorAuto ();
            $datos = datosEnviados ();
            $auto = $controlAuto -> buscar ($datos["patente"]);
            if (!$auto) {
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body text-center">
                                <p class="text-danger fw-bold mb-3">No hay un auto cargado con esa patente</p>
                                    <a href="../Inicio/index.php" class="btn btn-personalizado w-100">Volver al menú</a>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
            }
            else {
                $persona = $controlPersona -> buscar ($datos["nroDni"]);
                if (!$persona) {
        ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-personalizada shadow-sm">
                                <div class="card-body text-center">
                                    <p class="text-danger fw-bold mb-3">No hay una persona cargada con ese DNI</p>
                                    <a href="../Inicio/index.php" class="btn btn-personalizado w-100">Volver al menú</a>
                                </div>
                            </div>
                        </div>
                    </div>

        <?php
                }
                else {
                    $datosAuto = [
                        "patente" => $auto -> getPatente (),
                        "marca" => $auto -> getMarca (),
                        "modelo" => $auto -> getModelo (),
                        "dniDuenio" => $datos["nroDni"],
                    ];
                    $actualizacion = $controlAuto -> actualizar ($datosAuto);

                    if ($actualizacion) {
        ?>
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body text-center">
                                <p class="text-success fw-bold mb-3">El cambio de titular se realizó correctamente</p>
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patente</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th>Nuevo DNI del dueño</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?= htmlspecialchars ($auto -> getPatente ()); ?></td>
                                                <td><?= htmlspecialchars ($auto -> getMarca ()); ?></td>
                                                <td><?= htmlspecialchars ($auto -> getModelo ()); ?></td>
                                                <td><?= htmlspecialchars ($datos["nroDni"]); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="../Inicio/index.php" class="btn btn-personalizado mt-3 w-100">Volver al menú</a>
                            </div>
                        </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
</body>
</html>