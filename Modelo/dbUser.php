<?php 
require_once "Conexion.php";
class dbUser{

    public static function query($set, $value){
        $tabla = "usuario";
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla WHERE $set = :$set ORDER BY id DESC");

        $stmt->bindParam(":" . $set, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function list(){
        $tabla = "usuario";
        $stmt = Conexion::conectar()->prepare(
            "SELECT * FROM $tabla ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function create($datos){
        $tabla = "usuario";
        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO $tabla( 
                nombreUsuario, contrasenaUsuario, correoUsuario, idRol) 
                VALUES (:nombreUsuario, :contrasenaUsuario, :correoUsuario, :idRol)");

        $stmt->bindParam(":nombreUsuario", $datos["nombreUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasenaUsuario", $datos["contrasenaUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":correoUsuario", $datos["correoUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":idRol", $datos["idRol"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {

            return "error";
        }
        $stmt = null;
    }

    public static function delete(){

    }
    public static function update(){
        
    }




}
