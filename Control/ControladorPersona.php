<?php
    include_once __DIR__ . "/../Modelo/Persona.php";

    class ControladorPersona {
        // Métodos

        /**
         * Permite buscar a una persona por su número de documento
         * @param String $numDoc
         * @return Persona||null
         */
        public function buscar ($numDoc) {
            return Persona :: seleccionar ($numDoc);
        }

        /**
         * Devuelve un array con todas las personas cargadas
         * @param String $condicion
         * @return array
         */
        public function listar ($condicion = "") {
            return Persona :: listar ($condicion);
        }

        /**
         * Permite dar de alta a una persona
         * @param array $datos
         * @return boolean
         */
        public function darAlta ($datos) {
            $resultado = false;
            if (Persona :: seleccionar ($datos["nroDni"]) === null) {
                $nuevaPersona = new Persona (
                    $datos["nroDni"],
                    $datos["apellido"],
                    $datos["nombre"],
                    $datos["fechaNac"],
                    $datos["telefono"],
                    $datos["domicilio"]
                );
                $resultado = $nuevaPersona -> ingresar ();
            }
            return $resultado;
        }

        /**
         * Permite eliminar a una persona
         * @param String $numDoc
         * @return boolean
         */
        public function darBaja ($numDoc) {
            $resultado = false;
            $objPersona = Persona :: seleccionar ($numDoc);
            if ($objPersona) {
                $resultado = $objPersona -> eliminar ();
            }
            return $resultado;
        }

        /**
         * Permite modificar los datos de una persona
         * @param array $datos
         * @return boolean
         */
        public function actualizar ($datos) {
            $resultado = false;
            $objPersona = Persona :: seleccionar ($datos["nroDni"]);
            if ($objPersona) {
                $objPersona -> setApellido ($datos["apellido"]);
                $objPersona -> setNombre ($datos["nombre"]);
                $objPersona -> setFechaNac ($datos["fechaNac"]);
                $objPersona -> setTelefono ($datos["telefono"]);
                $objPersona -> setDomicilio ($datos["domicilio"]);
                $resultado = $objPersona -> modificar ();
            }
            return $resultado;
        }
    }
?>