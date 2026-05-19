<?php
require_once __DIR__ . '/../controller/TimeController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new TimeController();
    $controller->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Time de Futebol</title>
</head>
<body>

    <h2>Cadastro de Time de Futebol</h2>

    <!-- action vazio envia o POST para o próprio arquivo -->
    <!-- method POST envia os dados no corpo da requisição (não na URL) -->
    <form action="" method="POST">

        <label>Nome</label>
        <input type="text" name="nome" required> <!-- name="nome" corresponde a $_POST['nome'] -->
        <br>

        <label>Ano de fundação</label>
        <input type="text" name="fundacao" required> <!-- name="fundacao" corresponde a $_POST['fundacao'] -->
        <br>

        <label>Nome do estádio</label>
        <input type="text" name="estadio" required> <!-- name="estadio" corresponde a $_POST['estadio'] -->
        <br>

        <label>Cor principal</label>
        <input type="text" name="corprincipal" required> <!-- name="corprincipal" corresponde a $_POST['corprincipal'] -->
        <br>

        <button type="submit">Cadastrar</button> <!-- botão que submete o formulário -->
    </form>

    <a href="lista.php">Ver times cadastrados</a>

</body>
</html>
