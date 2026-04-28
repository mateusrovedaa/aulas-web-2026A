<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (int)$_POST['numero'];
    
    echo "<h2>Resultado:</h2>";
    if ($numero % 2 == 0) {
        echo "<p>O número $numero é <strong>PAR</strong>.</p>";
    } else {
        echo "<p>O número $numero é <strong>ÍMPAR</strong>.</p>";
    }
    
    echo "<br><a href='index.html'>Voltar</a>";
}
