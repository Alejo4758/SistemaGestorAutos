<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php" ?>
    <title>Ver Personas</title>
</head>
<body>
    <div class="container my-4">
    <h1 class="mb-4 text-center">Lista de Personas</h1>

    <?php
        include_once __DIR__ . "/../includes/load.php";

        $controlPersona = new ControladorPersona ();
        $listaPersonas = $controlPersona -> listar ();
        if (count ($listaPersonas) === 0) {
            echo '<div class="alert alert-warning text-center">No se han ingresado personas</div>';
        }
        else {
            echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
            foreach ($listaPersonas as $persona) {
    ?>
    <div class="col">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo $persona -> getApellido () . ' ' . $persona -> getNombre (); ?> </h5>
                <p class="card-text">
                    <strong>DNI: </strong><?php echo $persona -> getNroDni (); ?><br>
                    <strong>Fecha de nacimiento: </strong> <?php echo $persona -> getFechaNac (); ?><br>
                    <strong>Número de teléfono: </strong> <?php echo $persona -> getTelefono (); ?><br>
                    <strong>Domicilio: </strong> <?php echo $persona -> getDomicilio (); ?>
                </p>
            </div>
        </div>
    </div>
    <?php
        }
        echo '</div>';
    }
    ?>
</div>
</body>
</html>