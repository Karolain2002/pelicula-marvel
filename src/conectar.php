<?php
class Conexion {
    private static $conexion;
//funcion que conecta con la base de datos
    public static function obtenerConexion() {
        if (!isset(self::$conexion)) {
            // Configurar los detalles de conexión según tu entorno
            self::$conexion = new mysqli("localhost", "root", "", "peliculas");
            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
        }
        return self::$conexion;
    }//end function obtenerConextion
}//end class conexión