<?php
class ClienteModel {
    private $pdo;

    public function __construct() {
        require_once("config/conexion.php");
        $con = new Conexion();
        $this->pdo = $con->conectar();
    }

    public function listar() {
        $stmt = $this->pdo->query("SELECT * FROM sp_listar_clientes()");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($data) {
        $sql = "SELECT sp_insertar_cliente(?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    public function actualizar($id, $data) {
        $sql = "SELECT sp_actualizar_cliente(?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(array_merge([$id], array_values($data)));
    }

    public function eliminar($id) {
        $sql = "SELECT sp_eliminar_cliente(?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>