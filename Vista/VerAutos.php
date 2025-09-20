<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ver Autos</title>
</head>
<body>
    <div class="container my-4">
    <h1 class="mb-4 text-center">Lista de Autos</h1>

    <?php
        include_once "../Control/ControladorAuto.php";
        include_once "../Control/ControladorPersona.php";

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