<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (float)$_POST['numero'];
    
    echo "<h2>Resultado:</h2>";
    
    if ($numero > 0) {
        echo "<p>O número $numero é <strong>POSITIVO</strong>.</p>";
    } elseif ($numero < 0) {
        echo "<p>O número $numero é <strong>NEGATIVO</strong>.</p>";
    } else {
        echo "<p>O número digitado é <strong>ZERO</strong>.</p>";
    }
    
    echo "<br><a href='index.html'>Voltar</a>";
}
