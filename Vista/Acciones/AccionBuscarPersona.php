<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
</head>
<body class="bg-dark text-light">
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Resultado de búsqueda</h1>

        <?php
            include_once __DIR__ . "/../../includes/formData.php";
            include_once __DIR__ . "/../../includes/load.php";

            $datos = datosEnviados ();
            $controlPersona = new ControladorPersona ();
            $persona = $controlPersona -> buscar ($datos["dni"]);
            if (!$persona) {
        ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-personalizada shadow-sm">
                            <div class="card-body text-center">
                                <p class="text-danger fw-bold mb-3">No hay una persona con ese DNI</p>
                                <a href="../AutosPersona.php" class="btn btn-personalizado w-100">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
            else {
        ?>
                <div class="card card-personalizada shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark table-striped table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>Apellido</th>
                                        <th>Nombre</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Teléfono</th>
                                        <th>Domicilio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= htmlspecialchars ($persona -> getNroDni ()); ?></td>
                                        <td><?= htmlspecialchars ($persona -> getApellido ()); ?></td>
                                        <td><?= htmlspecialchars ($persona -> getNombre ()); ?></td>
                                        <td><?= htmlspecialchars ($persona -> getFechaNac ()); ?></td>
                                        <td><?= htmlspecialchars ($persona -> getTelefono ()); ?></td>
                                        <td><?= htmlspecialchars ($persona -> getDomicilio ()); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <?php
                    $controlAuto = new ControladorAuto ();
                    $listaAutos = $controlAuto -> listar ();
                    $autosPersona = [];
                    foreach ($listaAutos as $auto) {
                        if ($persona -> getNroDni () === $auto -> getDniDuenio ()) {
                            $autosPersona[] = $auto;
                        }
                    }
                    if (count($autosPersona) === 0) {
                ?>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card-body text-center">
                                    <p class="text-danger fw-bold mb-3">Esta persona no tiene autos registrados</p>
                                </div>
                            </div>
                        </div>
                <?php 
                    }
                    else {
                ?>
                        <h2 class="mt-5 mb-4 text-center titulo-personalizado">Autos del titular</h2>
                            <div class="card card-personalizada shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-dark table-striped table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Patente</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach ($autosPersona as $auto) { 
                                                ?>
                                                <tr>
                                                    <td><?= htmlspecialchars ($auto -> getPatente ()); ?></td>
                                                    <td><?= htmlspecialchars ($auto -> getMarca ()); ?></td>
                                                    <td><?= htmlspecialchars ($auto -> getModelo ()); ?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                <?php 
                    }
                ?>
                <div class="mt-3 text-center">
                    <a href="../AutosPersona.php" class="btn btn-personalizado w-100">Volver</a>
                </div>
            <?php
                }
            ?>
    </div>
</body>
</html>
