<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php" ?>
    <link rel="stylesheet" href="CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>
</head>
<body>
    <div class="container my-4">
        <h1 class="mb-4 text-center titulo-personalizado">Lista de Autos</h1>

        <?php
            include_once __DIR__ . "/../includes/load.php";

            $controlAuto = new ControladorAuto ();
            $controlPersona = new ControladorPersona ();
            $listaAutos = $controlAuto -> listar ();
            if (count ($listaAutos) === 0) {
                echo '<div class="alert alert-warning text-center">No se han ingresado autos</div>';
            }
            else {
                echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
                foreach ($listaAutos as $auto) {
                    $dniTitular = $auto -> getDniDuenio ();
                    $persona = $controlPersona -> buscar ($dniTitular);
        ?>

        <div class="col">
            <div class="card card-personalizada shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($auto->getMarca() . ' ' . $auto->getModelo()); ?> </h5>
                        <p class="card-text">
                            <strong>Patente: </strong><?php echo htmlspecialchars($auto->getPatente()); ?><br>
                            <strong>Dueño: </strong> <?php echo htmlspecialchars($persona->getNombre() . ' ' . $persona->getApellido()); ?><br>
                            <strong>DNI: </strong> <?php echo htmlspecialchars($persona->getNroDni()); ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php
                }
                echo '</div>';
            }
        ?>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-personalizada shadow-sm">
                    <div class="card-body text-center">
                        <a href="Inicio/index.php" class="btn btn-personalizado w-100">Volver al menú</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
