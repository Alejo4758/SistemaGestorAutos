<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once __DIR__ . "/../includes/head.php" ?>
    <title>Buscar Auto</title>
</head>
<body>
    <h1>Busqueda de Auto</h1>
    <form action="Acciones/AccionBuscarAuto.php" method="post">
        <label for="patente"></label>
        <input type="text" id="patente" name="patente">
        <input type="submit">
    </form>
</body>
</html>