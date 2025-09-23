<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center">Resultado de búsqueda</h1>

        <?php
            include_once __DIR__ . "/../../includes/formData.php";
            include_once __DIR__ . "/../../includes/load.php";

            $datos = datosEnviados ();
            $controlAuto = new ControladorAuto ();
            $auto = $controlAuto -> buscar ($datos["patente"]);
            if (!$auto) {
                echo '<div class="alert alert-warning text-center">No hay un auto con esa patente</div>';
            } else {
            ?>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>DNI del dueño</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars ($auto -> getPatente ()); ?></td>
                        <td><?php echo htmlspecialchars ($auto -> getMarca ()); ?></td>
                        <td><?php echo htmlspecialchars ($auto -> getModelo ()); ?></td>
                        <td><?php echo htmlspecialchars ($auto -> getDniDuenio ()); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php } ?>
</div>
</body>
</html>