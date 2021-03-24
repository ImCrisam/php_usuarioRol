<?php
require_once "Conexion.php";
class dbUser
{

    public static function query($set, $valor)
    {
        $tabla = "usuario";
        $tabla2 = "rol";
        $joinOn = "usuario.idRol = rol.idRol";
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla 
            JOIN $tabla2 
            ON $joinOn
            WHERE $set = :$set"
        );

        $stmt->bindParam(":" . $set, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function list()
    {
        $tabla = "usuario";
        $tabla2 = "rol";
        $joinOn = "usuario.idRol = rol.idRol";
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla 
            JOIN $tabla2 
            ON $joinOn"
        );
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function create($datos)
    {
        $tabla = "usuario";
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla( 
                nombreUsuario, contrasenaUsuario, correoUsuario, idRol) 
                VALUES (:nombreUsuario, :contrasenaUsuario, :correoUsuario, :idRol)"
        );

        $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasenaUsuario", $datos["contrasenaUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":correoUsuario", $datos["correoUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":idRol", $datos["idRol"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {

            return "error";
        }
        $stmt = null;
    }

    public static function delete($dato)
    {
        $tabla = "usuario";

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idUsuario = :idUsuario");

        $stmt->bindParam(":idUsuario", $dato, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        /*     $stmt->close(); */

        $stmt = null;
    }
    public static function update($datos)
    {
        $tabla = "usuario";
        if ($datos["contrasenaUsuario"] != "") {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE $tabla 
               SET nombreUsuario = :nombreUsuario,
               contrasenaUsuario = :contrasenaUsuario,
               correoUsuario = :correoUsuario,
               idRol = :idRol
                WHERE idUsuario = :idUsuario"
            );
            $stmt->bindParam(":contrasenaUsuario", $datos["contrasenaUsuario"], PDO::PARAM_STR);
        } else {
            $stmt = Conexion::conectar()->prepare(
                "UPDATE $tabla 
            SET nombreUsuario = :nombreUsuario,
               correoUsuario = :correoUsuario,
               idRol = :idRol
                WHERE idUsuario = :idUsuario"
            );
        }

        $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":correoUsuario", $datos["correoUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":idRol", $datos["idRol"], PDO::PARAM_INT);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }


        $stmt = null;
    }
}
