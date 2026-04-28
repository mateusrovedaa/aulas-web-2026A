<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reais = (float)$_POST['reais'];
    $dolar_hoje = 4.98;
    
    $dolares = $reais / $dolar_hoje;
    
    echo "<h2>Resultado da Conversão:</h2>";
    echo "<p>Com R$ " . $reais . ", você pode comprar <strong>US$ " . $dolares . "</strong>.</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
