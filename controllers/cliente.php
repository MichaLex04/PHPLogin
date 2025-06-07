<?php
require_once("models/ClienteModel.php");

class Cliente {
    private $model;

    public function __construct() {
        $this->model = new ClienteModel();
    }

    public function index() {
        $data = $this->model->listar();
        require_once("views/cliente/index.php");
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ["nombre" => $_POST["nombre"], "apellidos" => $_POST["apellidos"], "dni" => $_POST["dni"], "celular" => $_POST["celular"], "direccion" => $_POST["direccion"]];
            $this->model->insertar($data);
            header("Location: index.php?c=cliente");
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $data = ["nombre" => $_POST["nombre"], "apellidos" => $_POST["apellidos"], "dni" => $_POST["dni"], "celular" => $_POST["celular"], "direccion" => $_POST["direccion"]];
            $this->model->actualizar($id, $data);
            header("Location: index.php?c=cliente");
        }
    }

    public function eliminar() {
        $id = $_GET["id"];
        $this->model->eliminar($id);
        header("Location: index.php?c=cliente");
    }
}
?>