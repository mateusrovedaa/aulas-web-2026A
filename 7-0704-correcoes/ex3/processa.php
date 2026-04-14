<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = (float)$_POST['peso'];
    $altura = (float)$_POST['altura'];
    
    echo "<h2>Resultado do IMC:</h2>";
    
    if ($altura > 0) {
        $imc = $peso / ($altura * $altura);
        echo "<h3>Seu IMC é: $imc</h3>";
        
        if ($imc < 18.5) {
            echo "<p>Classificação: <strong>Abaixo do peso</strong></p>";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            echo "<p>Classificação: <strong>Peso normal</strong></p>";
        } elseif ($imc >= 25 && $imc < 29.9) {
            echo "<p>Classificação: <strong>Sobrepeso</strong></p>";
        } else {
            echo "<p>Classificação: <strong>Obesidade</strong></p>";
        }
    } else {
        echo "<p style='color: red;'>A altura deve ser maior que zero.</p>";
    }
    
    echo "<br><a href='index.html'>Voltar</a>";
}
