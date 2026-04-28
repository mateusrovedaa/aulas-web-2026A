<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $celsius = (float)$_POST['celsius'];
    
    // Fórmula: F = C * 1.8 + 32
    $fahrenheit = ($celsius * 1.8) + 32;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>A temperatura de $celsius °C equivale a <strong>$fahrenheit °F</strong>.</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
