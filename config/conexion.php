<?php
class Conexion {
    public static function conectar() {
        try {
            $conn = new PDO("pgsql:host=localhost;port=5432;dbname=PHPLogin", "postgres", "mlx");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>
