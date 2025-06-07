<?php
// Enrutador básico
$controlador = $_GET['c'] ?? 'login';
$accion = $_GET['a'] ?? 'index';

require_once "controllers/" . $controlador . ".php";
$clase = ucfirst($controlador);
$objeto = new $clase();
$objeto->$accion();
?>
