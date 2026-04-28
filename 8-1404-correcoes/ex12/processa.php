<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Usando htmlspecialchars para segurança
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    
    // Concatenando as variáveis com um espaço no meio
    $nome_completo = $nome . " " . $sobrenome;
    
    echo "<h2>Olá!</h2>";
    echo "<p>Seja muito bem-vindo(a), <strong>$nome_completo</strong>!</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
