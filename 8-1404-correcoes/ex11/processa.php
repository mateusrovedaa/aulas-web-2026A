<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preco = (float)$_POST['preco'];
    
    // Calcula 10% de desconto (multiplicar por 0.90)
    $desconto = $preco * 0.10;
    $preco_final = $preco - $desconto;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>Preço original: R$ " . $preco . "</p>";
    echo "<p>Valor do desconto (10%): R$ " . $desconto . "</p>";
    echo "<p>Preço final a pagar: <strong style='color: green;'>R$ " . $preco_final . "</strong></p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
?>
