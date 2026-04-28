<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $metros = (float)$_POST['metros'];
    
    $centimetros = $metros * 100;
    
    echo "<h2>Resultado:</h2>";
    echo "<p>$metros metro(s) equivale(m) a <strong>$centimetros centímetro(s)</strong>.</p>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
