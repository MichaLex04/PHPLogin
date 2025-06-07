<?php
require_once("models/FamiliaModel.php");

class Familia {
    private $model;

    public function __construct() {
        $this->model = new FamiliaModel();
    }

    public function index() {
        $data = $this->model->listar();
        require_once("views/familia/index.php");
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ["nombre" => $_POST["nombre"], "descripcion" => $_POST["descripcion"]];
            $this->model->insertar($data);
            header("Location: index.php?c=familia");
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $data = ["nombre" => $_POST["nombre"], "descripcion" => $_POST["descripcion"]];
            $this->model->actualizar($id, $data);
            header("Location: index.php?c=familia");
        }
    }

    public function eliminar() {
        $id = $_GET["id"];
        $this->model->eliminar($id);
        header("Location: index.php?c=familia");
    }
}
?>