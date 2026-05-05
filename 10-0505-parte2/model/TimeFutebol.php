<?php

// Model: representa a entidade TimeFutebol — só dados, sem lógica de banco
class TimeFutebol
{
    private $id;           // identificador gerado pelo banco
    private $nome;         // nome do time
    private $fundacao;     // ano de fundação
    private $estadio;      // nome do estádio
    private $corPrincipal; // cor principal do uniforme

    // $id é opcional: não existe ao criar, só após buscar do banco
    public function __construct($nome, $fundacao, $estadio, $corPrincipal, $id = null)
    {
        $this->nome         = $nome;         // atribui o nome ao objeto
        $this->fundacao     = $fundacao;     // atribui o ano de fundação
        $this->estadio      = $estadio;      // atribui o estádio
        $this->corPrincipal = $corPrincipal; // atribui a cor principal
        $this->id           = $id;           // atribui o id vindo do banco (ou null)
    }

    // Getters: permitem leitura dos atributos privados sem expor a escrita
    public function getId()           { return $this->id; }
    public function getNome()         { return $this->nome; }
    public function getFundacao()     { return $this->fundacao; }
    public function getEstadio()      { return $this->estadio; }
    public function getCorPrincipal() { return $this->corPrincipal; }
}
