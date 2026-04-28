<?php
class TimeFutebol {
    private $nome;
    private $fundacao;
    private $estadio;
    private $corPrincipal;

    public function __construct($nome, $fundacao, $estadio, $corPrincipal){
        $this->nome = $nome;
        $this->fundacao = $fundacao;
        $this->estadio = $estadio;
        $this->corPrincipal = $corPrincipal;
    }

    public function imprimeAtributos(){
        echo "<h3>Informações do time " . $this->nome . "</h3>";
        echo "Ano de fundação: " . $this->fundacao . ".</br>";
        echo "Estádio: " . $this->estadio . ".</br>";
        echo "Cor Principal: " . $this->corPrincipal . ".</br>";
    }
}