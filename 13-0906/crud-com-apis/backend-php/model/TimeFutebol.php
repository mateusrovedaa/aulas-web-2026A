<?php

// Model: representa a entidade TimeFutebol — só dados, sem lógica de banco
class TimeFutebol
{
    private $id;
    private $nome;
    private $fundacao;
    private $estadio;
    private $corPrincipal;

    // $id é opcional: não existe ao criar, só após buscar do banco
    public function __construct($nome, $fundacao, $estadio, $corPrincipal, $id = null)
    {
        $this->nome         = $nome;
        $this->fundacao     = $fundacao;
        $this->estadio      = $estadio;
        $this->corPrincipal = $corPrincipal;
        $this->id           = $id;
    }

    public function getId()           { return $this->id; }
    public function getNome()         { return $this->nome; }
    public function getFundacao()     { return $this->fundacao; }
    public function getEstadio()      { return $this->estadio; }
    public function getCorPrincipal() { return $this->corPrincipal; }
}
