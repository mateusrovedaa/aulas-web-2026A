<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (float)$_POST['numero'];
    
    $quadrado = $numero * $numero;
    // Outra forma de fazer: $quadrado = pow($numero, 2);
    
    echo "<h2>Resultado:</h2>";
    echo "<p>O quadrado de $numero é <strong>$quadrado</strong>.</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
