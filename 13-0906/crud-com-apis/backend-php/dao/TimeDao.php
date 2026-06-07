<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/TimeFutebol.php';

// DAO: responsável por todas as operações no banco para TimeFutebol
class TimeDao
{
    private $tabela    = 'times_futebol';
    private $connection;

    public function __construct()
    {
        $db              = new Database();
        $this->connection = $db->connection;
    }

    public function salvar(TimeFutebol $time)
    {
        $sql  = "INSERT INTO $this->tabela (nome, fundacao, estadio, cor_principal) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$time->getNome(), $time->getFundacao(), $time->getEstadio(), $time->getCorPrincipal()]);
    }

    public function buscarPorId($id)
    {
        $sql  = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new TimeFutebol($row['nome'], $row['fundacao'], $row['estadio'], $row['cor_principal'], $row['id']);
    }

    public function atualizar(TimeFutebol $time)
    {
        $sql  = "UPDATE $this->tabela SET nome = ?, fundacao = ?, estadio = ?, cor_principal = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $time->getNome(),
            $time->getFundacao(),
            $time->getEstadio(),
            $time->getCorPrincipal(),
            $time->getId()
        ]);
    }

    public function deletar($id)
    {
        $sql  = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listar()
    {
        $sql   = "SELECT * FROM $this->tabela ORDER BY id";
        $stmt  = $this->connection->query($sql);
        $rows  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $times = [];

        foreach ($rows as $row) {
            $times[] = new TimeFutebol($row['nome'], $row['fundacao'], $row['estadio'], $row['cor_principal'], $row['id']);
        }

        return $times;
    }
}
