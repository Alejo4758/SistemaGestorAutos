<?php
    include_once "Conector/BaseDatos.php";
    Class Auto {
        private $patente;
        private $marca;
        private $modelo;
        private $dniDuenio;

        // Constructor
        public function __construct ($patente, $marca, $modelo, $dniDuenio) {
            $this -> patente = $patente;
            $this -> marca = $marca;
            $this -> modelo = $modelo;
            $this -> dniDuenio = $dniDuenio;
        }

        // Getters
        public function getPatente () {
            return $this -> patente;
        }

        public function getMarca () {
            return $this -> marca;
        }

        public function getModelo () {
            return $this -> modelo;
        }

        public function getDniDuenio () {
            return $this -> dniDuenio;
        }

        // Setters

        public function setPatente ($unaPatente) {
            $this -> patente = $unaPatente;
        }

        public function setMarca ($unaMarca) {
            $this -> marca = $unaMarca;
        }

        public function setModelo ($unModelo) {
            $this -> modelo = $unModelo;
        }

        public function setDniDuenio ($docDuenio) {
            $this -> dniDuenio = $docDuenio;
        }

        // A String
        public function __toString () {
            $cadena = "----------Auto----------<br>";
            $cadena .= "Patente: " . $this -> getPatente () . "<br>";
            $cadena .= "Marca: " . $this -> getMarca () . "<br>";
            $cadena .= "Modelo: " . $this -> getModelo () . "<br>";
            $cadena .= "Número de documento del dueño: " . $this -> getDniDuenio () . "<br>";
            return $cadena;
        }

        // Propias de la clase

        /**
         * Método para eliminar un auto
         * @return boolean
         */
        public function eliminar () {
            $respuesta = false;
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "DELETE FROM Auto
                             WHERE patente = {$this -> getPatente ()}";
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
         * Método para modificar un auto
         * @return boolean
         */
        public function modificar () {
            $respuesta = false;
            $objDB = new BaseDatos ();
            if ($objDB -> Iniciar ()) {
                $consulta = "UPDATE Auto
                             SET marca = '{$this -> getMarca ()}',
                                 modelo = '{$this -> getModelo ()}',
                                 dniDuenio = '{$this -> getDniDuenio ()}'
                             WHERE patente = '{$this -> getPatente ()}'";
                if ($objDB -> Ejecutar ($consulta) !== 1) {
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
         * Método para ingresar un auto
         * @return boolean
         */
        public function ingresar () {
            $respuesta = false;
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "INSERT INTO Auto (patente, marca, modelo, dniDuenio) 
                             VALUES ('{$this -> getPatente ()}', '{$this -> getMarca ()}',
                                     '{$this -> getModelo ()}', '{$this -> getDniDuenio ()}'";
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
         * Método para seleccionar un auto por su patente
         * @return null||Auto
         */
        public static function seleccionar ($patenteAuto) {
            $autoEncontrado = null;
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "SELECT * FROM Auto WHERE patente = {$patenteAuto}";
                if ($objBD -> Ejecutar ($consulta) !== -1) {
                    if ($fila = $objBD -> Registro ()) {
                        $persona = Persona :: seleccionar($fila["dniDuenio"]);
                        if ($persona === null) {
                            throw new Exception ("Dueño no encontrado con número de documento: " . $fila["dniDuenio"]);
                        }
                        $autoEncontrado = new Auto (
                            $fila["patente"],
                            $fila["marca"],
                            $fila["modelo"],
                            $fila["dniDuenio"],
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
            return $autoEncontrado;
        }

        /**
         * Método para listar todos los autos cargadas
         * @param String $condicion
         * @return array
         */
        public static function listar ($condicion = "") {
            $coleccionAutos = [];
            $objBD = new BaseDatos ();
            if ($objBD -> Iniciar ()) {
                $consulta = "SELECT * FROM Auto";
                if ($condicion !== "") {
                    $consulta .= "WHERE " . $condicion;
                }
                if ($objBD -> Ejecutar ($consulta) !== -1) {
                    while ($fila = $objBD -> Registro ()) {
                        $objAuto = new Auto (
                            $fila["Patente"],
                            $fila["Marca"],
                            $fila["Modelo"],
                            $fila["DniDuenio"]
                        );
                        array_push ($coleccionAutos, $objAuto);
                    }
                }
                else {
                    throw new Exception ($objBD -> getError ());
                }
            }
            else {
                throw new Exception ($objBD -> getError ());
            }
            return $coleccionAutos;
        }
    }
?>