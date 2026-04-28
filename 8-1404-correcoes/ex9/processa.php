<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = (float)$_POST['base'];
    $altura = (float)$_POST['altura'];
    
    $area = $base * $altura;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>A área do retângulo com base $base e altura $altura é: <strong>$area</strong></p>";
    echo "<br><a href='index.html'>Voltar</a>";
}
