<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persona</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center">Resultado de búsqueda</h1>

        <?php
            include_once __DIR__ . "/../../includes/formData.php";
            include_once __DIR__ . "/../../includes/load.php";

            $datos = datosEnviados ();
            $controlPersona = new ControladorPersona ();
            $persona = $controlPersona -> buscar ($datos["dni"]);
            if (!$persona) {
                echo '<div class="alert alert-warning text-center">No hay una persona con ese DNI</div>';
            } else {
            ?>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
                        <td><?php echo htmlspecialchars ($persona -> getNroDni ()); ?></td>
                        <td><?php echo htmlspecialchars ($persona -> getApellido ()); ?></td>
                        <td><?php echo htmlspecialchars ($persona -> getNombre ()); ?></td>
                        <td><?php echo htmlspecialchars ($persona -> getFechaNac ()); ?></td>
                        <td><?php echo htmlspecialchars ($persona -> getTelefono ()); ?></td>
                        <td><?php echo htmlspecialchars ($persona -> getDomicilio ()); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>
        <?php
            $controlAuto = new ControladorAuto ();
            $listaAutos = $controlAuto -> listar ();
            $autosPersona = [];
            foreach ($listaAutos as $auto) {
                if ($persona -> getNroDni () === $auto -> getDniDuenio ()) {
                    array_push ($autosPersona, $auto);
                }
            }

            if (count ($autosPersona) === 0) {
                echo '<div class="alert alert-info mt-4 text-center">Esta persona no tiene autos registrados</div>';
            }
            else {
                echo '<h2 class="mt-5 mb-4 text-center">Autos del titular</h2>';
        ?>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autosPersona as $auto) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars ($auto -> getPatente ()); ?></td>
                            <td><?php echo htmlspecialchars ($auto -> getMarca ()); ?></td>
                            <td><?php echo htmlspecialchars ($auto -> getModelo ()); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
</body>
</html>