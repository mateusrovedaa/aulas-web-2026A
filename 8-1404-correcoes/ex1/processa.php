<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nota1 = (float)$_POST['nota1'];
    $nota2 = (float)$_POST['nota2'];
    
    $media = ($nota1 + $nota2) / 2;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>A média das notas é: <strong>" . $media . "</strong></p>";
    echo "<br><a href='index.html'>Voltar</a>";
}
