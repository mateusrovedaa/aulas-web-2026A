<?php

require_once __DIR__ . '/../dao/TimeDao.php';

// Controller: orquestra o DAO e retorna arrays prontos para virar JSON
class TimeController
{
    // Converte o objeto TimeFutebol em array associativo
    private function timeParaArray(TimeFutebol $time): array
    {
        return [
            'id'            => $time->getId(),
            'nome'          => $time->getNome(),
            'fundacao'      => $time->getFundacao(),
            'estadio'       => $time->getEstadio(),
            'cor_principal' => $time->getCorPrincipal(),
        ];
    }

    public function listar(): array
    {
        $dao   = new TimeDao();
        $times = $dao->listar();
        return array_map([$this, 'timeParaArray'], $times);
    }

    public function buscarPorId(int $id): array
    {
        $dao  = new TimeDao();
        $time = $dao->buscarPorId($id);

        if (!$time) {
            http_response_code(404);
            return ['erro' => 'Time não encontrado'];
        }

        return $this->timeParaArray($time);
    }

    public function salvar(array $dados): array
    {
        $time = new TimeFutebol(
            $dados['nome'],
            $dados['fundacao'],
            $dados['estadio'],
            $dados['cor_principal']
        );

        $dao = new TimeDao();
        $dao->salvar($time);

        http_response_code(201);
        return ['mensagem' => 'Time criado com sucesso'];
    }

    public function atualizar(int $id, array $dados): array
    {
        $time = new TimeFutebol(
            $dados['nome'],
            $dados['fundacao'],
            $dados['estadio'],
            $dados['cor_principal'],
            $id
        );

        $dao = new TimeDao();
        $dao->atualizar($time);

        return ['mensagem' => 'Time atualizado com sucesso'];
    }

    public function deletar(int $id): array
    {
        $dao = new TimeDao();
        $dao->deletar($id);
        return ['mensagem' => 'Time removido com sucesso'];
    }
}
