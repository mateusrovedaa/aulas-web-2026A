<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $preco = (float)$_POST['preco'];
    
    echo "<h2>Informações do Produto:</h2>";
    echo "<p><strong>Produto:</strong> $nome</p>";
    echo "<p><strong>Preço:</strong> R$ " . $preco . "</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
