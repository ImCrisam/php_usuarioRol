<?php
require_once "Conexion.php";
class dbRol
{
    public static function list(){
        $tabla = "rol";
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }
}