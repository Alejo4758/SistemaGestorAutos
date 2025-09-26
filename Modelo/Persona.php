<?php
    include_once __DIR__ . "/Conector/BaseDatos.php";
    class Persona {
        private $nroDni;
        private $apellido;
        private $nombre;
        private $fechaNac;
        private $telefono;
        private $domicilio;

        // Constructor
        public function __construct ($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {
            $this -> nroDni = $nroDni;
            $this -> apellido = $apellido;
            $this -> nombre = $nombre;
            $this -> fechaNac = $fechaNac;
            $this -> telefono = $telefono;
            $this -> domicilio = $domicilio;
        }

        // Getters
        public function getNroDni () {
            return $this -> nroDni;
        }

        public function getApellido () {
            return $this -> apellido;
        }

        public function getNombre () {
            return $this -> nombre;
        }

        public function getFechaNac () {
            return $this -> fechaNac;
        }

        public function getTelefono () {
            return $this -> telefono;
        }

        public function getDomicilio () {
            return $this -> domicilio;
        }

        // Setters

        public function setNroDni ($numDoc) {
            $this -> nroDni = $numDoc;
        }

        public function setApellido ($nuevoApellido) {
            $this -> apellido = $nuevoApellido;
        }

        public function setNombre ($nuevoNombre) {
            $this -> nombre = $nuevoNombre;
        }

        public function setFechaNac ($fechaNacimiento) {
            $this -> fechaNac = $fechaNacimiento;
        }

        public function setTelefono ($nuevoTelefono) {
            $this -> telefono = $nuevoTelefono;
        }

        public function setDomicilio ($nuevoDomicilio) {
            $this -> domicilio = $nuevoDomicilio;
        }

        // A String
        public function __toString () {
            $cadena = "----------Persona----------<br>";
            $cadena .= "Número de documento: " . $this -> getNroDni () . "<br>";
            $cadena .= "Apellido: " . $this -> getApellido () . "<br>";
            $cadena .= "Nombre: " . $this -> getNombre () . "<br>";
            $cadena .= "Fecha de nacimiento: " . $this -> getFechaNac () . "<br>";
            $cadena .= "Número de teléfono: " . $this -> getTelefono () . "<br>";
            $cadena .= "Domicilio: " . $this -> getDomicilio () . "<br>";
            return $cadena;
        }

        // Propias de la clase

        /**
         * Método para eliminar a una persona
         * @return boolean
         */
        public function eliminar () {
            $respuesta = false;
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "DELETE FROM Persona
                             WHERE nroDni = {$this -> getNroDni ()}";
                if ($objBD -> Ejecutar ($consulta) !== -1) {
                    $respuesta = true;
                }
                else {
                    throw new Exception ($objBD -> getError ());
                }
            }
            else {
                throw new Exception ($objBD -> getError ());
            }
            return $respuesta;
        }

        /**
         * Método para modificar a una persona
         * @return boolean
         */
        public function modificar () {
            $respuesta = false;
            $objDB = new BaseDatos ();
            if ($objDB -> Iniciar ()) {
                $consulta = "UPDATE Persona
                             SET apellido = '{$this -> getApellido ()}',
                                 nombre = '{$this -> getNombre ()}',
                                 fechaNac = '{$this -> getFechaNac ()}',
                                 telefono = '{$this -> getTelefono ()}',
                                 domicilio = '{$this -> getDomicilio ()}'
                             WHERE nroDni = '{$this -> getNroDni ()}'";
                if ($objDB -> Ejecutar ($consulta)) {
                    $respuesta = true;
                }
                else {
                    throw new Exception ($objDB -> getError ());
                }
            }
            else {
                throw new Exception ($objDB -> getError ());
            }
            return $respuesta;
        }

        /**
         * Método para ingresar a una persona
         * @return boolean
         */
        public function ingresar () {
            $respuesta = false;
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "INSERT INTO Persona (nroDni, apellido, nombre, fechaNac, telefono, domicilio) 
                             VALUES ('{$this -> getNroDni ()}', '{$this -> getApellido ()}',
                                     '{$this -> getNombre ()}', '{$this -> getFechaNac ()}',
                                     '{$this -> getTelefono ()}', '{$this -> getDomicilio ()}')";
                if ($objBD -> Ejecutar ($consulta)) {
                    $respuesta = true;
                }
                else {
                    throw new Exception ($objBD -> getError ());
                }
            }
            else {
                throw new Exception ($objBD -> getError ());
            }
            return $respuesta;
        }

        /**
         * Método para seleccionar una persona por su número de documento
         * @return null||Persona
         */
        public static function seleccionar ($numeroDoc) {
            $personaEncontrada = null;
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "SELECT * FROM Persona WHERE nroDni = '{$numeroDoc}'";
                if ($objBD -> Ejecutar ($consulta) !== -1) {
                    if ($fila = $objBD -> Registro ()) {
                        $personaEncontrada = new Persona (
                            $fila["NroDni"],
                            $fila["Apellido"],
                            $fila["Nombre"],
                            $fila["fechaNac"],
                            $fila["Telefono"],
                            $fila["Domicilio"],
                        );
                    }
                }
                else {
                    throw new Exception ($objBD -> getError ());
                }
            }
            else {
                throw new Exception ($objBD -> getError ());
            }
            return $personaEncontrada;
        }

        /**
         * Método para listar todas las personas cargadas
         * @param String $condicion
         * @return array
         */
        public static function listar ($condicion = "") {
            $coleccionPersonas = [];
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "SELECT * FROM Persona";
                if ($condicion !== "") {
                    $consulta .= "WHERE " . $condicion;
                }
                if ($objBD -> Ejecutar ($consulta) !== -1) {
                    while ($fila = $objBD -> Registro ()) {
                        $objPersona = new Persona (
                            $fila["NroDni"],
                            $fila["Apellido"],
                            $fila["Nombre"],
                            $fila["fechaNac"],
                            $fila["Telefono"],
                            $fila["Domicilio"]
                        );
                        array_push ($coleccionPersonas, $objPersona);
                    }
                }
                else {
                    throw new Exception ($objBD -> getError ());
                }
            }
            else {
                throw new Exception ($objBD -> getError ());
            }
            return $coleccionPersonas;
        }
    }
?>