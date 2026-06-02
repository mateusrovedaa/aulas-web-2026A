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
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($times as $time): // percorre cada objeto TimeFutebol ?>
                    <tr>
                        <td><?= $time->getId() ?></td>
                        <td><?= $time->getNome() ?></td>
                        <td><?= $time->getFundacao() ?></td>
                        <td><?= $time->getEstadio() ?></td>
                        <td><?= $time->getCorPrincipal() ?></td>
                        <td>
                            <!-- link para o formulário de edição passando o id pela URL -->
                            <a href="edita.php?id=<?= $time->getId() ?>">Editar</a>

                            <!-- formulário POST para deletar (evita deleção acidental por GET/link) -->
                            <form action="deleta.php" method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja realmente excluir o time <?= $time->getNome() ?>?')">
                                <input type="hidden" name="id" value="<?= $time->getId() ?>">
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
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
