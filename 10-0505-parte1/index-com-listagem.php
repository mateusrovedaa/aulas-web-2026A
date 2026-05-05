<?php

$host = "localhost";
$porta = "5432";
$database = "php2404";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST['nome'];
    $valorIdade = $_POST['idade'];

    $sql = "INSERT INTO pessoa(nome, idade) VALUES (?, ?)";
    $smtm = $conexao->prepare($sql);
    $smtm->execute([$valor, $valorIdade]);
}

$sqlListagem = "SELECT * FROM pessoa";
$resultado = $conexao->query($sqlListagem);
$pessoas = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <label>Nome</label>
        <input type="text" name="nome">
        <label>Idade</label>
        <input type="number" name="idade">
        <button type="submit">Salvar</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
        </tr>
        <?php foreach ($pessoas as $pessoa): ?>
        <tr>
            <td><?= $pessoa['id'] ?></td>
            <td><?= $pessoa['nome'] ?></td>
            <td><?= $pessoa['idade'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
