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
    $stmt = $conexao->prepare($sql);
    $stmt->execute([$valor, $valorIdade]);
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
</body>
</html>
