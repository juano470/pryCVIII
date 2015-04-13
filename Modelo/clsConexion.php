<?php

/**
 * Description of Conexion:
 * Implementación del patrón Singleton para proporcionar una única instancia de esta clase
 * que será la encargada de proporcionar la conexión a la base de datos.
 * Como puede verse, uno de los métodos públicos es:
 *    getInstance: que devuelve un objeto de tipo Conexión y
 * El constructor y el método __clone() son privados para evitar su uso fuera de la clase.
 * @author Carlos Cuesta Iglesias
 */
require_once '../Config/Config.php';

class clsConexion {

    public static $pdo; // Una referencia a un objeto de tipo PDO (PHP Data Object)
    private static $conexion;

    /**
     * La función construct es privada para evitar que el objeto pueda ser creado mediante new.
     * Cuando este método se llama, crea una conexión a una base de datos.
     */
    private function __construct() {
        
    }

    /**
     * Es posible que un script envié varios mensajes getInstance(...) a un objeto de tipo Conexion,
     * sinembargo siempre se retornará la misma instancia de Conexión, garantizando así la
     * implementacion del Patrón Singleton
     * @param <type> $driver El tipo de driver: postgres, mysql, etc.
     * @param <type> $servidor El host: localhost o cualquier IP válida
     * @param <type> $usuario El usuario que tiene privilegios de acceso a la base de datos
     * @param <type> $clave La clave del usuario
     * @return <type> Una instancia de tipo Conexion
     */
    public static function getInstance() {
        // la siguiente condición garantiza que sólo se crea una instancia
        if (!isset(self::$conexion)) {
            self::$conexion = new self();  // llamado al constructor
            $baseDeDatos = 'dbcontenidos';
            $servidor = '127.0.0.1';
            $puerto = '5432';
            $usuario = 'postgres';
            $contrasena = 'admin';  // Aquí va la clave de tu usuario Postgres   <<<<<<<<<<<<<<<<<<<<<<
            self::$pdo = new PDO("pgsql:host=$servidor port=$puerto dbname=$baseDeDatos", $usuario, $contrasena);
        }
        return self::$conexion;
    }

    /**
     * Se sobreescribe este 'método mágico' para evitar que se creen clones de esta clase
     */
    private function __clone() { /* ... */
    }

    /* ---------------------------  Inicio de las funciones para construir la cláusula WHERE  ---------------------------- */

   
    public function getPDO() {
        return self::$pdo;
    }

}

?>