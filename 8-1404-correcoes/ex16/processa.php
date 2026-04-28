<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor_conta = (float)$_POST['valor_conta'];
    $qtd_pessoas = (int)$_POST['qtd_pessoas'];
    
    if ($qtd_pessoas > 0) {
        $valor_por_pessoa = $valor_conta / $qtd_pessoas;
        
        echo "<h2>Resultado:</h2>";
        echo "<p>Valor total: R$ " . $valor_conta . "</p>";
        echo "<p>Total de pessoas: $qtd_pessoas</p>";
        echo "<p>Cada pessoa deverá pagar: <strong>R$ " . $valor_por_pessoa . "</strong></p>";
    } else {
        echo "<p>Erro: A quantidade de pessoas deve ser pelo menos 1.</p>";
    }
    
    echo "<br><a href='index.html'>Voltar</a>";
}
