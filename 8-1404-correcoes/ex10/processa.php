<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano_nascimento = (int)$_POST['ano_nascimento'];
    $ano_atual = date("Y"); // Pega o ano atual do servidor automaticamente
    
    $idade = $ano_atual - $ano_nascimento;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>Você tem aproximadamente $idade anos.</p>";
    
    if ($idade >= 18) {
        echo "<p style='color: green;'><strong>Você é MAIOR de idade.</strong></p>";
    } else {
        echo "<p style='color: red;'><strong>Você é MENOR de idade.</strong></p>";
    }
    
    echo "<br><a href='index.html'>Voltar</a>";
}
