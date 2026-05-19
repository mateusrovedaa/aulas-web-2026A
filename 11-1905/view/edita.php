<?php
require_once __DIR__ . '/../controller/TimeController.php';

$controller = new TimeController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o time pelo id passado na URL
$id   = $_GET['id'] ?? null;
$time = $id ? $controller->buscarPorId($id) : null;

if (!$time) {
    header("Location: lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Time de Futebol</title>
</head>
<body>

    <h2>Editar Time de Futebol</h2>

    <form action="" method="POST">

        <!-- id oculto necessário para o UPDATE saber qual registro alterar -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($time->getId()) ?>">

        <label>Nome</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($time->getNome()) ?>" required>
        <br>

        <label>Ano de fundação</label>
        <input type="text" name="fundacao" value="<?= htmlspecialchars($time->getFundacao()) ?>" required>
        <br>

        <label>Nome do estádio</label>
        <input type="text" name="estadio" value="<?= htmlspecialchars($time->getEstadio()) ?>" required>
        <br>

        <label>Cor principal</label>
        <input type="text" name="corprincipal" value="<?= htmlspecialchars($time->getCorPrincipal()) ?>" required>
        <br>

        <button type="submit">Salvar alterações</button>
    </form>

    <a href="lista.php">Cancelar</a>

</body>
</html>
