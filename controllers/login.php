<?php
require_once "models/UsuarioModel.php";

class Login {
    public function index() {
        require_once "views/login/index.php";
    }

    public function validar() {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        $modelo = new UsuarioModel();
        if ($modelo->validar($usuario, $clave)) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php?c=cliente&a=index");
        } else {
            $error = "Credenciales incorrectas";
            require_once "views/login/index.php";
        }
    }

    public function salir() {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}
?>
