<?php
    include_once __DIR__ . "/../Modelo/Auto.php";

    class ControladorAuto {
        // Métodos

        /**
         * Permite buscar un auto por su patente
         * @param String $patenteAuto
         * @return boolean||Auto
         */
        public function buscar ($patente) {
            return Auto :: seleccionar ($patente);
        }

        /**
         * Devuelve un array con todos los autos cargados
         * @return array
         */
        public function listar ($condicion = "") {
            return Auto :: listar ($condicion);
        }

        /**
         * Permite dar de alta un auto
         * @param array $datos
         * @return boolean
         */
        public function darAlta ($datos) {
            $resultado = false;
            if (Auto :: seleccionar ($datos["patente"]) === null) {
                $nuevoAuto = new Auto (
                    $datos["patente"],
                    $datos["marca"],
                    $datos["modelo"],
                    $datos["dniDuenio"]
                );
                $resultado = $nuevoAuto -> ingresar ();
            }
            return $resultado;
        }

        /**
         * Permite eliminar un auto
         * @param String $patente
         * @return boolean
         */
        public function darBaja ($patente) {
            $resultado = false;
            $objAuto = Auto :: seleccionar ($patente);
            if ($objAuto) {
                $resultado = $objAuto -> eliminar ();
            }
            return $resultado;
        }

        /**
         * Permite modificar los datos de un auto
         * @param array $datos
         * @return boolean
         */
        public function actualizar ($datos) {
            $resultado = false;
            $objAuto = Auto :: seleccionar ($datos["patente"]);
            if ($objAuto) {
                $objAuto -> setMarca ($datos["marca"]);
                $objAuto -> setModelo ($datos["modelo"]);
                $objAuto -> setDniDuenio ($datos["dniDuenio"]);
                $resultado = $objAuto -> modificar ();
            }
            return $resultado;
        }
    }
?>