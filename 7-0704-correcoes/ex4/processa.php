<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['idade'];
    $usuario = $_POST['usuario'];
    
    echo "<script>window.alert('Cadastro realizado com sucesso!'); </script>";

    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<h3>Resumo dos dados recebidos:</h3>";
    echo "<ul>";
    echo "<li><strong>Nome:</strong> $nome</li>";
    echo "<li><strong>E-mail:</strong> $email</li>";
    echo "<li><strong>Idade:</strong> $idade anos</li>";
    echo "<li><strong>Usuário:</strong> $usuario</li>";
    echo "</ul>";
    
    echo "<br><a href='index.html'>Voltar para o cadastro</a>";
}
