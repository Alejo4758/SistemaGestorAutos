<?php
    function datosEnviados () {
        $datos = [];
        if (!empty ($_POST)) {
            $datos = $_POST;
        }
        else if ($_GET) {
            $datos = $_GET;
        }
        if (!empty ($_FILES)) {
            foreach ($_FILES as $indice => $archivo) {
                $datos[$indice] = $archivo;
            }
        }
        if (count ($datos)) {
            foreach ($datos as $indice => $valor) {
                if ($valor === "") {
                    $datos[$indice] = "null";
                }
            }
        }
        return $datos;
    }
?>