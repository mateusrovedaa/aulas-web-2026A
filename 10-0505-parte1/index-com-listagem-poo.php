<?php

class Pessoa
{
    private $id;
    private $nome;
    private $idade;

    public function __construct($nome, $idade, $id = null)
    {
        $this->nome  = $nome;
        $this->idade = $idade;
        $this->id    = $id;
    }

    public function getId()    { return $this->id; }
    public function getNome()  { return $this->nome; }
    public function getIdade() { return $this->idade; }
}

$host = "localhost";
$porta = "5432";
$database = "php2404";
$usuario = "postgres";
$senha = "postgres";

$dsn = "pgsql:host=$host;port=$porta;dbname=$database";
$conexao = new PDO($dsn, $usuario, $senha);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pessoa = new Pessoa($_POST['nome'], $_POST['idade']);

    $sql = "INSERT INTO pessoa(nome, idade) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$pessoa->getNome(), $pessoa->getIdade()]);
}

$sqlListagem = "SELECT * FROM pessoa";
$resultado = $conexao->query($sqlListagem);
$rows = $resultado->fetchAll(PDO::FETCH_ASSOC);

$pessoas = [];
foreach ($rows as $row) {
    $pessoas[] = new Pessoa($row['nome'], $row['idade'], $row['id']);
}

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
            <td><?= $pessoa->getId() ?></td>
            <td><?= $pessoa->getNome() ?></td>
            <td><?= $pessoa->getIdade() ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
