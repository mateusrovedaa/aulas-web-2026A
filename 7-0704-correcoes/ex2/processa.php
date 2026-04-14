<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idade = (int)$_POST['idade'];
    
    echo "<h2>Resultado da Verificação:</h2>";
    
    if ($idade >= 16) {
        echo "<p>Você tem $idade anos e <strong>pode</strong> fazer o título de eleitor.</p>";
    } else {
        echo "<p>Você tem $idade anos e ainda <strong>não pode</strong> fazer o título de eleitor. A idade mínima é 16 anos.</p>";
    }
    
    echo "<br><a href='index.html'>Voltar</a>";
}
