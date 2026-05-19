<?php
require_once __DIR__ . '/../controller/TimeController.php';

// Só aceita POST para evitar deleção via link GET
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new TimeController();
    $controller->deletar();
    exit;
}

// Qualquer acesso GET redireciona para a listagem
header("Location: lista.php");
