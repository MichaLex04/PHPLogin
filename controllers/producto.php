<?php
require_once("models/ProductoModel.php");

class Producto {
    private $model;

    public function __construct() {
        $this->model = new ProductoModel();
    }

    public function index() {
        $data = $this->model->listar();
        require_once("views/producto/index.php");
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = ["nombre" => $_POST["nombre"], "descripcion" => $_POST["descripcion"], "precio" => $_POST["precio"], "stock" => $_POST["stock"], "idcategoria" => $_POST["idcategoria"], "idproveedor" => $_POST["idproveedor"]];
            $this->model->insertar($data);
            header("Location: index.php?c=producto");
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $data = ["nombre" => $_POST["nombre"], "descripcion" => $_POST["descripcion"], "precio" => $_POST["precio"], "stock" => $_POST["stock"], "idcategoria" => $_POST["idcategoria"], "idproveedor" => $_POST["idproveedor"]];
            $this->model->actualizar($id, $data);
            header("Location: index.php?c=producto");
        }
    }

    public function eliminar() {
        $id = $_GET["id"];
        $this->model->eliminar($id);
        header("Location: index.php?c=producto");
    }
}
?>