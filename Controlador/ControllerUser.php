<?php
class ControllerUser
{
    public function login()
    {

        if (isset($_POST["email"]) && $_POST) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])
            ) {
                $set  = "correoUsuario";
                $valor = $_POST["email"];

                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $respuesta = dbUser::query($set, $valor);

                if (
                    $respuesta["correoUsuario"] == $_POST["email"] && $respuesta["contrasenaUsuario"] == $encriptar
                ) {

                    $_SESSION["auth"] = "ok";
                   $_SESSION["id"]                   = $respuesta["idUsuario"];
                   $_SESSION["name"]                   = $respuesta["nombreUsuario"];
                    $_SESSION["email"]                = $respuesta["correoUsuario"];
                    $_SESSION["password"]             = $respuesta["contrasenaUsuario"];
                    //   $_SESSION["idRol"]             = $respuesta["idRol"];
                    //$_SESSION["rol"]             = $respuesta["nombreRol"];

                    echo '<script> window.location = "usuarios"; </script>';
                } else {
                    echo '<br>
                    <div class="alert alert-warning">Fallo</div>';
                }
            }
        }
    }
    public function logup()
    {
        if (isset($_POST["email"]) && $_POST) {
            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])
            ) {
                $tabla = "usuario";

                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $datos = array(
                    "nombreUsuario"         => $_POST["name"],
                    "correoUsuario"         => $_POST["email"],
                    "contrasenaUsuario"     => $encriptar,
                    "idRol"                 => $_POST["rol"],
                );

                $respuesta = dbUser::create($datos);

                if ($respuesta == "ok") {

                    echo '<script> window.location = "usuarios";</script>';
                }
            } else {

                echo '<script> window.location = "usuarios";</script>';
            }
        }
    }
}
