<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = (int)$_POST['numero'];
    
    echo "<h2>Tabuada do $numero:</h2>";
    echo "<ul>";
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<li>$numero x $i = $resultado</li>";
    }
    echo "</ul>";
    
    echo "<br><a href='index.html'>Voltar</a>";
}
