<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    
    $soma = $num1 + $num2;
    
    echo "<h2>Calculadora de Soma</h2>";
    echo "<h3>Resultado: $num1 + $num2 = $soma</h3>";
    echo "<br><a href='index.html'>Voltar</a>";
}
