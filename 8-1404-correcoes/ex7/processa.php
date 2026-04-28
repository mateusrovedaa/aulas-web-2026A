<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (float)$_POST['numero'];
    
    $triplo = $numero * 3;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>O triplo de $numero é <strong>$triplo</strong>.</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
?>
