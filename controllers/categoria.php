<?php
require_once("models/CategoriaModel.php");

class Categoria {
    private $model;

    public function __construct() {
        $this->model = new CategoriaModel();
    }

    public function index() {
        $data = $this->model->listar();
        require_once("views/categoria/index.php");
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ["nombre" => $_POST["nombre"], "idfamilia" => $_POST["idfamilia"]];
            $this->model->insertar($data);
            header("Location: index.php?c=categoria");
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $data = ["nombre" => $_POST["nombre"], "idfamilia" => $_POST["idfamilia"]];
            $this->model->actualizar($id, $data);
            header("Location: index.php?c=categoria");
        }
    }

    public function eliminar() {
        $id = $_GET["id"];
        $this->model->eliminar($id);
        header("Location: index.php?c=categoria");
    }
}
?>