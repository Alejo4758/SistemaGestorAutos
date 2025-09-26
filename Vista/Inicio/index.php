<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../../includes/head.php"; ?>
    <link rel="stylesheet" href="../CSS/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center titulo-personalizado">Menú de Operaciones</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Ver Autos</h5>
                            <p class="card-text flex-grow-1">Visualizar todos los autos que están registrados en el sistema</p>
                            <a href="../VerAutos.php" class="btn btn-personalizado mt-auto w-100">Mostrar</a>
                    </div>
                </div>
            </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Ver Personas</h5>
                    <p class="card-text flex-grow-1">Visualizar todas las personas que están registradas en el sistema</p>
                    <a href="../ListaPersonas.php" class="btn btn-personalizado mt-auto w-100">Mostrar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Nueva Persona</h5>
                    <p class="card-text flex-grow-1">Registrar una nueva persona en el sistema</p>
                    <a href="../NuevaPersona.php" class="btn btn-personalizado mt-auto w-100">Registrar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Nuevo Auto</h5>
                    <p class="card-text flex-grow-1">Registrar un nuevo auto en el sistema</p>
                    <a href="../NuevoAuto.php" class="btn btn-personalizado mt-auto w-100">Registrar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Buscar Auto</h5>
                    <p class="card-text flex-grow-1">Buscar un auto a través de su patente</p>
                    <a href="../BuscarAuto.php" class="btn btn-personalizado mt-auto w-100">Buscar</a>
                </div>
          </div>
        </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Buscar Persona</h5>
                    <p class="card-text flex-grow-1">Buscar una persona a través de su DNI</p>
                    <a href="../AutosPersona.php" class="btn btn-personalizado mt-auto w-100">Buscar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Cambiar dueño</h5>
                    <p class="card-text flex-grow-1">Cambiar el titular de un auto en el sistema</p>
                    <a href="../CambioDuenio.php" class="btn btn-personalizado mt-auto w-100">Cambiar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-personalizada h-100 text-center shadow-sm d-flex flex-column">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Actualizar Persona</h5>
                    <p class="card-text flex-grow-1">Actualizar los datos de una persona</p>
                    <a href="../BuscarPersona.php" class="btn btn-personalizado mt-auto w-100">Actualizar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>