<?php
// lista todos os times cadastrados
require_once __DIR__ . '/../controller/TimeController.php';

$controller = new TimeController();
$times      = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Times de Futebol</title>
</head>
<body>

    <h2>Times de Futebol cadastrados</h2>

    <?php if (count($times) > 0): // verifica se há registros para exibir ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Fundação</th>
                    <th>Estádio</th>
                    <th>Cor Principal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($times as $time): // percorre cada objeto TimeFutebol ?>
                    <tr>
                        <td><?= $time->getId() ?></td>           <!-- ID gerado pelo banco -->
                        <td><?= $time->getNome() ?></td>         <!-- nome do time -->
                        <td><?= $time->getFundacao() ?></td>     <!-- ano de fundação -->
                        <td><?= $time->getEstadio() ?></td>      <!-- nome do estádio -->
                        <td><?= $time->getCorPrincipal() ?></td> <!-- cor principal -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum time cadastrado.</p> <!-- exibido quando a tabela está vazia -->
    <?php endif; ?>

    <a href="cadastra.php">Cadastrar novo time</a>

</body>
</html>
