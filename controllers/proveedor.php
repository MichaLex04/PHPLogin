<?php
require_once("models/ProveedorModel.php");

class Proveedor {
    private $model;

    public function __construct() {
        $this->model = new ProveedorModel();
    }

    public function index() {
        $data = $this->model->listar();
        require_once("views/proveedor/index.php");
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ["nombre" => $_POST["nombre"], "ruc" => $_POST["ruc"], "celular" => $_POST["celular"], "direccion" => $_POST["direccion"]];
            $this->model->insertar($data);
            header("Location: index.php?c=proveedor");
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $data = ["nombre" => $_POST["nombre"], "ruc" => $_POST["ruc"], "celular" => $_POST["celular"], "direccion" => $_POST["direccion"]];
            $this->model->actualizar($id, $data);
            header("Location: index.php?c=proveedor");
        }
    }

    public function eliminar() {
        $id = $_GET["id"];
        $this->model->eliminar($id);
        header("Location: index.php?c=proveedor");
    }
}
?>