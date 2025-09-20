<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_once __DIR__ . "/../includes/head.php" ?>
    <title>Ver Autos</title>
</head>
<body>
    <div class="container my-4">
    <h1 class="mb-4 text-center">Lista de Autos</h1>

    <?php
        include_once __DIR__ . "/../includes/load.php";

        $listaAutos = Auto :: listar ();
        if (count ($listaAutos) === 0) {
            echo '<div class="alert alert-warning text-center">No se han ingresado autos</div>';
        }
        else {
            echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
            foreach ($listaAutos as $auto) {
                $dniTitular = $auto -> getDniDuenio ();
                $persona = Persona :: seleccionar ($dniTitular);
    ?>
    <div class="col">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title"><?php echo $auto -> getMarca () . ' ' . $auto -> getModelo (); ?> </h5>
                <p class="card-text">
                    <strong>Patente: </strong><?php echo $auto -> getPatente (); ?><br>
                    <strong>Dueño: </strong> <?php echo $persona -> getNombre () . ' ' . $persona -> getApellido (); ?><br>
                    <strong>DNI: </strong> <?php echo $persona -> getNroDni (); ?>
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