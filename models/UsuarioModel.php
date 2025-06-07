<?php
class UsuarioModel {
    private $usuarios = [
        ["usuario" => "admin", "clave" => "admin123"],
        ["usuario" => "juan", "clave" => "juan123"],
        ["usuario" => "maria", "clave" => "maria123"]
    ];

    public function validar($usuario, $clave) {
        foreach ($this->usuarios as $u) {
            if ($u['usuario'] === $usuario && $u['clave'] === $clave) {
                return true;
            }
        }
        return false;
    }
}
?>
