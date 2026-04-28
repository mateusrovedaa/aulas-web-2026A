<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preco = (float)$_POST['preco'];
    
    // Calculando o preço com 15% de acréscimo (multiplicar por 1.15 é o mesmo que somar 15%)
    $novo_preco = $preco * 1.15;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>Valor original: R$ " . $preco . "</p>";
    echo "<p>Valor com acréscimo de 15%: <strong>R$ " . $novo_preco . "</strong></p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
?>
