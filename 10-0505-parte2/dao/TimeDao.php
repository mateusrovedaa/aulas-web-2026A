<?php

require_once __DIR__ . '/../Database.php';         // carrega a classe de conexão com o banco
require_once __DIR__ . '/../model/TimeFutebol.php'; // carrega o Model

// DAO (Data Access Object): responsável por todas as operações no banco para TimeFutebol
class TimeDao
{
    private $tabela     = 'times_futebol'; // nome da tabela no banco
    private $connection;                   // conexão PDO

    public function __construct()
    {
        $db                = new Database();      // cria a conexão com o banco
        $this->connection  = $db->connection;     // armazena a conexão para uso nos métodos
    }

    // Insere um novo time na tabela
    public function salvar(TimeFutebol $time)
    {
        // Usa ? como parâmetro para evitar SQL Injection
        $sql  = "INSERT INTO $this->tabela (nome, fundacao, estadio, cor_principal) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql); // prepara a query no banco

        // Executa usando os getters do modelo para acessar os atributos privados
        $stmt->execute([$time->getNome(), $time->getFundacao(), $time->getEstadio(), $time->getCorPrincipal()]);
    }

    // Retorna todos os times cadastrados como array de objetos TimeFutebol
    public function listar()
    {
        $sql  = "SELECT * FROM $this->tabela";  // busca todos os registros
        $stmt = $this->connection->query($sql); // executa a query
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); // resultado como array associativo

        $times = []; // vetor que receberá os objetos

        foreach ($rows as $row) {
            // Cria um objeto TimeFutebol para cada linha, passando o id do banco
            $times[] = new TimeFutebol(
                $row['nome'],
                $row['fundacao'],
                $row['estadio'],
                $row['cor_principal'],
                $row['id']            // id gerado pelo banco, passado como último parâmetro
            );
        }

        return $times; // retorna vetor de objetos TimeFutebol
    }
}
